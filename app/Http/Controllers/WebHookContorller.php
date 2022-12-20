<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Rate;
use App\Models\Bot;
use App\Models\Payments;
use App\Models\Vuacher;
use App\Models\PaymentProvider;
use App\Helpers\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebHookContorller extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, Telegram $telegram)
    {
        $message = $request->input('message');
        
        $text = $message["text"] ?? null; //Текст сообщения
        $chat_id = $message["chat"]["id"] ?? null; //Уникальный идентификатор пользователя
        $user_id = $message["from"]["id"] ?? null;
        $first_name = $message["from"]["first_name"] ?? null;
        $last_name = $message["from"]["last_name"] ?? null;
        $username = $message["from"]["username"] ?? null;
        // $contact = $message['contact'] ?? null;

        $userdata = Client::where('userid', $user_id)->first() ?? false;        
        
        if($userdata){
            if($userdata->step == 'phone' && isset($message['contact'])){
                $userdata->phone = $message['contact']['phone_number'];
                $userdata->step = 'tarif';
                $userdata->save();
            }
        }
        
        if ($text == "/start") {
            // return $telegram->sendMessage($chat_id, "Assalom aleykum!");
        }
        
        

        // pre_checkout_query
        $pre_checkout_query = $request->input('pre_checkout_query');
        if($pre_checkout_query){
            $pre_checkout_id = $pre_checkout_query['id'];    
        }
        
        // successful_payment
        $successful_payment = $message['successful_payment'] ?? false;

        if($pre_checkout_query){
            
            $this->bot('answerPreCheckoutQuery', [
                'pre_checkout_query_id' => $pre_checkout_id,
                'ok' => true
            ]);
        };
        
        
        // $successful_payment = [
        //     "currency" => "UZS",
        //     "total_amount" => 500000,
        //     "invoice_payload" => "2:1",
        //     "order_info" =>  [
        //         "phone_number" => "998997070780"
        //     ],
        //     "telegram_payment_charge_id" => "1211741935_649225915_289765_7161097787395031040",
        //     "provider_payment_charge_id" => "636154dec5298a31df7a6f32"
        // ];
        

        if($successful_payment){
            
            $data = explode(':', $successful_payment['invoice_payload']);
            
            $payment = Payments::create([
                'userid' => $user_id,
                'rate_id' =>$data[1],
                'provider_id' =>$data[0],
                'currency' =>$successful_payment['currency'],
                'total_amount' =>$successful_payment['total_amount'],
                'invoice_payload' =>$successful_payment['invoice_payload'],
                'order_info' => json_encode($successful_payment),
            ]);
            
            $vuacher = Vuacher::where('rate_id', $data[1])->where('status', 0)->latest('id')->first();
            
            $vuacher->update([
                'userid' => $user_id,
                'payment_id' => $payment->id,
                'type' => 'bot',
                'status' => true
            ]);
            
            $rate = Rate::where('id', $data[1])->first();
            
            $time = time();
            
            $this->generateVuacher($vuacher, $rate, $time);
            
            $telegram->sendPhoto($user_id, "Siz uchun vuacher taqdim etildi.\n\nLogin: ".$vuacher->login."\nPassword: ".$vuacher->password."\nTarif: ".$rate->button_name, "https://biznesavtomat.uz/vuachers/".$rate->id.$vuacher->id.$time.".png");
            
            return 0;
        
        };



        if($text || isset($message['contact'])){
            if(!$userdata){
                $userdata = Client::create([
                    "userid" => $user_id,
                    "step" => 'phone',
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "username" => $username,
                    "phone" => ''
                ]);
            }else{
                $userdata->first_name = $first_name;
                $userdata->last_name = $last_name;
                $userdata->username = $username;
                $userdata->save();
            }

            if ($text == "/start") {
                $telegram->sendMessage($chat_id, "Assalom aleykum!");
            }

            if($userdata->phone == ''){

                $phone_keyboard = [[["text"=>"Telefon raqamni yuborish", 'request_contact' =>true]]];

                $button = [
                    'keyboard' => $phone_keyboard,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ];  

                return $telegram->sendButtons($chat_id, "Botdan foydalanish uchun <b>telefon raqamingzni</b> yuboring!", $button);

            }
            
            $rates = Rate::select("button_name")->get();
            $ratesKeyboard = [];
            foreach($rates as $item){
                $ratesKeyboard[] = $item->button_name;
            }
                
            // if($userdata->step == 'tarif' && isset($message['contact'])){
            // if(!str_contains($text, 'Tarif')){
            if(!in_array($text, $ratesKeyboard)){
                
                $keyboard = [$ratesKeyboard];

                $button = [
                    'keyboard' => $keyboard,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ];  

                $telegram->sendButtons($chat_id, "Tariflarni tanlang!", $button);
            }
            
            if (in_array($text, $ratesKeyboard)) {
                $select_rate = Rate::where('button_name', $text)->first();
                $provider = PaymentProvider::where('name', 'like', '%payme%')->first();
                
                $isCheckVuacher = Vuacher::where('rate_id', $select_rate->id)->where('status', 0)->latest('id')->get();
                
                if(count($isCheckVuacher) == 0){
                    return $telegram->sendMessage($chat_id, "Uzur ushbu tarif buyicha vaucherlarimiz qolmagan, boshqa tariflardan birini tanlang!");
                }
                
                $this->bot('sendInvoice', [
                    'chat_id' => $chat_id,
                    'title' => $select_rate->name,
                    'description' => $select_rate->description,
                    'payload' => $provider->id.":".$select_rate->id,
                    'provider_token' => $provider->token,
                    'currency' => 'UZS',
                    'max_tip_amount' => 1000*100,
                    'prices' => json_encode([
                        [ 'label' => $select_rate->description, 'amount' => $select_rate->price*100],
                    ]),
                    // 'suggested_tip_amounts' => json_encode([
                    //     30*100, 50*100, 100*100, 500*100, 
                    // ]),
                    'photo_url' => "https://biznesavtomat.uz/logo.png",
                    'photo_width' => 500,
                    'photo_height' => 500,

                    'send_phone_number_to_provider' => true,
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                [ 'text' => "To'lov ".$select_rate->price." UZB Payme orqali", 'pay' => true]
                            ],
                            [
                                [ 'text' => "⭕️ Bekor qilish", 'callback_data' => "cancel"]
                            ]
                        ]
                    ]),
                ]);
            }

        }else{
            return $telegram->sendMessage($chat_id, "Matnli xabar yuboring.");
        }
         
    }
    
    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getWebhook(Request $request)
    {
        
        $request = Vuacher::where('rate_id', 1)->where('status', 0)->latest('id')->get();
       
        if(count($request) > 0){
            echo "bor";
        }else{
            echo "yoq";
        }
            
        return response()->json($request);
    }

    public function bot($method = "getMe", $params = []){
        // 1211741935:AAH_Ely_nR71I9IIvtj-mZo62Nf6bpYAbOo
        // 5667518944:AAFd7PEIGmkuBDpRFAH5wfOhDk_EsOpfjq0
        
        $bot = Bot::where('status',true)->first();
        
        $url = "https://api.telegram.org/bot".$bot->token."/" . $method;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
        ]);
        $res = curl_exec($curl);
        // dump(curl_getinfo($curl));
        curl_close($curl);
        return !curl_error($curl) ? json_decode($res, true) : false;
    }
    
    public function generateVuacher(Vuacher $vuacher, Rate $rate, $time){
        
        $files = glob('vuachers/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file)) {
            unlink($file); // delete file
          }
        }
        
        // Create a 300x150 image
        $im = imagecreatetruecolor(350, 350);
        $black = imagecolorallocate($im, 0, 0, 0);
        $white = imagecolorallocate($im, 255, 255, 255);
        
        // Set the background to be white
        imagefilledrectangle($im, 0, 0, 350, 350, $white);
        
        // Path to our font file
        $font = 'font/verdana.ttf';
        
        
        
        // Create the next bounding box for the second text
        $bbox = imagettfbbox(20, 0, $font, 'TALABA.NET');
        
        // Set the cordinates so its next to the first text
        $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
        $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;
        
        // Write it
        imagettftext($im, 20, 0, $x, $y-100, $black, $font, 'TALABA.NET');
        
        
        
        // Create the next bounding box for the second text
        $bbox = imagettfbbox(15, 0, $font, 'Login: '.$vuacher->login);
        
        // Set the cordinates so its next to the first text
        $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
        $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;
        
        // Write it
        imagettftext($im, 15, 0, $x, $y, $black, $font, 'Login: '.$vuacher->login);
        
        
        
        
        // Create the next bounding box for the second text
        $bbox = imagettfbbox(15, 0, $font, 'Parol: '.$vuacher->password);
        
        // Set the cordinates so its next to the first text
        $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
        $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;
        
        // Write it
        imagettftext($im, 15, 0, $x, $y+50, $black, $font, 'Parol: '.$vuacher->password);
        
        
        
        // Create the next bounding box for the second text
        $bbox = imagettfbbox(10, 0, $font, "Tarif: ".$rate->button_name);
        
        // Set the cordinates so its next to the first text
        $x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
        $y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;
        
        // Write it
        imagettftext($im, 10, 0, $x, $y+150, $black, $font, "Tarif: ".$rate->button_name);
        
        
        
        imagedashedline($im, 10, 10, 340, 10, $black);
        imagedashedline($im, 10, 10, 10, 340, $black);
        imagedashedline($im, 340, 10, 340, 340, $black);
        imagedashedline($im, 10, 340, 340, 340, $black);
        
        // Output to browser
        // header('Content-Type: image/png');
        
        imagepng($im, "vuachers/".$rate->id.$vuacher->id.$time.".png");
        imagedestroy($im);
    }

}

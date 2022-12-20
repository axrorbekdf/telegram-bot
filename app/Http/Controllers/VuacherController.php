<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vuacher;
use App\Models\Rate;
use App\Models\Payments;
use App\Helpers\Telegram;
use App\Http\Requests\StoreVuacherRequest;
use App\Http\Requests\UpdateVuacherRequest;
use Illuminate\Http\Request;

class VuacherController extends Controller
{
    protected $telegram;
    
    public function __construct(Telegram $telegram){
        $this->telegram = $telegram;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vuachers = Vuacher::where('type', 'rate')->get();
        $clients = Client::all();
        $rates = Rate::all();
        
        return view('vuacher.index', compact('vuachers', 'clients','rates'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setVuacherList()
    {   
        $vuachers = Vuacher::where('type', 'bot')->where('status', 1)->orWhere('type','reload')->get();
        $clients = Client::all();
        $rates = Rate::all();
        
        return view('vuacher.list', compact('vuachers', 'clients','rates'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVuacherRequest $request)
    {
        // return $request;
        
        $vuacher = Vuacher::create([
            // 'userid' => (int) $request->input('userid'),
            'rate_id' => (int) $request->input('rate_id'),
            // 'payment_id' => $request->input('payment_id'),
            'login' => $request->input('login'),
            'password' => $request->input('password'),
            'type' => 'rate'
        ]);
        
        // $rate = Rate::where('id', $request->input('rate_id'))->first();
        // $this->generateVuacher($vuacher, $rate);
        
        // $this->telegram->sendPhoto($vuacher->userid, "Siz uchun vuacher taqdim etildi.\n\nLogin: ".$vuacher->login."\nPassword: ".$vuacher->password."\nTarif: ".$rate->button_name, "https://biznesavtomat.uz/vuachers/".$rate->id.$vuacher->id.".png");

        return redirect()->back();
    }

    public function edit(Vuacher $vuacher){

        $vuachers = Vuacher::where('type', 'rate')->get();
        $clients = Client::all();
        $rates = Rate::all();

        return view('vuacher.index', [
            'vuachers' => $vuachers,
            'vuacher' => $vuacher,
            'clients' => $clients,
            'rates' => $rates,
            'type' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRateRequest  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVuacherRequest $request, Vuacher $vuacher)
    {
        $vuacher->update([
            // 'userid' => $request->input('userid'),
            'rate_id' => (int) $request->input('rate_id'),
            // 'payment_id' => $request->input('payment_id'),
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuacher $vuacher)
    {   
        $vuacher->delete();
        return redirect()->route('vuacher');
    }
    
    public function getPayments(Request $request){
        
        return Payments::where('userid', $request->userid)->get();
    }
    
    public function reloadVuacher(Vuacher $vuacher){
        
      Vuacher::create([
            'userid' => $vuacher->userid,
            'rate_id' => $vuacher->rate_id,
            'payment_id' => $vuacher->payment_id,
            'login' => $vuacher->login,
            'password' => $vuacher->password,
            'type' => 'reload'
        ]);
    
        
        $rate = Rate::where('id', $vuacher->rate_id)->first();
        $this->generateVuacher($vuacher, $rate);
        
        $this->telegram->sendPhoto($vuacher->userid, "Siz uchun vuacher qayta taqdim etildi.\n\nLogin: ".$vuacher->login."\nPassword: ".$vuacher->password."\nTarif: ".$rate->button_name, "https://biznesavtomat.uz/vuachers/".$rate->id.$vuacher->id.".png");
        
        return redirect()->route('vuacher');
    }
    
    public function generateVuacher(Vuacher $vuacher, Rate $rate){
        
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
        
        imagepng($im, "vuachers/".$rate->id.$vuacher->id.".png");
        imagedestroy($im);
    }
    
}

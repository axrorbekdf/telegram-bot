<?php

namespace App\Helpers;

use App\Models\Bot;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram{

    protected $http;
    // protected $token = "1211741935:AAH_Ely_nR71I9IIvtj-mZo62Nf6bpYAbOo";
    // protected $token = "5667518944:AAFd7PEIGmkuBDpRFAH5wfOhDk_EsOpfjq0";
    protected $token = "";
    
    CONST URL = "https://api.telegram.org/bot";

    public function __construct(Http $http)
    {
        $bot = Bot::where('status',true)->first();
        $this->http = $http;
        $this->token = $bot->token;
    }

    public function sendMessage($chat_id, $message){

        return $this->http::post(SELF::URL.$this->token.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' =>  $message,
            'parse_mode' => 'html'
        ]);
        
    }
    
    public function sendPhoto($chat_id, $message, $url){

        return $this->http::post(SELF::URL.$this->token.'/sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $url, 
            'caption' => $message,
            'parse_mode' => 'html'
        ]);
        
    }

    public function editMessage($chat_id, $message, $message_id){

        return $this->http::post(SELF::URL.$this->token.'/editMessageText', [
            'chat_id' => $chat_id,
            'text' =>  $message,
            'parse_mode' => 'html',
            'message_id' => $message_id
        ]);
        
    }

    public function sendDocument($chat_id, $file, $reply_id = null){
        return $this->http::attach('document', Storage::get("/public/".$file), $file)
            ->post(self::URL.$this->token.'/sendDocument', [
                'chat_id' => $chat_id,
                'reply_to_message_id' => $reply_id
            ]);
    }

    public function sendButtons($chat_id, $message, $button){

        return $this->http::post(SELF::URL.$this->token.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' =>  $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,

        ]);
        
    }

    public function editButtons($chat_id, $message, $button, $message_id){

        return $this->http::post(SELF::URL.$this->token.'/editMessageText', [
            'chat_id' => $chat_id,
            'text' =>  $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id,
        ]);
        
    }

    public function replyKeyboardMarkup($array){
        return json_encode($array);
    }

}

?>
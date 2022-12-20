<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bots = Bot::all();

        return view('bot.index', compact('bots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bot::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'token' => $request->input('token'),
            
        ]);

        return redirect()->back();
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentProvider  $paymentProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(Bot $bots)
    {
        $allBots = Bot::all();

        return view('bot.index', [
            'bots' => $allBots,
            'bot' => $bots,
            'type' => 'edit',
        ]);
        
        // return $bots;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentProvider  $paymentProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bot $bots)
    {
        $bots->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'token' => $request->input('token'),
        ]);

        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentProvider  $paymentProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bot $bots)
    {
        $bots->delete();
        return redirect()->route('bots');
    }
    
     public function connect(Bot $bots)
    {
        $datas = Bot::where('status', true)->get();
        
        foreach($datas as $item){
            $response = Http::get('https://api.telegram.org/bot'.$item->token.'/deleteWebhook');
        
            if($response->object()->result){
                $item->update(['status' => 0]);
            }
        }
        
        $response = Http::get("https://api.telegram.org/bot".$bots->token."/setWebhook?url=https://biznesavtomat.uz/webhook");
        
        if($response->object()->result){
            $bots->update(['status' => 1]);
        }
        
        return redirect()->route('bots');;
    }
}

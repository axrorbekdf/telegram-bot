<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payments;
use App\Models\Bot;
use App\Models\PaymentProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = count(Client::all());
        $payment = count(Payments::all());
        $bot = count(Bot::all());
        $provider = count(PaymentProvider::all());
        
        return view('home', compact('client','payment','bot','provider'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}

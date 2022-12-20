<?php

use App\Helpers\Sms;
use App\Helpers\Telegram;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebHookContorller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profile/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/rate', [App\Http\Controllers\RateController::class, 'index'])->name('rate');
    Route::post('/rate', [App\Http\Controllers\RateController::class, 'store'])->name('rate.store');
    Route::get('/rate/edit/{rate}', [App\Http\Controllers\RateController::class, 'edit'])->name('rate.edit');
    Route::post('/rate/update/{rate}', [App\Http\Controllers\RateController::class, 'update'])->name('rate.update');
    Route::get('/rate/delete/{rate}', [App\Http\Controllers\RateController::class, 'destroy'])->name('rate.delete');
    
    Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
    Route::get('/payment', [App\Http\Controllers\PaymentsController::class, 'index'])->name('payment');
    
    Route::get('/provider', [App\Http\Controllers\PaymentProviderController::class, 'index'])->name('provider');
    Route::post('/provider', [App\Http\Controllers\PaymentProviderController::class, 'store'])->name('provider.store');
    Route::get('/provider/edit/{provider}', [App\Http\Controllers\PaymentProviderController::class, 'edit'])->name('provider.edit');
    Route::post('/provider/update/{provider}', [App\Http\Controllers\PaymentProviderController::class, 'update'])->name('provider.update');
    Route::get('/provider/delete/{provider}', [App\Http\Controllers\PaymentProviderController::class, 'destroy'])->name('provider.delete');
    
    Route::get('/bots', [App\Http\Controllers\BotController::class, 'index'])->name('bots');
    Route::post('/bots', [App\Http\Controllers\BotController::class, 'store'])->name('bots.store');
    Route::get('/bots/edit/{bots}', [App\Http\Controllers\BotController::class, 'edit'])->name('bots.edit');
    Route::post('/bots/update/{bots}', [App\Http\Controllers\BotController::class, 'update'])->name('bots.update');
    Route::get('/bots/delete/{bots}', [App\Http\Controllers\BotController::class, 'destroy'])->name('bots.delete');
    Route::get('/bots/connect/{bots}', [App\Http\Controllers\BotController::class, 'connect'])->name('bots.connect');
    
    Route::get('/vuacher', [App\Http\Controllers\VuacherController::class, 'index'])->name('vuacher');
    Route::get('/vuacher/set/list', [App\Http\Controllers\VuacherController::class, 'setVuacherList'])->name('vuacher.set.list');
    Route::post('/vuacher', [App\Http\Controllers\VuacherController::class, 'store'])->name('vuacher.store');
    Route::get('/vuacher/edit/{vuacher}', [App\Http\Controllers\VuacherController::class, 'edit'])->name('vuacher.edit');
    Route::post('/vuacher/update/{vuacher}', [App\Http\Controllers\VuacherController::class, 'update'])->name('vuacher.update');
    Route::get('/vuacher/delete/{vuacher}', [App\Http\Controllers\VuacherController::class, 'destroy'])->name('vuacher.delete');
    Route::get('/vuacher/reload/{vuacher}', [App\Http\Controllers\VuacherController::class, 'reloadVuacher'])->name('vuacher.reload');
    Route::post('/vuacher/client/payments', [App\Http\Controllers\VuacherController::class, 'getPayments'])->name('vuacher.client.payments');

});

Route::get('/register', function () { 
    return redirect()->route('login');
});

Route::post('/webhook', [WebHookContorller::class, 'index']);
Route::get('/get/webhook', [WebHookContorller::class, 'getWebhook']);

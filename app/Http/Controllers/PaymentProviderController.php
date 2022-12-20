<?php

namespace App\Http\Controllers;

use App\Models\PaymentProvider;
use App\Http\Requests\StorePaymentProviderRequest;
use App\Http\Requests\UpdatePaymentProviderRequest;

class PaymentProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = PaymentProvider::all();

        return view('provider.index', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentProviderRequest $request)
    {
        PaymentProvider::create([
            'name' => $request->input('name'),
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
    public function edit(PaymentProvider $provider)
    {
        $providers = PaymentProvider::all();

        return view('provider.index', [
            'providers' => $providers,
            'provider' => $provider,
            'type' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentProviderRequest  $request
     * @param  \App\Models\PaymentProvider  $paymentProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentProviderRequest $request, PaymentProvider $provider)
    {
        $provider->update([
            'name' => $request->input('name'),
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
    public function destroy(PaymentProvider $provider)
    {
        $provider->delete();
        return redirect()->route('provider');
    }
}

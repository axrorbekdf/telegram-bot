<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rates = Rate::all();
        return view('rate.index', compact('rates'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRateRequest $request)
    {
        Rate::create([
            'name' => $request->input('name'),
            'button_name' => $request->input('button_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->back();
    }

    public function edit(Rate $rate){

        $rates = Rate::all();

        return view('rate.index', [
            'rates' => $rates,
            'rate' => $rate,
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
    public function update(UpdateRateRequest $request, Rate $rate)
    {
        $rate->update([
            'name' => $request->input('name'),
            'button_name' => $request->input('button_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {   
        $rate->delete();
        return redirect()->route('rate');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $user = User::find($id);

        if($request->input('type') == 'user'){
            $status = $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);    
        }

        if($request->input('type') == 'password'){
            $status = $user->update([
                'password' => bcrypt($request->input('password')),
            ]);    
        }
        

        return response()->json(['status' => $status]);
    }

}

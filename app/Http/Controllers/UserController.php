<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id){

        $user = User::find($id);
        
        return view('profile',compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        
        $request->validate([
            'name'=>'required|min:8',

            'email' => 'required|email'
        ]);
       
        $user->update(['name'=>$request->name,'email'=>$request->email]);

        return back()->with('status','User profile updated successfuly');
    }
}

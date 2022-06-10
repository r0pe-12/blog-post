<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show user details as well as user update form
    public function index(){
        # code
        $user = \Auth::user();
        return view('admin.profile',compact('user'));
    }


//    update user details
    public function update(Request $request){
        # code
        $input = $this->validate($request, [
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'picture'=>'file',
            'about'=>'required',
            'password'=>'confirmed'
        ]);
        if (!$input['password']){
            unset($input['password']);
        }
        if ($request->file('picture')){
            $input['picture'] = $request->file('picture')->store('images');
        }
        \Auth::user()->update($input);
        session()->flash('user-updated', 'Successfully updated user info');
        return back();
    }

}

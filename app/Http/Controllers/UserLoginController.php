<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
   public function userLogin()
   {
       $data['title']='Welcome';
       return view('userLogin',$data);
   }
   public function login(Request $request)
   {
       $request->validate([
           'email'=>'required | email',
           'password'=>'required'
       ]);
       $credentials= $request->only('email','password');
       if(Auth::attempt($credentials))
       {
           return redirect()->intended('dashboard');
       }
       Session::flash('message','Email or password invalid');
       return redirect()->back()->withInput(['email'=>$request->email]);
   }
}

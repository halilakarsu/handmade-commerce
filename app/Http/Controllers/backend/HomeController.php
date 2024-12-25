<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
     return view('backend.home.index');

    }

    public function login(){
        return view('backend.home.login');
    }
    public function authenticate(Request $request){
     $request->flash();
     $remember=$request->has('remember');
     $credentials=$request->only('email','password');
     if(Auth::attempt($credentials,$remember)){
        return redirect()->intended(route('backend.home'));
     }else{
      return  back()->with('error','Hatalı Giriş Yapıldı.');
     }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}

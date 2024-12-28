<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
   public function index(){
       $settings=Settings::all();
       return view('frontend.home.index',compact('settings'));
   }
    public function register(){

        return view('frontend.home.register');
    }
    public function registerStore(Request $request){

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:registers',
            'customer_phone' => 'required|numeric',
           'customer_password' => 'required|min:8|confirmed',
        ]);
        $register=Register::insert([
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_phone'=>$request->customer_phone,
            'customer_adres'=>$request->customer_adres,
            'customer_password' => Hash::make($request->customer_password),
     ]);
        if($register){
            return redirect(route('frontend.account'))->with("success","Sisteme kayıt oldunuz");
        }
        return redirect(route('frontend.home'))->with('error',"Sisteme Kayıt olmadınız");
    }
    public function login(){

        return view('frontend.home.login');
    }


    public function temu(){
        return view('temu.home.index');
    }
}

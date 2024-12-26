<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
   public function index(){
       $settings=Settings::all();
       return view('frontend.home.index',compact('settings'));
   }
    public function temu(){
        return view('temu.home.index');
    }
}

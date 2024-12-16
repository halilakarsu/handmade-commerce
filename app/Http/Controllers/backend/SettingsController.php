<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings=Settings::all()->sortBy('settings_must');
        return view('backend.settings.index',compact('settings'));
    }
}

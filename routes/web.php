<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
Route::get('letmin/ayarlar',[SettingsController::class,'index'])->name('backend.settings');
Route::get('letmin',[HomeController::class,'index'])->name('backend.home');


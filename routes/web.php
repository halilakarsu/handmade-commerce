<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
Route::get('letmin/ayarlar',[SettingsController::class,'index'])->name('settings.index');
Route::get('letmin',[HomeController::class,'index'])->name('backend.home');
Route::post('letmin/sortable',[SettingsController::class,'sortable'])->name('settings.sortable');
Route::get('letmin/ayarlar/delete/{id}',[SettingsController::class,'delete']);
Route::get('letmin/ayarlar/edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
Route::post('letmin/ayarlar/update/{id}',[SettingsController::class,'update'])->name('settings.update');

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings=Settings::all()->sortBy('settings_must');
        return view('backend.settings.index',compact('settings'));
    }
    public function sortable(){
    foreach($_POST['item'] as $key=>$value)
    {
        $settings=Settings::find(intval($value));
        $settings->settings_must=intval($key);
        $settings->save();
    }
    echo true;
    }
    public function delete($id) {
       $settings=Settings::find($id);
       if($settings->delete()){
           return back()->with('success','İşlem Başarılı');
       }
       return back()->with('error','İşlem Başarısız');
    }
    public function edit($id) {
        $editSettings=Settings::where('id',$id)->first();
        return view('backend.settings.edit')->with('editSettings',$editSettings);
    }
    public function update(Request $request,$id){
        if($request->hasFile('settings_value')) {
            $request->validate([
                'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name = 'image' . rand(1, 3000) . '.' . $request->settings_value->getClientOriginalExtension();
            $request->settings_value->move(public_path('backend/images/settings'), $file_name);
            $request->settings_value = $file_name;
            $updateSetinngs=Settings::where('id',$id)->update(
                ['settings_value'=>$request->settings_value]);
            }else {
            $updateSetinngs=Settings::where('id',$id)->update(
                [
                    'settings_value'=>$request->settings_value
                ]);
               }

             if($updateSetinngs){

                 $path='backend/images/settings/'.$request->oldFile;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }

            return back()->with('success',"Düzenleme İşlemi Başarılı");
        }
        return back()->with("error","düzenleme işlemi başarısız");
    }
}

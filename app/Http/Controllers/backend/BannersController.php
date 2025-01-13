<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannersController extends Controller
{
    public function index()
    {    $banners=Banners::all()->sortBy('banner_must');
         return view('backend.banners.index')->with('banners', $banners);
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(Request $request)
    {
        $slug=Str::slug($request->banner_title);
          if($request->hasFile('banner_file')){
            $request->validate([
                'banner_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
                'banner_title'=>'required',
            ]);
        }
        $file_name='image'.rand(1,2000).'.'.$request->banner_file->getClientOriginalExtension();
        $request->banner_file->move(public_path('backend/images/banners'),$file_name);
        $banners=Banners::insert([
            "banner_file"=>$file_name,
            "banner_status"=>$request->banner_status,
            "banner_title"=>$request->banner_title,
            "banner_slug"=>$slug,
        ]);
        if($banners){
            return redirect(route('banners.index'))->with('success','İşlem Başarılı');
        }
        return back();
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $banners=Banners::where('id',$id)->first();
        return view('backend.banners.edit',compact('banners'));
    }

    public function update(Request $request,$id)
    {
            $slug=Str::slug($request->banner_title);
            if($request->hasFile('banner_file')){
            $request->validate(['banner_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']);
            $file_name='image'.rand(1,200030).'.'.$request->banner_file->getClientOriginalExtension();
            $request->banner_file->move(public_path('backend/images/banners'),$file_name);
            $banners=Banners::where('id',$id)->update([
                "banner_file"=>$file_name,
                "banner_slug"=>$slug,
                "banner_title"=>$request->banner_title,
                "banner_status"=>$request->banner_status
            ]);
        } else {
            $banners=Banners::where('id',$id)->update([
               "banner_status"=>$request->banner_status,
                "banner_slug"=>$slug,
                "banner_title"=>$request->banner_title,
            ]);

        }
        if($banners){
            $path='backend/images/banners/'.$request->oldFile;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return redirect(route('banners.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','işlem başarısız');
    }

    public function destroy($id)
    {
        $destroyCategori=Banners::find(intval($id));
        if($destroyCategori->delete())
        {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $banners = Banners::find(intval($value));
            $banners->banner_must = intval($key);
            $banners->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = Banners::where('id', intval($id))->update([
            'banner_status' => $request->sts // z.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

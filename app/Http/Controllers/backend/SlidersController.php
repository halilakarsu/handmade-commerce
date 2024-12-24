<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlidersController extends Controller
{

    public function index()
    {
         return view('backend.sliders.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(strlen($request->slider_slug)>3){
            $slug=Str::slug($request->slider_slug);
        }
        else{
            $slug=Str::slug($request->slider_title);
        }
        if($request->hasFile('slider_file')){
            $request->validate([
                'slider_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
                'slider_title'=>'required',
                'slider_description'=>'required'
            ]);
        }
        $file_name='image'.rand(1,2000).'.'.$request->slider_file->getClientOriginalExtension();
        $request->slider_file->move(public_path('backend/images/sliders'),$file_name);
        $sliders=Sliders::insert([
            "slider_title"=>$request->slider_title,
            "slider_slug"=>$slug,
            "slider_file"=>$file_name,
            "slider_description"=>$request->slider_description,
            "slider_status"=>$request->slider_status
        ]);
        if($sliders){
            return redirect(route('sliders.index'))->with('success','İşlem Başarılı');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $sliders=Sliders::where('id',$id)->first();
        return view('backend.sliders.edit',compact('sliders'));
    }


    public function update(Request $request,$id)
    {
        if(strlen($request->slider_slug>3))
        {
            $slug=Str::slug($request->slider_slug);
        }
        else{
            $slug=Str::slug($request->slider_title);
        }
        $request->validate([
            'slider_title'=>'required',
            'slider_description'=>'required'
        ]);
        if($request->hasFile('slider_file')){
            $request->validate(['slider_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']);
            $file_name='image'.rand(1,2000).'.'.$request->slider_file->getClientOriginalExtension();
            $request->slider_file->move(public_path('backend/images/sliders'),$file_name);
            $sliders=Sliders::where('id',$id)->update([
                "slider_title"=>$request->slider_title,
                "slider_slug"=>$slug,
                "slider_file"=>$file_name,
                "slider_description"=>$request->slider_description,
                "slider_status"=>$request->slider_status
            ]);
        } else {
            $sliders=Sliders::where('id',$id)->update([
                "slider_title"=>$request->slider_title,
                "slider_slug"=>$slug,
                "slider_description"=>$request->slider_description,
                "slider_status"=>$request->slider_status
            ]);

        }

        if($sliders){
            $path='backend/images/sliders/'.$request->oldFile;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return redirect(route('sliders.index'))->with('success','İşlem Başarılı');
        }
        return back();
    }

    public function destroy($id)
    {
        $destroyCategori=Sliders::find(intval($id));
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
            $sliders = Sliders::find(intval($value));
            $sliders->slider_must = intval($key);
            $sliders->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = Sliders::where('id', intval($id))->update([
            'slider_status' => $request->sts // z.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

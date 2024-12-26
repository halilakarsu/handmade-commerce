<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    public function index()
    {  $pages=Pages::all()->sortBy('page_must');
        return view('backend.pages.index',compact('pages'));
    }


    public function create()
    {
        return view('backend.pages.create');
    }


    public function store(Request $request)
    {
        if(strlen($request->page_slug)>3){
            $slug=Str::slug($request->page_slug);
        }
        else{
            $slug=Str::slug($request->page_title);
        }
        if($request->hasFile('page_file')){
            $request->validate([
                'page_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
                'page_title'=>'required',
                'page_description'=>'required'
            ]);
        }
        $file_name='image'.rand(1,2000).'.'.$request->page_file->getClientOriginalExtension();
        $request->page_file->move(public_path('backend/images/pages'),$file_name);
        $pages=Pages::insert([
            "page_title"=>$request->page_title,
            "page_slug"=>$slug,
            "page_file"=>$file_name,
            "page_description"=>$request->page_description,
            "page_status"=>$request->page_status
        ]);
        if($pages){
            return redirect(route('pages.index'))->with('success','İşlem Başarılı');
        }
        return back();
    }


    public function edit($id)
    {
        $pages=Pages::where('id',$id)->first();
        return view('backend.pages.edit',compact('pages'));
    }

    public function update(Request $request,$id)
    {    if(strlen($request->page_slug)>3)
        {
            $slug = Str::slug($request->page_slug);
        }
        else{
            $slug = Str::slug($request->page_title);
        }

        $request->validate([
            'page_title'=>'required',
            'page_description'=>'required'

        ]);
        if($request->hasFile('page_file')){
            $request->validate(['page_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']);
            $file_name='image'.rand(1,2000).'.'.$request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('backend/images/pages'),$file_name);
            $pages=Pages::where('id',$id)->update([
                "page_title"=>$request->page_title,
                "page_slug"=>$slug,
                "page_file"=>$file_name,
                "page_description"=>$request->page_description,
                "page_status"=>$request->page_status
            ]);
        } else {
            $pages=Pages::where('id',$id)->update([
                "page_title"=>$request->page_title,
                "page_slug"=>$slug,
                "page_description"=>$request->page_description,
                "page_status"=>$request->page_status
            ]);
        }
        if($pages){
            $path='backend/images/pages/'.$request->oldFile;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return redirect(route('pages.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','islem basırısız');    }


    public function destroy($id)
    {
        $destroyCategori=Pages::find(intval($id));
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
            $pages = Pages::find(intval($value));
            $pages->page_must = intval($key);
            $pages->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = Pages::where('id', intval($id))->update([
            'page_status' => $request->sts // Status bilgisini request üzerinden alıyoruz.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function index()
    {

        $categories = Categories::all()->sortBy('categori_must');
        return view('backend.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(strlen($request->categori_slug)>3){
            $slug=Str::slug($request->categori_slug);
        }
        else{
            $slug=Str::slug($request->categori_title);
        }
        if($request->hasFile('categori_file')){
           $request->validate([
               'categori_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
               'categori_title'=>'required',
               'categori_description'=>'required'
           ]);
        }
        $file_name='image'.rand(1,2000).'.'.$request->categori_file->getClientOriginalExtension();
        $request->categori_file->move(public_path('backend/images/categories'),$file_name);
            $categories=Categories::insert([
            "categori_title"=>$request->categori_title,
            "categori_slug"=>$slug,
            "categori_file"=>$file_name,
            "categori_description"=>$request->categori_description,
            "categori_status"=>$request->categori_status
        ]);
            if($categories){
             return redirect(route('categories.index'))->with('success','İşlem Başarılı');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Categories::where('id',$id)->first();
        return view('backend.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
            if(strlen($request->categori_slug>3))
            {
            $slug=Str::slug($request->categori_slug);
        }
        else{
            $slug=Str::slug($request->categori_title);
        }
        $request->validate([
            'categori_title'=>'required',
            'categori_description'=>'required'
        ]);
        if($request->hasFile('categori_file')){
            $request->validate(['categori_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']);
            $file_name='image'.rand(1,2000).'.'.$request->categori_file->getClientOriginalExtension();
            $request->categori_file->move(public_path('backend/images/categories'),$file_name);
            $categories=Categories::where('id',$id)->update([
                "categori_title"=>$request->categori_title,
                "categori_slug"=>$slug,
                "categori_file"=>$file_name,
                "categori_description"=>$request->categori_description,
                "categori_status"=>$request->categori_status
            ]);
        } else {
            $categories=Categories::where('id',$id)->update([
                "categori_title"=>$request->categori_title,
                "categori_slug"=>$slug,
                "categori_description"=>$request->categori_description,
                "categori_status"=>$request->categori_status
            ]);

        }

        if($categories){
            if ($request->hasFile('categori_file')) {
                $path = 'backend/images/categories/' . $request->oldFile;
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }
            return redirect(route('categories.index'))->with('success','İşlem Başarılı');
        }
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroyCategori=Categories::find(intval($id));
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
            $categories = Categories::find(intval($value));
            $categories->categori_must = intval($key);
            $categories->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = Categories::where('id', intval($id))->update([
            'categori_status' => $request->sts // Status bilgisini request üzerinden alıyoruz.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

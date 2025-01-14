<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Types::with('categories')->get();
        $types=Types::all()->sortBy('type_must');
        return view('backend.types.index',compact('categories'))->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categories::all()->sortBy('categori_must');
        return view('backend.types.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            if(strlen($request->type_slug)>3){
            $slug=Str::slug($request->type_slug);
        }
        else{
            $slug=Str::slug($request->type_title);
        }
        if($request->hasFile('type_file')){
            $request->validate([
                'type_title'=>'required',
                'type_categori_id'=>'required',
                'type_file'=>'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

        }
        $file_name='image'.rand(1,10000).'.'.$request->type_file->getClientOriginalExtension();
        $request->type_file->move(public_path('backend/images/types'),$file_name);
        $types=Types::insert([
            'type_title'=>$request->type_title,
            'type_slug'=>$slug,
            'type_file'=>$file_name,
            'type_description'=>$request->type_description,
            'type_categori_id'=>$request->type_categori_id,
            'type_status'=>$request->type_status
        ]);
        if($types){
          return redirect(route('types.index'))->with('success','Kayıt Başarılı');
        }
        return back()->with('error','Kayıt Başarısız');
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
    public function edit(string $id)
    {
        $types=Types::where('id',$id)->first();
        $categories=Categories::all()->sortBy('categori_must');
        return view('backend.types.edit',compact('types'))->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if(strlen($request->type_slug)>3){
            $slug=Str::slug($request->type_slug);
        }
        else{
            $slug=Str::slug($request->type_title);
        }
        if($request->hasFile('type_file')){
            $request->validate([
                'type_title'=>'required',
                'type_categori_id'=>'required',
                'type_file'=>'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name='image'.rand(1,10000).'.'.$request->type_file->getClientOriginalExtension();
            $request->type_file->move(public_path('backend/images/types'),$file_name);
            $types=Types::where('id',$id)->update([
                'type_title'=>$request->type_title,
                'type_slug'=>$slug,
                'type_file'=>$file_name,
                'type_description'=>$request->type_description,
                'type_categori_id'=>$request->type_categori_id,
                'type_status'=>$request->type_status
            ]);

        }else {

           $types=Types::where('id',$id)->update([
            'type_title'=>$request->type_title,
            'type_slug'=>$slug,
            'type_description'=>$request->type_description,
            'type_categori_id'=>$request->type_categori_id,
            'type_status'=>$request->type_status
           ]);
        }
        if($types){
            if ($request->hasFile('type_file')) {
                $path = 'backend/images/types/' . $request->oldFile;
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }
            return redirect(route('types.index'))->with('success','Kayıtlar Güncellendi');
            }
             return back()->with('error','Kayıtlar Güncellenemedi.');
    }


    public function destroy($id)
    {
        $destroyType=Types::find(intval($id));
        if($destroyType->delete())
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
            $types = Types::find(intval($value));
            $types->type_must = intval($key);
            $types->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = Types::where('id', intval($id))->update([
            'type_status' => $request->sts // Status bilgisini request üzerinden alıyoruz.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

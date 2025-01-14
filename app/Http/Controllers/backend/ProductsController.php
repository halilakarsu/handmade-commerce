<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductsController extends Controller
{
     public function index()
    {   $types=Types::all()->sortBy('type_must');
        $products=Products::all()->sortBy('products_must');
        return view('backend.products.index',compact('types','products'));
    }


    public function create()
    {   $types=Types::all()->sortBy('product_slug');
        return view('backend.products.create',compact('types'));
    }


    public function store(Request $request)
    {
        $slug=Str::slug($request->product_title);
        if($request->hasFile('product_file')){
            $request->validate([
                'product_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
                'product_title'=>'required',
                'product_description'=>'required',
                'product_type_id'=>'required',
                  'product_price'=>'required'
            ]);
            $file_name=$slug.rand(1,10).'.'.$request->product_file->getClientOriginalExtension();
            $request->product_file->move(public_path('backend/images/products'),$file_name);
            $products=Products::insert([
                "product_title"=>$request->product_title,
                "product_slug"=>$slug,
                "product_file"=>$file_name,
                "product_price"=>$request->product_price,
                "product_status"=>$request->product_status,
                "product_description"=>$request->product_description,
                "product_type_id"=>$request->product_type_id
            ]);

        }
        if($products){
            return redirect(route('products.index'))->with('success',"Ürün Eklendi");
        }
        return back()->with('error','İşlem başarısız');
    }




    public function edit($id)
    {   $products=Products::where('id',$id)->first();
        $types=Types::all()->sortBy('type_must');
        return view('backend.products.edit',compact('types'))->with('products',$products);
    }


    public function update(Request $request, string $id)
    {
        $slug=Str::slug($request->product_title);
        $request->validate([
            'product_title'=>'required',
            'product_description'=>'required',
            'product_type_id'=>'required'
        ]);
        if($request->hasFile('product_file')){
            $slug=Str::slug($request->product_title);
            $request->validate([
                'product_file'=>'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $file_name=$slug.rand(1,10).'.'.$request->product_file->getClientOriginalExtension();
            $request->product_file->move(public_path('backend/images/products'),$file_name);
            $products=Products::where('id',$id)->update([
                "product_title"=>$request->product_title,
                "product_slug"=>$slug,
                "product_file"=>$file_name,
                "product_price"=>$request->product_price,
                "product_discount"=>$request->product_discount,
                "product_status"=>$request->product_status,
                "product_description"=>$request->product_description,
                "product_type_id"=>$request->product_type_id
            ]);

        }else {

            $products=Products::where('id',$id)->update([
                "product_title"=>$request->product_title,
                "product_slug"=>$slug,
                "product_price"=>$request->product_price,
                "product_discount"=>$request->product_discount,
                "product_status"=>$request->product_status,
                "product_description"=>$request->product_description,
                "product_type_id"=>$request->product_type_id
            ]);

        }
        if($products) {
            if ($request->hasFile('product_file')) {
                $path = 'backend/images/products/' . $request->oldFile;
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }
            return redirect(route('products.index'))->with('success', 'Kayıt Başarılı');
        }
            return back()->with('error','Kayıt Başarısız');

    }
    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $products = Products::find(intval($value));
            $products->product_must = intval($key);
            $products->save();
        }
        return true;
    }
    public function destroy($id)
    {
        $destroyProduct=Products::find(intval($id));
        if($destroyProduct->delete())
        {
            echo 1;
        }
        else {
            echo 0;
        }
    }
    public function switch(Request $request, $id){
        $status = Products::where('id', intval($id))->update([
            'product_status' => $request->sts // Status bilgisini request üzerinden alıyoruz.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}

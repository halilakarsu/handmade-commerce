<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug){
        $products = Types::where('slug',$slug)->orderBy('type_must')->get();
        $categories = Categories::with('types')->get();
        $types = Types::all();
        return view('frontend.products.index',compact('categories','products','types'));
    }
}

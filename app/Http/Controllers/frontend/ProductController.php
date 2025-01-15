<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $categories = Categories::with('types')->get();
        $types = Types::with('products')->where('type_slug', $slug)->get();
        return view('frontend.products.index', compact('categories', 'types'));
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {    $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
        $types = Types::with('products')->where('type_slug', $slug)->get()->sortBy('type_slug');
        return view('frontend.products.index', compact('categories', 'types','banners'));
    }

    public function category($slug)
    {   $types = Types::with('products')->where('type_slug', $slug)->get();
        $banners = Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
        $categoriPro = Categories::with('types.products') // İlgili kategori, tipler ve ürünler
        ->where('categori_slug', $slug) // Slug ile filtreleme
        ->get();
          return view('frontend.products.categori', compact('categoriPro', 'banners','types','categories'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search_term');
        $types = Types::with('products')->get();
        $banners = Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
             $categoriPro = Categories::with('types.products')
             ->WhereHas('types.products', function ($query) use ($searchTerm) {
                $query->where('product_title', 'like', '%' . $searchTerm . '%');
            })
            ->get();
        // Arama sonuçlarını view'e gönderiyoruz
        return view('frontend.products.search', compact('categoriPro', 'banners', 'types', 'categories'));
    }

}

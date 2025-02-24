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
        $categories = Categories::with('types')->get()->sortBy('categori_must');
        $types = Types::with('products')->where('type_slug', $slug)->get()->sortBy('type_slug');
        return view('frontend.products.index', compact('categories', 'types','banners'));
    }
    public function detail($slug)
    {   $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
        $types =Types::all();
        $detail = Products::where('product_slug', $slug)->first();
        return view('frontend.products.detail', compact('categories', 'detail','banners','types'));
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

     public function categories($slug)
    {    $banners = Banners::all()->sortBy('banner_title');
         $types =Types::all();
         $typeCategory = Categories::with('types')->where('categori_slug', $slug)->get()->sortBy('categori_must');
         $count= Categories::with('types')->where('categori_slug', $slug)->count();
         $categories = Categories::all();
         $categoriPro = Categories::with('types.products') // İlgili kategori, tipler ve ürünler
         ->where('categori_slug', $slug) // Slug ile filtreleme
         ->get();
          return view('frontend.products.types', compact('categoriPro', 'banners','categories','types','typeCategory','count'));
    }
        public function search(Request $request)
        {
            $searchTerm = $request->input('search_term');
            $types = Types::all();
            $categories = Categories::with('types')->get(); // Kategoriler ile ilişkileri çekiyoruz
            $banners = Banners::all()->sortBy('banner_title'); // Bannerları alıyoruz
            $products = Products::where('product_title', 'like', "%$searchTerm%")
                ->get();
            return view('frontend.products.search', compact('products', 'banners','types', 'categories'));
        }

    public function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

            // Sadece 3 sonuç almak için `take(3)` kullanılıyor
            $data = Products::select("product_title")
                ->where("product_title", "LIKE", "%{$query}%")
                ->take(5)
                ->get();

            $output = '<ul class="dropdown-menu form-control" style="display:block;">';

            // Ürünleri listeleme
            foreach ($data as $row) {
                $output .= ' <li class="product-item"><a href="#">';

                // Resim dosyasının yolunu belirlerken asset() fonksiyonunu kullanmak iyi bir uygulamadır
                $output .= '<div class="product-info"><h5>' . $row->product_title . '</h5></div>';

                $output .= '</a></li> ';
            }

            // View All Results kısmı
            $output .= '<li class="view-all"><a href="#" id="viewAllResults">Daha Fazla Ürün</a></li></ul>';

            return response($output);
        }

        return response('');
    }




}

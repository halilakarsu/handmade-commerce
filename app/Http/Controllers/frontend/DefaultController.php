<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Register;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Messages;
class DefaultController extends Controller
{
       public function index(){
           $settings=Settings::all();
           $types=Types::all();
           $pages=Pages::all();
           $sliders=Sliders::all()->sortBy('slider_must');
           $banners=Banners::all()->sortBy('banner_title');
           $type1 = Types::orderBy('type_must')->take(20)->get();
           $type2 = Types::orderBy('type_must')->skip(20)->take(20)->get();
           $categories = Categories::with('types')->get()->sortBy('categori_must');

           return view('frontend.home.index',compact('settings','sliders','banners','categories','pages','type1','type2','types'));
       }


  public function whatsapp(Request $request)
{
    // Formdan gelen verileri alıyoruz
    $name = $request->input('name');
    $message = $request->input('message');

    // Verilerin boş olup olmadığını kontrol edelim
    if (empty($name) || empty($message)) {
        return back()->with('error', 'Ad ve mesaj alanları boş olamaz!');
    }

    // Mesajın içeriğini encode ediyoruz (URL'de güvenli hale getirmek için)
    $whatsappMessage = urlencode($message);

    // Mesaj gönderilecek telefon numarasını alıyoruz
    $whatsappPhoneNumber = "+905456533189"; // Burada sabit bir numara kullanıyoruz

    // WhatsApp API linkini oluşturuyoruz
    $whatsappLink = "https://api.whatsapp.com/send?phone=$whatsappPhoneNumber&text=$whatsappMessage";

    // Yönlendirme işlemini yapıyoruz
    return redirect()->away($whatsappLink);
}

      public function register(){
        $types=Types::all();
        $banners=Banners::all()->sortBy('banner_title');
        $categories=Categories::all();
        return view('frontend.home.register',compact('types','categories','banners'));
    }
    public function page($slug){
        $pages=Pages::where('page_slug',$slug)->first();
        $categories = Categories::with('types')->get();
         $banners=Banners::all()->sortBy('banner_title');
        return view('frontend.home.page',compact('categories','pages','banners'));
    }
    public function contact(){
          $types=Types::all();
        $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
        return view('frontend.home.contact',compact('categories','types','banners'));
    }
    public function registerStore (Request $request){

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_lastname' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:registers',
            'customer_phone' => 'required|numeric',
            'customer_il' => 'required|string|max:255',
            'customer_ilce'=> 'required|string|max:255',
            'customer_adres'=> 'required|string',
           'customer_password' => 'required|min:8|confirmed',
        ]);
        $register=Register::insert([
            'customer_name'=>$request->customer_name,
             'customer_lastname'=>$request->customer_lastname,
            'customer_email'=>$request->customer_email,
            'customer_phone'=>$request->customer_phone,
            'customer_il'=>$request->customer_il,
            'customer_ilce'=>$request->customer_ilce,
            'customer_adres'=>$request->customer_adres,
            'customer_password' => Hash::make($request->customer_password),
     ]);
        if($register){
            return redirect(route('frontend.account'))->with("success","Sisteme kayıt oldunuz");
        }
        return redirect(route('frontend.home'))->with('error',"Sisteme Kayıt olmadınız");
    }

    public function send (Request $request){

        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required',
            'sender_phone' => 'required|numeric',
            'sender_subject' => 'required',
            'sender_message' => 'required'

        ]);
        $register=Messages::insert([
            'sender_name'=>$request->sender_name,
            'sender_email'=>$request->sender_email,
            'sender_phone'=>$request->sender_phone,
            'sender_subject'=>$request->sender_subject,
            'sender_message'=>$request->sender_message,
        ]);
        if($register){
            return redirect(route('frontend.home'))->with("success","Mesajınız Gönderildi.");
        }
        return redirect(route('frontend.home'))->with('error',"Mesaj Gönderilemedi");
    }

    public function login(){
         $types=Types::all();
        $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
      
        return view('frontend.home.login',compact('banners','categories','types'));
    }

      public function forget(){
         $types=Types::all();
        $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
      
        return view('frontend.home.forget',compact('banners','categories','types'));
    }


    public function temu(){
        return view('temu.home.index');
    }
}

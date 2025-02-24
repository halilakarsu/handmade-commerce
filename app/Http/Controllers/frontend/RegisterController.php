<?php

namespace App\Http\Controllers\frontend;

use App\Models\Register;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Banners;
use App\Models\Categories;
use App\Models\Types;
class RegisterController extends Controller
{

    public function index()
    {
        $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
        $types =Types::all();
        return view('frontend.account.index',compact('banners','types','categories'));
    }
    // Register login
    public function login(Request $request)
    {

        $request->validate([
            'customer_email' => 'required|email',
            'customer_password' => 'required',
        ]);

        // Kullanıcıyı bulma
        $user = Register::where('customer_email', $request->customer_email)->first();

        if (!$user || !Hash::check($request->customer_password, $user->customer_password)) {
            return back()->with('error', 'Hatalı Giriş Yapıldı.');
        }
        Auth::guard('registers')->login($user);
        return redirect()->route('cart');
    }

    // Register logout
    public function logout()
    {
        Auth::guard('registers')->logout();
        return response()->json(['message' => 'Logged out successfully']);
    }
}

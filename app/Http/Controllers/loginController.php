<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use lluminate\Support\Facades\Log;
use App\Models\adminModels;

class loginController extends Controller
{
    //Digunakan untuk menampilkan data
    public function index(){
        return view("login");
    }
    //END Digunakan untuk menampilkan data

    //Digunakan untuk autentikasi pada saat login
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::check()){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
        }else{
            return redirect()->back();
        }

    }
    //END Digunakan untuk autentikasi pada saat login

    //Digunakan untuk logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
}

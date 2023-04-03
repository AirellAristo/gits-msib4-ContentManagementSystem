<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\adminModels;

class registerController extends Controller
{
    public function index(){
        return view('registrasi');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:admin_models,username',
            'password' => 'required']);

        adminModels::create(['username'=>$validated['username'],'password'=>bcrypt($validated['password'])]);
        return redirect("/")->with("success");
    }
}

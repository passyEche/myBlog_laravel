<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
         $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:225',
            'email' => 'required|max:225',
            'password' => 'required|confirmed'
        ]);
        // dd($request->name);
        // return redirect('dashboard');
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::attempt($request->only('email', 'password'));
        return  redirect('dashboard');


    }
}

<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        // dd('logout');
        Auth::logout();
        return redirect('/login').route('login.index');

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public  function index(User $user ){
        // dd(Post::find(1)->ownBy(auth()->user()));
        $users = User::latest('created_at', 'desc')->get();
        return view('pages.dashboard', [
            'users' => $users
        ]);
    }
}

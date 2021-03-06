<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        // dd($user);
        // dd($user->post);
        $posts = $user->post()->latest()->paginate(5);
        return view('users.posts.index',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Like;

use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request){

        /**
         * Storing users Like in the database
         */
        // dd($post);
        // $post = Post::find($id)->likes();
        // Post::find($id)->likes()->create([
        //     'user_id' => auth()->user()->id
        // ]);
        if($post->likedBy($request->user())){
            return back();
        }
        $post->likes()->create([
            'user_id' => auth()->user()->id
        ]);

            // $like = new Like;
            // $like->user_id = auth()->user()->id;
            // $like->post_id = $post->id;
            // $like->save();
        
        return back();
    }

    public function destroy(Post $post, Request $request){
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}

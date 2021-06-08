<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // $posts = Post::latest('created_at', 'desc')->get();
        // dd($posts + 1);
        // dd(count($posts));
        // $count = $posts->num_row + 1;
        // dd($count);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $path = Storage::path('public/example.txt');
        // dd(Storage::path('public/example.txt'));
    //     $del =  Storage::disk('local')->exists('public/example.txt');
    //    if($del){
    //        Storage::delete('public/example.txt');
    //    }
        // dd('Done');
        // dd($request->file('cover_image'));
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){

            //Get Filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // dd($filnameWithExt);
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // dd($filename);
            $fileExtension = $request->file('cover_image')->extension();
            // dd($Extension);
            $fileNameToStore = $filename.'_'.time().'_'.$request->user()->id.'.'.$fileExtension;
            // dd($fileNameToStore);
            $path = $request->file('cover_image')->storeAs(
                'public/cover_image', $fileNameToStore
            );
        }
        else{
            $fileNameToStore  = 'noimage.jpg';
              
        }

        $posts = Post::count();
        $final = $posts + 1;
        $postId = 'postid'. $final;
        // dd($postId);

        // dd([$request->title, $request->body]);
        // dd(auth()->user()->post()); 
        auth()->user()->post()->create([
            'title' => $request->title,
            'body' => $request->body, 
            'postid' => $postId,
            'cover_image' => $fileNameToStore
        ]);
        return redirect()->route('posts.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('posts.show', [
            'post' => $post
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id === auth()->id()){
            return view('posts.edit', [
                'post' => $post
            ]);
        }
        return back()->with('error', 'Your not Authorize to Have that Link');
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($post);
        $postImage = $post->cover_image;
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        $del =  Storage::disk('local')->exists('public/cover_image/'.$post->cover_image);
        // dd($del);
        if($request->hasFile('cover_image')){
           if($del){
               if($postImage != 'noimage.jpg'){
                //   dd('true');
                  Storage::delete('public/cover_image/'.$post->cover_image);

                  $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                  // dd($filnameWithExt);
                  $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                  // dd($filename);
                  $fileExtension = $request->file('cover_image')->extension();
                  // dd($Extension);
                  $fileNameToStore = $filename.'_'.time().'_'.$request->user()->id.'.'.$fileExtension;
                  // dd($fileNameToStore);
                  $path = $request->file('cover_image')->storeAs(
                      'public/cover_image', $fileNameToStore
                  );
                  
               }
               else{
                    $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                    $fileExtension = $request->file('cover_image')->extension();
                    
                    $fileNameToStore = $filename.'_'.time().'_'.$request->user()->id.'.'.$fileExtension;
                    $path = $request->file('cover_image')->storeAs(
                        'public/cover_image', $fileNameToStore
                    );
               }
           }

        }
        else{
            $fileNameToStore = $postImage;
        }
        // dd([$request->title, $request->body]);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'cover_image' => $fileNameToStore
        ]);
        return redirect()->route('posts.show', $post->id)->with('status', ' This Post Updated Succesfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        // dd($post);
        if($post->user_id === auth()->id()){
            if($post->cover_image != 'noimage.jpg'){
                Storage::delete('public/cover_image/'.$post->cover_image);
                $post->delete();
                return redirect('/posts')->with('status', 'Yout just Deleted a Post');
            }
           
        }
        return back()->with('error', 'Your not Authorize to Have that Link');
    }
}

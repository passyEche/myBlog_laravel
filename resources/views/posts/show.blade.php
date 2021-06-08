@extends('layouts.app')
    @section('content')
    <div class="card">
            <h2 class="card-header mb-1  text-center">Show Page</h2>
            
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-4">
                                    <img style="width:100%" src="{{asset('storage/cover_image/'.$post->cover_image)}}" alt="">
                            </div>
                            <div class="col-md-4 col-sm-8">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->body}}</p>
                                    <small>Created on {{$post->created_at-> diffForHumans()}} written by <a href="{{route('users.posts', $post->user)}}">{{$post->user->name}}</a></small>
                                    <a href="{{route('posts.edit', $post)}}" class="btn btn-outline-secondary">Edit</a>
                                    <form action="{{route('posts.destroy', $post)}}" method="post" class=" form-inline mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                            </div>
                        </div>
                        
                        
                    <div>
                        
                    </div>
                    </div>
                  <div>
                       <div style="float:left">
                           @if ($post->likes->count() > 1)
                                <p class="ml-5">{{$post->likes->count()}} likes</p>
                            @else
                                 <p class="ml-5">{{$post->likes->count()}} like</p>
                                
                            @endif
                       </div>

                     @auth
                        <div style="float:right" class="mx-4">
                            @if(!$post->likedBy(auth()->user()))
                                
                                <form  action="{{route('posts.likes', $post->id)}}" method="post" class="mb-4">
                                @csrf
                                
                                    <button class="btn btn-outline-danger" type="submit">Like</button>
                                </form>
                            @else
                                <form action="{{route('posts.likes', $post->id)}}" method="post"  class="mb-4">
                                    @csrf
                                    @method("DELETE")
                                        <button class="btn btn-outline-warning" type="submit">UnLike</button>
                                </form>
                            @endif

                        </div>
                    @endauth
                  </div>
                
                   
              
        </div>
    @endsection
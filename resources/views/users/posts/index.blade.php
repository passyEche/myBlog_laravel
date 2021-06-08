@extends('layouts.app')
    @section('content')
            <div class="card">
                <h2 class="card-header mb-1 text-center">Post By {{$user->username}} with total of {{$user->post()->count() }} posts</h2>
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6 col-sm-4">
                                        <img style="width:100%" src="{{asset('storage/cover_image/'.$post->cover_image)}}" alt="">
                                </div>
                                <div class="col-md-6 col-sm-8"">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text">{{$post->body}}</p>
                                        <small>Created on {{$post->created_at->diffForHumans()}} written by <a href="{{route('users.posts', $post->user)}}">{{$post->user->name}}</small></a>
                                        {{-- <h2>{{$post->user}}</h2> --}}
                                        <a href="{{route('posts.show', $post)}}" class="btn btn-success">Read More</a>

                                </div>
                            </div>
                           
                            
                        </div>
                       
                        <div>
                                @auth
                                <div style="float:right">
                                    @if(!$post->likedBy(auth()->user()))
                                        
                                        <form style="float:right" action="{{route('posts.likes', $post->id)}}" method="post" 
                                        class="mx-4">
                                        @csrf
                                        
                                            <button class="btn btn-outline-danger" type="submit">Like</button>
                                        </form>
                                    @else
                                        <form style="float:right" action="{{route('posts.likes', $post->id)}}" method="post"  class="mx-4">
                                            @csrf
                                            @method("DELETE")
                                                <button class="btn btn-outline-warning" type="submit">UnLike</button>
                                        </form>
                                    @endif
    
                                </div>
                            @endauth
                                <div style="float:left">
                                    {{-- <p>{{count($post->likes)}}</p> --}}
                                    {{-- <p>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</p> --}}
                                    @if ($post->likes->count() > 1)
                                        <p class="ml-5">{{$post->likes->count()}} likes</p>
                                    @else
                                      <p class="ml-5">{{$post->likes->count()}} like</p>
                            
                                    @endif
                                    
                                </div>

                        </div>
                        
                       

                    @endforeach

                    {{$posts->links()}}
                @else
                  <p>There are no post Here</p>

                @endif
            </div>
    @endsection
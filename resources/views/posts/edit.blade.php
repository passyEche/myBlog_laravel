@extends('layouts.app')
  @section('content')
  <div class="jumbotron bg-gray">
      <div class="text-center ">
          <h1 class="display-4 text-primary"><u>Make Your Post Here</u> </h1>

      </div>
    <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="title" class="form-control @error('title') border-danger @enderror" id="title" placeholder="Title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="text-danger mt-2 text-sm">
                        * {{$message}}
                    </div>
                @enderror
        </div>
        {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
        <div class="form-group">
            {{-- <label for="body">Body</label> --}}
            <textarea name="body" cols="110" rows="10"  placeholder="Say Something About Your Title" class=" form-control @error('body') border-danger @enderror" id="body" >{{ old('title', $post->body) }}</textarea>
            @error('body')
                <div class="text-danger mt-2 text-sm">
                    * {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group custom-file ">
                <input type="file" class="form-control-file" name="cover_image" id="customFile" >
                <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
  </div>
  
      
      
  @endsection
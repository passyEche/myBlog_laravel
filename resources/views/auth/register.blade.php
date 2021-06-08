@extends('layouts.app')
  @section('content')
  <div class="jumbotron bg-gray">
      <div class="text-center ">
          <h1 class="display-4 text-primary"><u>Register Here</u> </h1>

      </div>
    <form action="{{route('register.store')}}" method="POST">
        @csrf
        <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control @error('name') border-danger @enderror" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger mt-2 text-sm">
                        * {{$message}}
                    </div>
                @enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="username" name="username" class="form-control  @error('username') border-danger @enderror"" id="username" value="{{ old('username') }}">
            @error('username')
                <div class="text-danger mt-2 text-sm">
                    * {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control  @error('email') border-danger @enderror" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger mt-2 text-sm">
                    * {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control  @error('password') border-danger @enderror"" id="password" value="">
          @error('password')
                <div class="text-danger mt-2 text-sm">
                    * {{$message}}
                </div>
          @enderror

        </div>
        <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password"name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
  </div>
  
      
      
  @endsection
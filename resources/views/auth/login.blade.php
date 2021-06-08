@extends('layouts.app')
  @section('content')
  <div class="jumbotron bg-gray">
      <div class="text-center mb-5 ">
          <h1 class="display-4  text-primary"><u>Login Here</u> </h1>
      </div>
      @if(session()->has('status'))
           <div class="text-center text-danger">
               * {{session('status')}}
           </div>
       @endif
     
    <form action="{{route('login.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control  @error('email') border-danger @enderror"" id="email" value="{{ old('email') }}">
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
        <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
  </div> 
@endsection
@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
        <h1 class="display-4{{$title}}</h1>
        <p class="lead">This is my Laravel app of my Blog Application. Is Gonna be Awsome</p>
        <hr class="my-4">
        @guest
          <p><a href="{{route('login.index')}}" class="btn btn-primary btn-lg" role="button">Login</a> <a href="{{route('register.index')}}" class="btn btn-success btn-lg">Register</a></p>
        @endguest
      </div>
       
       <h1></h1>
</div>
    
@endsection
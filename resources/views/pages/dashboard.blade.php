@extends('layouts.app')
    @section('content')
            <div class="jumbotron text-center">
                    <h1 class="display-4">The Blogger Users Here in this App !</h1>
                    @if(count($users) > 0)
                    <ul class="list-group">
                        @foreach($users as $user)
                        <li class="list-group-item">{{$user->name}}</li>
                        @endforeach
                    </ul>
               @endif
                    <hr>
            </div>
    @endsection
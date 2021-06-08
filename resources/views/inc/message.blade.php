@if(session('status'))
    <div class="alert alert-success text-center my-2">
        {{session('status')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center my-2">
        {{session('error')}}
    </div>
@endif
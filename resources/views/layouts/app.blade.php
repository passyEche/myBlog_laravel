<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    {{-- <title>Document</title> --}}
    <title>{{ config('app.name', 'myBlog') }}</title>

</head>
<body class="">
    <div id="app ">

            @include('inc.navbar')
            @include('inc.message')


            <div class="container">
                      @yield('content')

            </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
           $(document).ready(function(event){
            //    alert('Helloo');
            //    console.log('Eche');
            $('#customFile').on('change', function(){
                    //get the file name
                    var fileName = $(this).val().split("\\").pop();
                    //replace the "Choose a file" label
                    $(this).next('.custom-file-label').html(fileName);
                })
           })
    </script>

    
    
</body>
</html>
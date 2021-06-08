<nav class="navbar navbar-expand-lg navbar-dark light bg-dark">
    <div class="container">
            <a class="navbar-brand" href="{{route('posts.index')}}">{{ config('app.name', 'myBlog') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('land.page')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{route('services')}}">Services</a>
                </li>
              </ul>
              <ul class="nav navbar-nav ml-auto navbar-right">
                  <li class="nav-item "><a class="nav-link" href="{{route('login.index')}}">Login</a></li>

                  <li class="nav-item"><a class="nav-link" href="{{route('register.index')}}">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('posts.create')}}">create post</a></li>
                  <li class="nav-item dropdown inline"><a class="dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Username
                      </a>
                      <ul class="dropdown-menu pl-auto">
                            <li class="dropdown-item nav-item"><a href="{{route('dashboard')}}" class="">Dashboard</a></li>

                            <li class="dropdown-item nav-item">
                              <form action="{{route('logout.store')}}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">Logout</button>
                              </form>
                            </li>

                            <li class="dropdown-item"><a href="" class="">Something else here</a></li>
                            {{-- <a class="dropdown-item" href=>Dashdboard</a>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </ul>

                    {{-- <ul class="dropdown-menu" role="menu">
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Logout</a></li>

                    </ul> --}}
                 {{-- </li> --}}

              </ul>
              {{-- <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <p>Name</p>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </div>
            </div> --}}

    </div>
       
      </nav>
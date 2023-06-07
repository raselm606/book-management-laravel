<div class="top-header">
    <div class="container">
        <div class="dropdown float-right">
            <a class="dropdown-toggle pointer top-header-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                @if(Auth::check() && Auth::user()->role == '0')
                    {{Auth::user()->name}}
                @else
                    My Account
                    @endif
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if(Auth::check() && Auth::user()->role == '0')

                    <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                    <a class="dropdown-item" href="{{url('admin')}}">Dashboard</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>


                @else

                    <a class="dropdown-item" href="{{url('login')}}">Login</a>
                    <a class="dropdown-item" href="{{url('signup')}}">Signup</a>
                @endif


            </div>
        </div>
        <div class="float-right">
            <a href="" class="top-header-link"><span class="item">10</span> items in wishlist</a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="main-navbar">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand mr-5" href="{{url('/')}}">
                <img src="{{asset('front_assets/images/logo.jpg')}}" class="logo-image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="top-books.html">Top Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter Books By</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Filter By Top Borrowed</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Upload Books</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="upload.html">Upload Now</a>
                            <a class="dropdown-item" href="rules.html">Upload Rules</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 search-form" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0 search-button" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
</div>

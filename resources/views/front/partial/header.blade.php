<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Shelter Seeker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                 <li class="nav-item "><a href="{{route('home.main')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('home.about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('home.services') }}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ route('home.agent') }}" class="nav-link">Agent</a></li>
                <li class="nav-item"><a href="{{ route('home.contact') }}" class="nav-link">Contact</a></li>
                @if (Auth::check() )
                    <li class="nav-item px-1 dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu text-center text-lg-start shadow-sm"
                            aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item px-1">
                        <a class="nav-link" href="{{ route('login.page') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

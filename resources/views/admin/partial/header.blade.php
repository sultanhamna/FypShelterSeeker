<nav class="sb-topnav navbar navbar-expand navbar-dark header">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html"id="shelter" ><b>Shelter Seeker</b></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ">
        <li class="nav-item dropdown ">
            @if (Auth::check() && Auth::user()->role == 'admin')
        <li class="nav-item px-1 dropdown ">
            <a class="nav-link px-4 dropdown-toggle sidecontent" id="navbarDropdownMenuLink" href="#" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
              <b class="sidecontent">{{ Auth::user()->name }}</b>
            </a>
            <div class="dropdown-menu  text-center text-lg-start shadow-sm" aria-labelledby="navbarDropdownMenuLink">

                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                <a class="dropdown-item" href="{{ route('admin.edit') }}">Edit</a>
            </div>



        </li>
    @else
        <li class="nav-item px-1">
            <a class="" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        </li>
            @endif
        </li>
    </ul>
</nav>

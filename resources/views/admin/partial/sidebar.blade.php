<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion " id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link " href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-tachometer-alt"></i></div>
                    <b class="sidecontent"> Dashboard</b>
                </a>
                <a class="nav-link " href="{{ route('user.data') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-users"></i></div>
                    <b class="sidecontent"> Users</b>
                </a>

                <a class="nav-link  " href="{{ route('index.category') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-building"></i></div>
                    <b class="sidecontent"> Category</b>
                </a>
                <a class="nav-link " href="{{ route('index.Type') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-home"></i></div>
                    <b class="sidecontent"> Type</b>
                </a>

                <a class="nav-link " href="{{ route('index.Size') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-ruler"></i></div>
                    <b class="sidecontent"> Size</b>
                </a>

                <a class="nav-link " href="{{ route('index.location') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-map-marker-alt"></i></div>
                    <b class="sidecontent"> Location</b>
                </a>

                 <a class="nav-link " href="{{route('index.Status')}}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-circle"></i></div>
                    <b class="sidecontent">Status</b>
                </a>

                <a class="nav-link " href="{{ route('index.Post') }}">
                    <div class="sb-nav-link-icon sidecontent "><i class="fas fa-shopping-cart"></i></div>
                    <b class="sidecontent"> Post</b>
                </a>

                <a class="nav-link " href="{{ route('index.Property') }}">
                    <div class="sb-nav-link-icon sidecontent"><i class="fas fa-landmark"></i></div>
                    <b class="sidecontent"> Property</b>
                </a>
            </div>
        </div>
    </nav>
</div>

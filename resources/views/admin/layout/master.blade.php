<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Seeker</title>
    @include('admin.partial.style')
    @yield('style')
    <style>

        #layoutSidenav_nav
        {
            background: linear-gradient( #ffff,#191645 );

        }
        .header
        {
            background-color:#43CBAC ;
        }
        .footer
        {
            background-color:#43CBAC ;
        }
        .navbar-brand
        {
            color:#191645 ;

        }
        .navbar-brand:hover
        {
            color: #191645;

        }
        .fa-bars
        {
           color: #191645;
        }

        .sidecontent
        {
            color: #191645;
        }
        .sidecontent:hover
        {
            color: #191645;
        }
        .profile
        {
            color: #191645;
        }
        .profile:hover
        {
            background-color: #43CBAC;
            color:#191645;
        }
        .categoryBtn
        {
            background-color: #43CBAC;
            color:#191645 ;
            border-radius: 5px;
        }
        .categoryBtn:hover
        {
            background-color: #43CBAC;
            color:#191645 ;
        }
        .submitCategory
        {
            background-color: #191645;
            color: #43CBAC;
        }
        .submitCategory:hover
        {
            background-color: #191645;
            color: #43CBAC;
        }
        .categoryCard
        {
            background-color: #43CBAC;
            width: 70%;

        }

        .cardContainer
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .productContainer
        {
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .productCard
        {
            background-color: #43CBAC;
            width: 70%;
            margin-bottom: 50px;
            margin-top: 50px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    @include('admin.partial.header')
    <div id="layoutSidenav">
        @include('admin/partial/sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('admin.partial.footer')
        </div>
    </div>

    @include('admin.partial.script')
    @yield('script')
</body>

</html>

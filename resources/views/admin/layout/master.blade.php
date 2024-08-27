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

            background-color:#6A9C89 ;
        }
        .header
        {
            background-color:#C1D8C3 ;
        }
        .footer
        {
            background-color:#C1D8C3 ;
        }
        .navbar-brand
        {
            color:#6A9C89 ;

        }
        .navbar-brand:hover
        {
            color: #6A9C89;

        }
        .fa-bars
        {
           color: #6A9C89;
        }

        .sidecontent
        {
            color: #ffffff;
        }
        .sidecontent:hover
        {
            color: #ffffff;
        }
        .admiName
        {
            color: #6A9C89;
        }
        .admiName:hover
        {
            color: #6A9C89;
        }
        .profile
        {
            color: #6A9C89;
        }
        .profile:hover
        {
            background-color: #C1D8C3;
            color:#6A9C89;
        }
        .form-group
        {
            color:#ffffff;
        }
        .categoryBtn
        {
            background-color: #C1D8C3;
            color: #ffffff ;
            border-radius: 5px;
        }
        .categoryBtn:hover
        {
            background-color: #C1D8C3;
            color: #ffffff ;
        }
        .btn-lg
        {
            background-color: #C1D8C3;
            color: #ffffff ;
        }
        .submitCategory
        {
            background-color: #6A9C89;
            color: #ffffff !important; /* Force the text color to stay white */
            font-weight: bold;
            border: none;
        }

       .submitCategory:hover,
       .submitCategory:active,
       .submitCategory:focus
       {
            background-color: #6A9C89;
            color: #ffffff !important; /* Force the text color to stay white */
            outline: none;
            box-shadow: none;
       }

        .categoryCard
        {
            background-color: #C1D8C3;
            width: 70%;

        }
        .info-panel
        {
            width: 250px; /* or any fixed width you want */
            margin: 20px; /* or any margin you want */
            display: block;
            margin-left: auto;
            margin-right: auto;
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
            background-color: #C1D8C3;
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

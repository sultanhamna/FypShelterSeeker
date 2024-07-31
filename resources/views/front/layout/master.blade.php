<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Seeker</title>
    @include('front.partial.style')
    <style>
        .container {
            padding: 20px;
        }

        .property-wrap {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .img {
            height: 200px;
            overflow: hidden;
        }

        .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text {
            padding: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .location {
            font-size: 14px;
            color: #555;
        }

        .property_list {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .property_list li {
            display: inline-block;
            margin-right: 10px;
        }

        .property_list li span {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #f0f0f0;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            margin-right: 5px;
            font-size: 12px;
        }
        </style>
</head>
<body>
    @include('front.partial.header')
    @yield('content')


    @include('front.partial.footer')
     <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    @include('front.partial.script')
</body>
</html>

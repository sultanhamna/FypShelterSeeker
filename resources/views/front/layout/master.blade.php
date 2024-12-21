<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Seeker</title>
    @include('front.partial.style')
    <style>

/* Container for the page */
.container {
    width: 80%;
    margin: 0 auto;
}

.product-slider img {
    width: 100%;
    height: auto;
}

.product-card {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 20px;
    text-align: center;
}


/* Products Section */
.products {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.products h2 {
    text-align: center;
    margin-bottom: 30px;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product-card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    width: 250px;
    text-align: center;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.product-card h3 {
    margin-top: 10px;
    font-size: 1.2em;
}

.product-card p {
    margin: 10px 0;
}

.product-card .btn {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s; /* Smooth transition */
}

/* For Mobile Devices */
@media (max-width: 768px) {
    .modal-dialog {
        margin: 0; /* Remove margin for full-screen effect */
        width: 100%; /* Make the modal take full width */
        height: 100%; /* Make the modal take full height */
    }
    .modal-content {
        height: 100%; /* Ensure the content area takes full height */
        border-radius: 0; /* Remove corners for full screen effect */
    }
    .modal-body {
        padding: 0; /* Remove padding */
        height: 100%; /* Make body take full height */
    }
    .ratio {
        height: 100%; /* Ensure iframe fills the entire body */
    }
    iframe {
        width: 100%; /* Make iframe full-width */
        height: 100vh; /* Make iframe take full height of the screen */
    }
}

.hero-wrap {
    background-size: cover;  /* Ensure the background image covers the container */
    background-position: center;  /* Center the background image */
    background-repeat: no-repeat;  /* Prevent the background from repeating */
    width: 100%;  /* Make sure the container takes the full width */
    height: 100vh;  /* Set a default height */
}

/* Media query for mobile devices */
@media (max-width: 767px) {
    .hero-wrap {
        background-size: contain;  /* Ensure the image fits within the container */
        height: 60vh;  /* Adjust the height for mobile devices */
    }
}

/* Media query for larger screens (e.g., laptops) */
@media (min-width: 768px) {
    .hero-wrap {
        background-size: cover;  /* Keep it covering the entire container on larger screens */
        height: 100vh;  /* Full viewport height */
    }
}


.product-card .btn:hover,
.product-card .btn:active {
    background-color: #FF00FF;  /* Magenta color for hover, focus, and active states */
}

.product-card .btn:focus {
    outline: none; /* Remove focus outline if you want */
}


/* Header Styles */
header {
    background-color: white; /* Background color */
    color: black; /* Text color */
    padding: 15px 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; /* Ensure the header stays on top */
    background-image: url('https://example.com/your-image.jpg'); /* Change the URL to your background image */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header .logo h3 {
    font-family: 'Arial', sans-serif;
    font-size: 2em;
    margin: 0;
    letter-spacing: 1px;
}

nav ul {
    list-style-type: none;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: black;
    font-size: 1.1em;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #FF00FF; /* Hover color */
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
    header .logo h3 {
        font-size: 1.8em;
    }

    nav ul {
        display: none; /* Hide navigation menu by default */
        flex-direction: column;
        width: 100%;
        align-items: center;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #c7d3ac;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        padding: 20px 0;
    }

    nav ul.active {
        display: flex; /* Show menu when active */
    }

    nav ul li {
        margin: 10px 0;
    }

    nav ul li a {
        font-size: 1.2em;
        color: black;
    }

    .menu-toggle {
        display: flex;
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
    }

    .menu-toggle .bar {
        width: 30px;
        height: 4px;
        background-color: black;
    }

    .header-container {
        padding: 0 15px;
    }
}

/* Footer Styles */
footer {
    background-color: white; /* Background color for footer */
    color: black; /* Text color */
    padding: 40px 0;
    font-size: 1em;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.footer-section {
    flex: 1;
    margin: 10px 20px; /* Add space between sections */
    text-align: center; /* Center-align text for consistency */
}

footer h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #FF00FF; /* Gold color for headings */
}

footer p, footer ul {
    font-size: 1.1em;
}

footer ul {
    list-style-type: none;
    padding: 0;
}

footer ul li {
    margin: 5px 0;
}

footer ul li a {
    text-decoration: none;
    color: black;
    transition: color 0.3s ease;
}

footer ul li a:hover {
    color: black; /* Hover color */
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 15px; /* Add spacing between social links */
}

.social-links li a {
    font-size: 1.2em;
    color: black;
    transition: color 0.3s ease;
}

.social-links li a:hover {
    color: black; /* Hover color for social media links */
}

.footer-bottom {
    background-color: #FF00FF; /* Footer bottom background color */
    padding: 20px 0;
    color: black;
    font-size: 1em;
    text-align: center;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column; /* Stack sections vertically */
        align-items: center; /* Center-align content */
    }

    .footer-section {
        margin-bottom: 20px;
    }

    .social-links {
        flex-wrap: wrap; /* Allow wrapping if needed */
        gap: 10px;
    }
}


        .property-wrap .img img
        {
            width: 100%; /* Makes image responsive */
            height: 300px; /* Set a fixed height */
            object-fit: cover; /* Crops image to fit container while maintaining aspect ratio */
            display: block;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .button-group a
         {
         margin: 0 5px;
         width: 40px;
         text-align: center;
         color: #fff; /* Ensures icon color is always white */
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

    @include('front.partial.script')
</body>
</html>

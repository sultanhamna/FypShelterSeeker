@extends('front.layout.master')
@section('content')

  <!-- Hero Section with background image -->
  <div class="hero-wrap bg-img" style="background-image: url('assets/front/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center w-100">
              <h1 class="mb-4">Product Details</h1>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!-- Product Detail Section -->
  <section id="product-details" class="product-details">
    <div class="container">
      <div class="row">
        <!-- Product Image (Half screen) -->
        <div class="col-md-6">
          @if ($product->Pics->isNotEmpty())
            <img src="{{ asset('storage/' . $product->Pics->first()->product_image) }}" alt="{{ $product->name }}" class="img-fluid">
          @else
            <img src="{{ asset('storage/default-product.jpg') }}" alt="No Image" class="img-fluid">
          @endif
        </div>

        <!-- Google Map (Other Half of screen) -->
        <div class="col-md-6">
          <h3>{{ $product->name }}</h3>
          <p><strong>Location:</strong> {{ $product->product_location }}</p>
          <p><strong>Timing:</strong> {{ $product->timing }}</p>

          <!-- Google Map Section -->
          <h4 class="mt-4">Location on Google Map</h4>
          <div id="google-map" style="height: 400px;"></div>
        </div>
      </div>

      <!-- View Details Button -->
      <div class="row mt-5">
        <div class="col-md-12">
          <a href="#" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
  <!-- Google Maps API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdnV89cve-FxaeOY-t-X71rvov5F5pq6Y&callback=initMap" async defer></script>

  <script>
    function initMap() {
      var productLocation = {
        lat: parseFloat('{{ $product->location_latitude }}'),
        lng: parseFloat('{{ $product->location_longitude }}')
      };

      var map = new google.maps.Map(document.getElementById('google-map'), {
        zoom: 15,
        center: productLocation
      });

      var marker = new google.maps.Marker({
        position: productLocation,
        map: map,
        title: '{{ $product->name }}'
      });
    }
  </script>
@endsection

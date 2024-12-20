@extends('front.layout.master')
@section('content')
  <div class="hero-wrap bg-img" style="background-image: url('assets/front/images/bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">

      </div>

  </div>

  <section id="products" class="products">
    <div class="container">
      <h2>Our Products</h2>
      <div class="product-list">
        @foreach ($products as $product)
          <div class="product-card">
            <!-- Carousel for Product Images -->
            @if ($product->Pics->isNotEmpty())
              <div id="carouselExampleIndicators{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  @foreach ($product->Pics as $key => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators{{ $product->id }}" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
                  @endforeach
                </div>
                <div class="carousel-inner">
                  @foreach ($product->Pics as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                      <img src="{{ asset('storage/' . $image->product_image) }}" class="d-block w-100" alt="{{ $product->name }}">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $product->id }}" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $product->id }}" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @else
              <img src="{{ asset('storage/default-product.jpg') }}" alt="No Image" class="d-block w-100">
            @endif

            <!-- Display Product Location and Timing -->
            <p><strong>Location:</strong> {{ $product->product_location }}</p>
            <p><strong>Timing:</strong> {{ $product->timing }}</p>

            <!-- View Details Button -->
            <a href="{{route('product.detail' , $product->id)}}" class="btn">View Details</a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection

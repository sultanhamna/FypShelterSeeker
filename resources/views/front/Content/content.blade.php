@extends('front.layout.master')
@section('content')
  <div class="hero-wrap bg-img" style="background-image: url('assets/front/images/bg.jpg');" data-stellar-background-ratio="0.5">
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
                      <!-- Set fixed height for the image -->
                      <img src="{{ asset('storage/' . $image->product_image) }}" class="d-block w-100" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
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
              <!-- Set fixed height for the image when no product image exists -->
              <img src="{{ asset('storage/default-product.jpg') }}" alt="No Image" class="d-block w-100" style="height: 200px; object-fit: cover;">
            @endif

            <!-- Display Product Location and Timing -->
            <p><strong>Location:</strong> {{ $product->product_location }}</p>
            <p><strong>Timing:</strong> {{ $product->timing }}</p>


            <!-- View Location Button -->
<button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#mapModal">
    <i class="fas fa-map-marker-alt"></i> View Location
</button>

<!-- Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Responsive iframe container -->
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d29038.464692054087!2d54.66114493016416!3d24.52672225147706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3e5e4e1a9db0e57d%3A0x5cab20368e2e8d3b!2sAl%20Rahbah%20-%20New%20Shahamah%20-%20Abu%20Dhabi%20-%20United%20Arab%20Emirates!3m2!1d24.5248688!2d54.683555299999995!5e0!3m2!1sen!2s!4v1734756941553!5m2!1sen!2s"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
          </div>

        @endforeach
      </div>
    </div>
  </section>
@endsection

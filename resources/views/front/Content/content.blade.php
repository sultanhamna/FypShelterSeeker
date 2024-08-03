@extends('front.layout.master')
@section('content')
  <div class="hero-wrap bg-img" style="background-image: url('assets/front/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text text-center w-100">
	            <h1 class="mb-4">Find Properties <br>That Make You Money</h1>
	            <p><a href="#" class="btn btn-primary py-3 px-4">Search Properties</a></p>
            </div>
          </div>
        </div>
      </div>
        <div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
				</a>
			</div>
        </div>
        <section class="ftco-section ftco-no-pb">
    	    <div class="container">
	    	    <div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate">
                            <form action="" method="" class="search-property-1">
                                @csrf
                                <div class="row">
                                    <!-- Property Type Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Location</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="property_location" id="property_location" class="form-control">
                                                        <option value="">Location</option>
                                                        @foreach ($locations as $location)
                                                            <option value="{{ $location->property_location }}">{{ $location->property_location }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Property Type Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Type</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="property_type" id="property_type" class="form-control">
                                                        <option value="">Type</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->property_type }}">{{ $type->property_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Property Status Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Status</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="property_status" id="property_status" class="form-control">
                                                        <option value="">Status</option>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->property_status }}">{{ $status->property_status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-lg align-self-end">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search Property" class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
					</div>
	    	    </div>
	        </div>
        </section>

   <!-- In your view -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Exclusive Offer For You</h2>
            </div>
        </div>
        <div class="row">
            @foreach($properties as $property)
            <div class="col-md-4">
                <div class="property-wrap">
                    <div class="img">
                        @if(count($property->Images) > 0)
                            <div id="carouselExampleControls{{ $property->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($property->Images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/'.$image->property_images) }}" alt="Property Image">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls{{ $property->id }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls{{ $property->id }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="text">
                        <p class="price mb-3"><span class="">${{ $property->price }}</span></p>
                        <h3 class="mb-0"><a href="properties-single.html">{{ $property->type->property_type }}</a></h3>
                        <span class="location d-inline-block mb-3"><i class=" fas fa-map-marker-alt"></i> &nbsp;{{ $property->location->property_location }}</span>
                        <ul class="property_list">
                            <li><span class=""></span>{{ $property->status->property_status }}</li>
                            <li><span class=""></span>{{ $property->post->property_post }}</li>
                            <li><span class=""></span>{{ $property->areaSize->property_size}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Find Properties</span>
            <h2 class="mb-2">Find Properties In Your City</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-1.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-2.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-3.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-4.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-5.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('assets/front/images/listing-6.jpg');">
        			<div class="location">
        				<span class="rounded">New York, USA</span>
        			</div>
        			<div class="text">
        				<h3><a href="#">100 Property Listing</a></h3>
        				<a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
        			</div>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url('assets/front/images/person_1.jpg')"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url('assets/front/images/person_2.jpg')"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url('assets/front/images/person_3.jpg')"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url('assets/front/images/person_1.jpg')"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url('assets/front/images/person_2.jpg')"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-agent">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Agents</span>
            <h2 class="mb-4">Our Agents</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="{{asset('assets/front/images/team-1.jpg')}}" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Ben Ford</a></h3>
								<p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">43 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="{{asset('assets/front/images/team-2.jpg')}}" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">John Cooper</a></h3>
								<p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">28 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="{{asset('assets/front/images/team-3.jpg')}}" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Janice Clinton</a></h3>
								<p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">30 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="agent">
    					<div class="img">
		    				<img src="{{asset('assets/front/images/team-4.jpg')}}" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3><a href="properties.html">Eunice Henceford</a></h3>
								<p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">25 Properties</span></p>
	    				</div>
    				</div>
        	</div>
        </div>
    	</div>
    </section>


    <section class="ftco-section ftco-no-pt">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('assets/front/images/image_1.jpg');">
	              </a>
                <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">October 17, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('assets/front/images/image_2.jpg');">
	              </a>
                <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">October 17, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('assets/front/images/image_3.jpg');">
	              </a>
                <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">October 17, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('assets/front/images/image_4.jpg');">
	              </a>
                <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">October 17, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection


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
                            <form action="{{ route('properties.filter') }}" method="get" class="search-property-1">
                                @csrf
                                <div class="row">
                                    <!-- Property Location Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Location</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="property_location" id="property_location" class="form-control">
                                                        <option value="">Location</option>
                                                        @foreach ($locations as $location)
                                                            <option value="{{ $location->id }}"
                                                                {{ request('property_location') == $location->id ? 'selected' : '' }}>
                                                                {{ $location->property_location }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Property Category Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Category</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="category_name" id="category_name" class="form-control">
                                                        <option value="">Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ request('category_name') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->category_name }}
                                                            </option>
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
                                                            <option value="{{ $type->id }}"
                                                                {{ request('property_type') == $type->id ? 'selected' : '' }}>
                                                                {{ $type->property_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Property Post Field -->
                                    <div class="col-lg align-items-end">
                                        <div class="form-group">
                                            <label for="#">Property Post</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <select name="property_post" id="property_post" class="form-control">
                                                        <option value="">Post</option>
                                                        @foreach ($posts as $post)
                                                            <option value="{{ $post->id }}"
                                                                {{ request('property_post') == $post->id ? 'selected' : '' }}>
                                                                {{ $post->property_post }}
                                                            </option>
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
                                                <button id="searchButton" class="form-control btn btn-primary">
                                                    Search Property
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


      <section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Exclusive Offer For You</h2>
            </div>
        </div>

        <div class="row">
            @if($properties->isEmpty())
                <div class="col-12 text-center">
                    <p>No properties matching your search criteria.</p>
                </div>
            @else
                @foreach($properties as $property)
                    <div class="col-md-4">
                        <div class="property-wrap">
                            <div class="img">
                                @if(count($property->Images) > 0)
                                    <div id="carouselExampleControls{{ $property->id }}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($property->Images as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('storage/'.$image->property_images) }}" alt="Property Image" style="width: 100%; height: 250px; object-fit: cover;">
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
                                <p class="price mb-3"><span>{{ $property->price }}</span></p>
                                <h3 class="mb-0"><a href="properties-single.html">{{ $property->type->property_type }}</a></h3>
                                <span class="location d-inline-block mb-3"><i class="fas fa-map-marker-alt"></i> &nbsp;{{ $property->location->property_location }}</span>
                                <ul class="property_list">
                                    <li><span></span>{{ $property->status->property_status }}</li>
                                    <li><span></span>{{ $property->post->property_post }}</li>
                                    <li><span></span>{{ $property->category->category_name }}</li>
                                </ul>

                                <div class="button-group mt-3">
                                    <!-- Display the Calculate Button only for "buy" properties -->
                                    @if($property->post->property_post == 'Buy') <!-- Adjust this condition based on your actual field -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calculatorModal{{ $property->id }}">
                                            <i class="fas fa-calculator"></i> <!-- Font Awesome calculator icon -->
                                        </button>

                                        <!-- Modal for Calculator -->
                                        <div class="modal fade" id="calculatorModal{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="calculatorModalLabel{{ $property->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="calculatorModalLabel{{ $property->id }}">Property Purchase Calculator</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="monthly_salary{{ $property->id }}">Monthly Salary:</label>
                                                            <input type="number" id="monthly_salary{{ $property->id }}" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="years{{ $property->id }}">Number of Years:</label>
                                                            <input type="number" id="years{{ $property->id }}" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="property_price{{ $property->id }}">Property Price:</label>
                                                            <input type="number" id="property_price{{ $property->id }}" class="form-control" value="{{ $property->price }}" readonly required>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" onclick="calculateMonthlyPayment({{ $property->price }}, {{ $property->id }})">Calculate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for Result -->
                                        <div class="modal fade" id="resultModal{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel{{ $property->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="resultModalLabel{{ $property->id }}">Calculation Result</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="resultBody{{ $property->id }}">
                                                        <!-- Result will be displayed here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- WhatsApp Button with Icon -->
                                    <a href="https://wa.me/03021608143" class="btn btn-success btn-sm whatsapp-btn" target="_blank" title="WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>

                                    <!-- Call Button with Icon -->
                                    <a href="tel:+9203246903759" class="btn btn-info btn-sm call-btn" title="Call">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if(request()->has('category_name') || request()->has('property_post') || request()->has('property_type') || request()->has('property_location'))
            @if($properties->hasPages())
                <div class="pagination-area text-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- Previous Page Link -->
                            @if ($properties->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $properties->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            <!-- Pagination Links -->
                            @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $properties->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($properties->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $properties->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        @endif
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

@endsection
@section('style')
<style>
    .btn.loading {
       background-color: #007bff;
       cursor: wait;
    }
 </style>

@endsection
@section('script')
<script>
    document.getElementById("searchButton").addEventListener("click", function(e) {
       e.preventDefault();
       this.classList.add("loading");
       this.innerHTML = "Searching...";
       setTimeout(() => {
          this.classList.remove("loading");
          this.innerHTML = "Search Property";
       }, 3000); // Reset after 3 seconds for demo
    });
 </script>
 @endsection

 <script>
    function calculateMonthlyPayment(propertyPrice, propertyId) {
        // Get input values from the modal
        const monthlySalary = parseFloat(document.getElementById('monthly_salary' + propertyId).value);
        const years = parseInt(document.getElementById('years' + propertyId).value);

        // Validate input values
        if (isNaN(monthlySalary) || monthlySalary <= 0) {
            alert('Please enter a valid salary.');
            return; // Exit if the input is not valid
        }

        if (isNaN(years) || years <= 0) {
            alert('Please enter a valid number of years.');
            return; // Exit if the input is not valid
        }

        // Calculate the total number of months for the loan
        const totalMonths = years * 12;

        // Calculate the monthly payment
        const monthlyPayment = propertyPrice / totalMonths;

        // Check if the monthly payment exceeds the user's salary
        let resultMessage;
        if (monthlyPayment > monthlySalary) {
            resultMessage = ` The salary is less than your Monthly payment . Please increase the number of years.`;
        } else {
            resultMessage = `You will need to pay ${monthlyPayment.toFixed(2)} every month for ${years} years.`;
        }

        // Display the result in the result modal
        document.getElementById('resultBody' + propertyId).innerText = resultMessage;

        // Close the calculator modal and show the result modal
        $('#calculatorModal' + propertyId).modal('hide');
        $('#resultModal' + propertyId).modal('show');
    }
</script>

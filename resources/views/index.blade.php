@extends("layout.master")

@section("content")


<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  					
                <form action="{{ route('showAvailableCars') }}" method="POST" class="request-form ftco-animate bg-primary" id="carForm">
                  @csrf
                  <h2>Make your trip</h2>
                  <div class="form-group">
                    <label for="" class="label">Country</label>
                    <input type="text" name="country" class="form-control" placeholder="Country">
                    <small id="Error" class="text-danger"></small>
                  </div>
                  <div class="form-group">
                    <label for="" class="label">Pick-up location</label>
                    <input type="text" name="pick_up_location" class="form-control" placeholder="City, Airport, Station, etc">
                    <small id="pickUpLocationError" class="text-danger"></small>
                  </div>
                  {{-- <div class="form-group">
                    <label for="" class="label">Drop-off location</label>
                    <input type="text" name="drop_off_location" class="form-control" placeholder="City, Airport, Station, etc">
                    <small id="dropOffLocationError" class="text-danger"></small>
                  </div> --}}
                  <div class="d-flex">
                    <div class="form-group mr-2">
                      <label for="" class="label">Pick-up date</label>
                      <input type="date" name="pick_up_date" class="form-control col-md-12" placeholder="Date">
                      <small id="pickUpDateError" class="text-danger"></small>
                    </div>
                    <div class="form-group ml-2">
                      <label for="" class="label">Drop-off date</label>
                      <input type="date" name="drop_off_date" class="form-control col-md-12" placeholder="Date">
                      <small id="dropOffDateError" class="text-danger"></small>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="form-group mr-2">
                      <label for="" class="label">Min Price</label>
                      <input type="text" name="min_price" class="form-control col-md-12" placeholder="min price">
                      <small id="minPriceError" class="text-danger"></small>
                    </div>
                    <div class="form-group ml-2">
                      <label for="" class="label">Max Price</label>
                      <input type="text" name="max_price" class="form-control col-md-12" placeholder="max price">
                      <small id="maxPriceError" class="text-danger"></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="label">Pick-up time</label>
                    <input type="text" name="time_pick" class="form-control" id="time_pick" placeholder="Time">
                    <small id="pickUpTimeError" class="text-danger"></small>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                  </div>
                </form>

	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#sale" class="btn btn-primary py-3 px-4">OR Sale Your Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>
 
    <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      @if (Session::has('found'))
      <div class="row justify-content-center">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Your Options</span>
            <h2 class="mb-2">Available Cars:</h2>
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12 m-3">
                   {{-- @foreach ($booking as $bookings)
                     
                   
                   @if ($bookings->car_id === null)
                        --}}
                   
                    @if ($availableCars->isEmpty())
                        <p>No car available for the selected dates.</p>
                    @else
                        <div class="col-md-12">
                            <div class="col-md-4">
                                @foreach($availableCars as $car)
                                    <div class="item">
                                        <div class="car-wrap rounded ftco-animate">
                                            <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('images/' . $car['img_1']) }}');">
                                            </div>
                                            <div class="text">
                                                <h2 class="mb-0"><a href="#">{{ $car['name'] }}</a></h2>
                                                <div class="d-flex mb-3">
                                                    <span class="cat">{{ $car['transmission'] }}</span>
                                                    <p class="price ml-auto">JOD{{ $car['price'] }} <span>/day</span></p>
                                                </div> 
                                                <p class="d-flex mb-0 d-block">
                                                    <a href="{{ route('car_single', ['id' => $car->id]) }}" class="btn btn-secondary py-2 ml-1">Book now</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- @endif
                    @endforeach --}}

                @endif
            </div>
        </div>
    </div>
</section>

  @if (Session::has('found'))
      
  @else
      
  
    <section class="ftco-section ftco-no-pt bg-light">
     
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Vehicles</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
             
						@foreach($car as $cars)
            @if ($cars->type_id===1)
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('images/' . $cars['img_1']) }}');">


		    					</div>
		    					<div class="text">
                 <h2 class="mb-0"> <a href="#">{{ $cars['name']  }}</a> </h2>

		    						<div class="d-flex mb-3">
                    <span class="cat">{{  $cars['transmission']  }}</span>

                    <p class="price ml-auto">JOD{{  $cars['price']  }} <span>/day</span></p>

                    </div>

                      <p class="d-flex mb-0 d-block">
                         <a href="{{  route('car_single', ['id' => $cars['id']])  }}" class="btn btn-secondary py-2 ml-1">Book now</a>
                      </p>

		    					</div>
		    				</div>
    					</div>
            @endif
						@endforeach
    			
    					
    				</div>
    			</div>
    		</div>

        
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light" id="sale">
      
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Sale Section</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
              {{-- isset($carSale) && !$carSale->isEmpty() --}}
            {{-- @if ($carSale) --}}
						    @foreach($car as $cars)
   @if ($cars->type_id===2)
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('images/' . $cars['img_1']) }}');">


		    					</div>
		    					<div class="text">
                 <h2 class="mb-0"> <a href="#">{{ $cars['name']  }}</a> </h2>

		    						<div class="d-flex mb-3">
                    <span class="cat">{{  $cars['transmission']  }}</span>

                    <p class="price ml-auto">JOD{{  $cars['price']  }} <span>/day</span></p>

                    </div>

                      <p class="d-flex mb-0 d-block">
                         <a href="{{  route('car_single_sale', ['id' => $cars['id']])  }}" class="btn btn-secondary py-2 ml-1">Sale Now</a>
                      </p>

		    					</div>
		    				</div>
    					</div>
              @endif

						    @endforeach
    					
            {{-- @endif --}}
    					
    				</div>
    			</div>
    		</div>

        
    	</div>
    </section>
  @endif
    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to Carbook</h2>

	            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	            <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-3">Our Latest Services</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Wedding Ceremony</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">City Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Airport Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Whole City Tour</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
            <a href="{{ url('sign_lessor')}}" class="btn btn-primary btn-lg">Become A Lessor</a>
          </div>
				</div>
			</div>
		</section>


    {{-- <section class="ftco-section testimony-section bg-light">
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
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    {{-- <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>	 --}}

    {{-- <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="60">0</strong>
                <span>Year <br>Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Total <br>Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2590">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	 --}}

    <script>
      document.getElementById('carForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
    
        // Clear previous error messages
        var errorElements = document.querySelectorAll('.text-danger');
        errorElements.forEach(function(errorElement) {
          errorElement.textContent = '';
        });
    
        // Retrieve form field values
        var country = document.getElementsByName('country')[0].value;
        var pickUpLocation = document.getElementsByName('pick_up_location')[0].value;
        var pickUpDate = document.getElementsByName('pick_up_date')[0].value;
        var dropOffDate = document.getElementsByName('drop_off_date')[0].value;
        var minPrice = document.getElementsByName('min_price')[0].value;
        var maxPrice = document.getElementsByName('max_price')[0].value;
        var pickUpTime = document.getElementsByName('time_pick')[0].value;
    
        // Validate form fields
        var isValid = true;


        if (country === '') {
          document.getElementById('country').textContent = 'Please enter the Country';
          isValid = false;
        }
    
        if (pickUpLocation === '') {
          document.getElementById('pickUpLocationError').textContent = 'Please enter the pick-up location';
          isValid = false;
        }
  
    
        if (pickUpDate === '') {
          document.getElementById('pickUpDateError').textContent = 'Please enter the pick-up date';
          isValid = false;
        }
    
        if (dropOffDate === '') {
          document.getElementById('dropOffDateError').textContent = 'Please enter the drop-off date';
          isValid = false;
        }
    
        if (minPrice === '') {
          document.getElementById('minPriceError').textContent = 'Please enter the min price';
          isValid = false;
        }
    
        if (maxPrice === '') {
          document.getElementById('maxPriceError').textContent = 'Please enter the max price';
          isValid = false;
        }
    
        if (pickUpTime === '') {
          document.getElementById('pickUpTimeError').textContent = 'Please enter the pick-up time';
          isValid = false;
        }
    
        // Check if min price is smaller than max price
        if (parseFloat(minPrice) >= parseFloat(maxPrice)) {
          document.getElementById('minPriceError').textContent = 'Min price should be smaller than max price';
          isValid = false;
        }
    
        // Form is valid, perform further actions or submit the form
        if (isValid) {
          this.submit();
        }
      });
    </script>

@endsection
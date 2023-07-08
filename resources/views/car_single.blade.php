@extends("layout.master")

@section("content")

   <style>
	/* Style the modal and overlay */
.modal {
  display: none; /* Hide the modal by default */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background */
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  max-width: 600px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

   </style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Car Details</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
	


	  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <!-- Add more indicators for additional images -->
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="car-details">
            <div class="img rounded" style="background-image: url({{ asset('images/'.$car->img_1) }});"></div>
            <div class="text text-center">
              <span class="subheading">Cheverolet</span>
			  
              <h2>{{$car->name}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="car-details">
            <div class="img rounded" style="background-image: url({{ asset('images/'.$car->img_2) }});"></div>
            <div class="text text-center">
              <span class="subheading">Cheverolet</span>
              <h2>{{$car->name}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="car-details">
            <div class="img rounded" style="background-image: url({{ asset('images/'.$car->img_3) }});"></div>
            <div class="text text-center">
              <span class="subheading">Cheverolet</span>
              <h2>{{$car->name}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Add more carousel items for additional images -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage
		                	<span>{{$car->mileage}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span>{{$car->transmission}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Seats
		                	<span>{{$car->seats}} Adults</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Luggage
		                	<span>{{$car->luggage}} Bags</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span>{{$car->fuel}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>


		  <!-- <div class="row">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">

          <div class="col-md-12 block-9 mb-md-5">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
        
      </div>
	  </div> -->


	  <div class="row">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 block-9 mb-md-5">
	


<!-- Create the booking form -->
<form id="bookingForm" method="POST" action="{{ route('bookings.storeBooking') }}" class="bg-light p-5 contact-form">
  @csrf

  <!-- Booking form inputs -->
  <div class="form-group d-flex">
    <input type="text" class="form-control mr-3" name="start_location" placeholder="Picking Up Location" >
    <input type="text" class="form-control" name="end_location" placeholder="Dropping off Location" >
  </div>

  <div class="form-group d-flex">
    <input type="date" class="form-control mr-3" name="start_date" id="start_date" >
    <input type="date" class="form-control" name="end_date" id="end_date" >
  </div>

  <div class="form-group d-flex">
    <input type="time" class="form-control mr-3" name="start_hour" id="start_hour" >
  </div>

  <div>
    <p class="form-group d-flex" id="booking_period"></p>
    <p class="form-group d-flex" id="booking_cost"></p>
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" name="lessor_id" value="{{$car->lessor_id}}">
    <input type="hidden" class="form-control" name="car_id" value="{{$car->id}}">
    <input type="hidden" class="form-control" name="car_price" value="{{$car->price}}">
  </div>

  <div class="form-group">
    <!-- <input type="submit" value="Book Now" class="btn btn-primary py-3 px-5"  id="bookNowBtn"> -->

	<!-- Add a button to trigger the popup -->
	 <button id="bookNowBtn" class="btn btn-primary py-3 px-5">Book Now</button>

	
<!-- Create the popup modal -->
<div id="paymentModal" class="modal">
  <div class="modal-content">
    <span id="closeBtn" class="close">&times;</span>
    <h2>Payment Information</h2>
    <p>Enter your payment details here:</p>
    <!-- Add payment form inputs here -->
    <form id="paymentForm">
      <!-- Payment form inputs -->
      <div class="form-group">
        <input type="text" class="form-control" name="cardNumber" placeholder="Card Number" required>
      </div>
      <!-- Add more payment form inputs as needed -->
      <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
  </div>
</div>



  </div>

  <div class="form-group">
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
    </div>
    @endif
  </div>
  
</form>

	 


            </div>
        </div>
    </div>
</div>


					


      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
							    </li>
							    
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
										<p>{{$car->description}}</p>
						    		
						    		
						    		
						    	</div>
						    </div>

						   

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head">23 Reviews</h3>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
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

    <!-- <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Car</span>
            <h2 class="mb-2">Related Cars</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-3.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
        </div>
    	</div>
    </section> -->

	<script>
    // Get the necessary form elements
    // const startDateInput = document.getElementById('start_date');
    // const endDateInput = document.getElementById('end_date');
    // const bookingPeriodElement = document.getElementById('booking_period');
    // const bookingCostElement = document.getElementById('booking_cost');
    // const carPrice = parseFloat({{ $car->price }}); // Retrieve car price from PHP variable

    // // Add event listeners to calculate and display booking period and cost
    // startDateInput.addEventListener('change', updateBookingDetails);
    // endDateInput.addEventListener('change', updateBookingDetails);

    // function updateBookingDetails() {
    //     const startDate = new Date(startDateInput.value);
    //     const endDate = new Date(endDateInput.value);

    //     if (startDate && endDate && startDate <= endDate) {
    //         const bookingPeriod = calculateBookingPeriod(startDate, endDate);
    //         const bookingCost = calculateBookingCost(bookingPeriod, carPrice);

    //         bookingPeriodElement.textContent = `Booking Period: ${bookingPeriod} days`;
    //         bookingCostElement.textContent = `Booking Cost: $${bookingCost.toFixed(2)}`;
    //     } else {
    //         bookingPeriodElement.textContent = '';
    //         bookingCostElement.textContent = '';
    //     }
    // }

    // function calculateBookingPeriod(startDate, endDate) {
    //     const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in a day
    //     return Math.round(Math.abs((startDate - endDate) / oneDay)) + 1; // Add 1 to include both start and end dates
    // }

    // function calculateBookingCost(bookingPeriod, carPrice) {
    //     return bookingPeriod * carPrice;
    // }


const bookNowBtn = document.getElementById('bookNowBtn');
const paymentModal = document.getElementById('paymentModal');
const closeBtn = document.getElementById('closeBtn');
const paymentForm = document.getElementById('paymentForm');
const startDateInput = document.getElementById('start_date');
const endDateInput = document.getElementById('end_date');
const bookingPeriodElement = document.getElementById('booking_period');
const bookingCostElement = document.getElementById('booking_cost');
const carPrice = parseFloat({{ $car->price }}); // Retrieve car price from PHP variable

// Add event listeners to show/hide the payment modal and calculate booking details
bookNowBtn.addEventListener('click', openPaymentModal);
closeBtn.addEventListener('click', closePaymentModal);
startDateInput.addEventListener('change', calculateBookingDetails);
endDateInput.addEventListener('change', calculateBookingDetails);

function openPaymentModal() {
  paymentModal.style.display = 'block'; // Show the payment modal
}

function closePaymentModal() {
  paymentModal.style.display = 'none'; // Hide the payment modal
}

function calculateBookingDetails() {
  const startDate = new Date(startDateInput.value);
  const endDate = new Date(endDateInput.value);

  if (startDate && endDate && startDate <= endDate) {
    const bookingPeriod = calculateBookingPeriod(startDate, endDate);
    const bookingCost = calculateBookingCost(bookingPeriod, carPrice);

    bookingPeriodElement.textContent = `Booking Period: ${bookingPeriod} day(s)`;
    bookingCostElement.textContent = `Booking Cost: $${bookingCost.toFixed(2)}`;
  } else {
    bookingPeriodElement.textContent = '';
    bookingCostElement.textContent = '';
  }
}

function calculateBookingPeriod(startDate, endDate) {
  const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in a day
  return Math.round(Math.abs((startDate - endDate) / oneDay)) + 1; // Add 1 to include both start and end dates
}

function calculateBookingCost(bookingPeriod, carPrice) {
  return bookingPeriod * carPrice;
}

// Add event listener to handle payment form submission
paymentForm.addEventListener('submit', submitPayment);

function submitPayment(event) {
  event.preventDefault(); // Prevent form submission (for demonstration purposes)

  // Perform your payment processing logic here
  // For example, you can send an AJAX request to your payment API

  // Simulate a successful payment
  const paymentSuccess = true;

  if (paymentSuccess) {
    // Submit the booking form
    document.getElementById('bookingForm').submit();
  } else {
    alert('Payment failed. Please try again.');
  }

  // After successful payment submission, you can close the modal
  closePaymentModal();
}


</script>


    
	   @endsection
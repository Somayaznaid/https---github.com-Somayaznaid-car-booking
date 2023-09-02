@extends('layout.master')

@section('content')
    {{-- <link rel="stylesheet" href="path/to/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="path/to/bootstrap-datepicker.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <style>
        .highlighted {
            background-color: #99ff99;
            /* Customize the highlighting color */
        }

        .unavailable {
            background-color: #ff9999;
            /* Customize the highlighting color for unavailable dates */
        }


        /* Style the modal and overlay */
        .modal {
            display: none;
            /* Hide the modal by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            /* Semi-transparent background */
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
    {{-- js lib for rating --}}
    {{-- <link rel="stylesheet" href="{{ asset('path/to/jquery.rateyo.min.css') }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 --}}

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_3.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i
                                class="ion-ios-arrow-forward"></i></span></p>
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
                                    <div class="img rounded"
                                        style="background-image: url({{ asset('images/' . (isset($car) ? $car->img_1 : '1687999552_649cd440d08d6.jpeg')) }});">
                                    </div>
                                    <div class="text text-center">
                                        <span class="subheading">{{ isset($car) ? $car->year_of_manufacture : null }}</span>

                                        <h2>{{ isset($car) ? $car->name : null }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="car-details">
                                    <div class="img rounded"
                                        style="background-image: url({{ asset('images/' . $car->img_2) }});"></div>
                                    <div class="text text-center">
                                        <span class="subheading">{{ $car->year_of_manufacture }}</span>
                                        <h2>{{ $car->name }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="car-details">
                                    <div class="img rounded"
                                        style="background-image: url({{ asset('images/' . $car->img_3) }});"></div>
                                    <div class="text text-center">
                                        <span class="subheading">{{ $car->year_of_manufacture }}</span>
                                        <h2>{{ $car->name }}</h2>
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
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Mileage
                                        <span>{{ $car->mileage }} km/l</span>
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
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmission
                                        <span>{{ $car->transmission }}</span>
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
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Seats
                                        <span>{{ $car->seats }} Adults</span>
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
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Luggage
                                        <span>{{ $car->luggage }} Bags</span>
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
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Fuel
                                        <span>{{ $car->fuel }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="container">

                    <div class="row d-flex mb-5 contact-info">
                        <div class="col-md-12 block-9 mb-md-5">



                            <form id="" method="POST" action="{{ route('bookings.storeBooking') }}"
                                class="bg-light p-5 contact-form" onsubmit="validateForm(event)">
                                @csrf
                                <!-- Booking form inputs -->
                                <h3 class="mb-1">
                                    BOOK KNOW:
                                </h3> <br>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control " name="start_location"
                                        id="start_location" placeholder="Picking Up City">
                                    <span class="error-message" id="startLocationError"></span>
                                    <input type="hidden" class="form-control" name="end_location" id="end_location"
                                        placeholder="Dropping off City">
                                    <span class="error-message" id="endLocationError"></span>
                                </div>

                                <div class="form-group d-flex flex-wrap">
                                    <input type="date" placeholder="Select a date" class="form-control "
                                        name="start_date" id="start_date" onchange="calculateBookingDetails()">

                                    <span class="error-message" id="startDateError"></span>
                                   
                                </div>

                                <div class="form-group d-flex flex-wrap">
                                    
                                    <input type="date" class="form-control" name="end_date" id="end_date"
                                        onchange="calculateBookingDetails()">
                                    <span class="error-message" id="endDateError"></span>
                                </div>

                                <div class="form-group d-flex">
                                    <input type="time" class="form-control" name="start_hour" id="start_hour">
                                    <span class="error-message" id="startHourError"></span>
                                </div>

                                <div>
                                    <p class="form-group d-flex" id="booking_period"></p>
                                    <p class="form-group d-flex" id="booking_cost"></p>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="lessor_id"
                                        value="{{ $car->lessor_id }}">
                                    <input type="hidden" class="form-control" name="car_id"
                                        value="{{ $car->id }}">
                                    <input type="hidden" class="form-control" name="car_price"
                                        value="{{ $car->price }}">
                                </div>

                                @if (Auth::check())
                                    <p>Payment Method:</p>

                                    <!-- Payment form inputs -->
                                    <div class="form-group">
                                        <div>
                                            <input type="radio" name="paymentMethod" id="cardradio"
                                                onclick="toggleCardInputs()">
                                            <label for="cardradio">Using Card </label>
                                        </div>

                                        <div>
                                            <input type="radio" name="paymentMethod" id="cashradio"
                                                onclick="toggleUserNumberInput()">
                                            <label for="cashradio">Cash</label>
                                        </div>
                                        <div id="cardInputs" style="display: none;">
                                            {{-- <input type="hidden" value="" > --}}
                                            <input type="text" class="form-control col-4 m-1" name="userName"
                                                placeholder="Card Holder">
                                            <input type="text" class="form-control col-4 m-1" name="cardNumber"
                                                placeholder="Card Number">
                                            
                                            <input type="text" class="form-control col-4 m-1" name="cvc"
                                                placeholder="CVC">
                                            <input type="date" class="form-control col-4 m-1" name="exp_day"
                                                placeholder="Expiration Day">
                                        </div>

                                        <div id="userNumberInput" style="display: none;">
                                            <input type="text" class="form-control col-4 m-1" name="userName"
                                                placeholder="User Name">
                                            <input type="text" class="form-control col-4 m-1" name="user_number"
                                                placeholder="User Phone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button id="bookNowBtn" class="btn btn-primary py-3 px-5">Book Now</button>
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        <p> Need to Log In to Complete YOUR Car Book! </p>
                                    </div>
                                @endif



                                <div class="form-group">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

{{-- 
                                    @if(isset($alertMessage))
                                    <div class="alert alert-warning">
                                        {{ $alertMessage }}
                                    </div>
                                @endif --}}
                                </div>
                            </form>



                            {{-- <div class="form-group">
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
    </div>
    @endif
  </div> --}}


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
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                        href="#pills-description" role="tab" aria-controls="pills-description"
                                        aria-expanded="true">Description</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                        role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <p>{{ $car->description }}</p>



                                </div>
                            </div>



                            <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="head">Reviews</h3>



                                        @foreach ($ratings as $rating)
                                            <div class="review d-flex">
                                                <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                                </div>
                                                <div class="desc">
                                                    <h4>
                                                        <span class="text-left">{{ $rating->user->name }}</span>
                                                        {{-- <span class="text-right"> {{ $rating->created_at->toDateString() }}</span> --}}
                                                    </h4>
                                                    <p class="star">
                                                        {{-- <span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span> --}}
                                                        <span class="text-right"><a href="#" class="reply"><i
                                                                    class="icon-reply"></i></a></span>
                                                    </p>
                                                    <p>
                                                        {{ $rating->comments }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach



                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                            </div>
                                            <div class="desc">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="container">
                                            <div class="row d-flex mb-5 contact-info">
                                                <div class="col-md-12 block-9 mb-md-5">

                                                    @if (Auth::check())
                                                        <!-- Create the booking form -->
                                                        <form id="ratingForm" method="POST"
                                                            action="{{ route('rating', ['id' => request()->route('id')]) }}"
                                                            class="bg-light p-5 contact-form">
                                                            @csrf

                                                            <input type="hidden" name="star_rating" id="starRatingInput"
                                                                value="">

                                                            <div class="form-group">
                                                                <input type="hidden" name="star_rating"
                                                                    id="starRatingInput" value="">
                                                            </div>

                                                            <!-- Booking form inputs -->
                                                            <div class="form-group d-flex">
                                                                <div id="starRating"></div>
                                                            </div>

                                                            <div class="form-group d-flex">
                                                                <textarea name="comments" id="" cols="30" rows="7" class="form-control mr-3"
                                                                    placeholder="Note..."></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="car_id"
                                                                    value="{{ request()->route('id') }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <!-- Add a button to trigger the popup -->
                                                                <button id="bookNowBtn"
                                                                    class="btn btn-primary py-3 px-5">Comment</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                    @endif





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
        </div>

        </div>
    </section>



    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/bootstrap_lessor.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script src="{{ asset('jquery-ui-datepicker/external/jquery.js') }}"></script>

    <script src="{{ asset('jquery-ui-datepicker/jquery-ui.js') }}"></script> --}}

    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

            document.getElementById('start_date').setAttribute('min', today);
            document.getElementById('end_date').setAttribute('min', today);

            // Replace this line with your own way of getting bookedDates
            var bookedDates = @json($dates);
            console.log(bookedDates);
            var maxDate = new Date(Math.min(...bookedDates.map(date => new Date(date))));
            var minDate = new Date(Math.max(...bookedDates.map(date => new Date(date))));
            maxDate.setDate(maxDate.getDate() - 1);

            var maxDateString = maxDate.toISOString().split('T')[0];
            var minDateString = minDate.toISOString().split('T')[0];

            console.log(maxDateString);
            console.log(minDateString);

            document.getElementById('start_date').addEventListener('input', function() {
                var startDate = new Date(this.value);
                var endDate = new Date(document.getElementById('end_date').value);
                
                if (startDate > endDate) {
                    document.getElementById('end_date').value = this.value;
                }
            });
            
            document.getElementById('end_date').addEventListener('input', function() {
                var startDate = new Date(document.getElementById('start_date').value);
                var endDate = new Date(this.value);
                
                if (endDate < startDate) {
                    document.getElementById('start_date').value = this.value;
                }
            });
        });





        function toggleCardInputs() {
            var cardInputs = document.getElementById("cardInputs");
            var userNumberInput = document.getElementById("userNumberInput");
            var cardradio = document.getElementById("cardradio");

            if (cardradio.checked) {
                cardInputs.style.display = "block";
                userNumberInput.style.display = "none";
            } else {
                cardInputs.style.display = "none";
            }
        }

        function toggleUserNumberInput() {
            var cardInputs = document.getElementById("cardInputs");
            var userNumberInput = document.getElementById("userNumberInput");
            var cashradio = document.getElementById("cashradio");

            if (cashradio.checked) {
                cardInputs.style.display = "none";
                userNumberInput.style.display = "block";
            } else {
                userNumberInput.style.display = "none";
            }
        }

        function validateForm(event) {
            var startLocationInput = document.getElementById("start_location");
            var endLocationInput = document.getElementById("end_location");
            var startDateInput = document.getElementById("start_date");
            var endDateInput = document.getElementById("end_date");
            var startHourInput = document.getElementById("start_hour");
            var cardradio = document.getElementById("cardradio");
            var cardNumberInput = document.getElementsByName("cardNumber")[0];
            var cardHolderInput = document.getElementsByName("cardHolder")[0];
            var cvcInput = document.getElementsByName("cvc")[0];
            var userNumberInput = document.getElementsByName("user_number")[0];

            // Reset error messages
            var errorMessages = document.getElementsByClassName("error-message");
            for (var i = 0; i < errorMessages.length; i++) {
                errorMessages[i].textContent = "";
            }

            // Validate start location
            if (startLocationInput.value.trim() === "") {
                document.getElementById("startLocationError").textContent = "Start location is required.";
                event.preventDefault();
                return;
            }

            // Validate end location
            // if (endLocationInput.value.trim() === "") {
            //     document.getElementById("endLocationError").textContent = "End location is required.";
            //     event.preventDefault();
            //     return;
            // }

            // Validate start date
            if (startDateInput.value.trim() === "") {
                document.getElementById("startDateError").textContent = "Start date is required.";
                event.preventDefault();
                return;
            }

            // Validate end date
            if (endDateInput.value.trim() === "") {
                document.getElementById("endDateError").textContent = "End date is required.";
                event.preventDefault();
                return;
            }

            // Validate start hour
            if (startHourInput.value.trim() === "") {
                document.getElementById("startHourError").textContent = "Start hour is required.";
                event.preventDefault();
                return;
            }

            // Validate payment method
            if (cardradio.checked) {
                // Card payment selected
                if (cardNumberInput.value.trim() === "") {
                    document.getElementById("cardInputs").style.display = "block";
                    document.getElementById("cardNumberError").textContent = "Card number is required.";
                    event.preventDefault();
                    return;
                }

                if (cardHolderInput.value.trim() === "") {
                    document.getElementById("cardInputs").style.display = "block";
                    document.getElementById("cardHolderError").textContent = "Card holder is required.";
                    event.preventDefault();
                    return;
                }

                if (cvcInput.value.trim() === "") {
                    document.getElementById("cardInputs").style.display = "block";
                    document.getElementById("cvcError").textContent = "CVC is required.";
                    event.preventDefault();
                    return;
                }
            } else {
                // Cash payment selected
                if (userNumberInput.value.trim() === "") {
                    document.getElementById("userNumberInput").style.display = "block";
                    document.getElementById("userNumberError").textContent = "User number is required.";
                    event.preventDefault();
                    return;
                }
            }

            // Form is valid, continue with submission
        }


        function calculateBookingDetails() {
            var startDateInput = document.getElementById("start_date");
            var endDateInput = document.getElementById("end_date");
            var bookingPeriodElement = document.getElementById("booking_period");
            var bookingCostElement = document.getElementById("booking_cost");
            var carPrice = parseFloat(document.getElementsByName("car_price")[0].value);

            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);

            if (startDate && endDate && startDate <= endDate) {
                var bookingPeriod = calculateBookingPeriod(startDate, endDate);
                var bookingCost = calculateBookingCost(bookingPeriod, carPrice);

                bookingPeriodElement.textContent = "Booking Period: " + bookingPeriod + " day(s)";
                bookingCostElement.textContent = "Booking Cost: $" + bookingCost.toFixed(2);
            } else {
                bookingPeriodElement.textContent = "";
                bookingCostElement.textContent = "";
            }
        }

        function calculateBookingPeriod(startDate, endDate) {
            var oneDay = 24 * 60 * 60 * 1000; // Milliseconds in a day
            return Math.round(Math.abs(startDate - endDate) / oneDay) + 3; // Add 1 to include both start and end dates
        }

        function calculateBookingCost(bookingPeriod, carPrice) {
            return bookingPeriod * carPrice;
        }
    </script>
@endsection

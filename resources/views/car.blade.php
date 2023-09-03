@extends('layout.master')

@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Choose Your Car</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <!-- Add filter form here -->
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 block-9 mb-md-5">
                    <form action="{{ route('cars.filterCars') }}" method="GET" class="bg-light p-5 contact-form">
                        <div class="m-2">
                            <label>
                                <input type="checkbox" name="type_id" value="2"> For Sale
                            </label>
                            <label>
                                <input type="checkbox" name="type_id" value="1"> For Booking
                            </label>
                            <br>
                            <label for="cardradio">
                                <input type="radio" name="transmission" value="manual" id="cardradio"> Manual Transmission
                            </label>
                            <label for="cardradio">
                                <input type="radio" name="transmission" value="automatic" id="cardradio"> Automatic Transmission
                            </label>
                            <br>

                          
                        </div>

                        <div class="form-group d-flex">
                            <label class="mr-1 col-6">
                                <input type="text" name="name" class="form-control" placeholder="Car Name">
                            </label>

                           

                        </div>


                        <div class="form-group d-flex">
                           

                            <label class="col-6">
                                <input type="text" class="form-control" name="year_of_manufacture"
                                    placeholder="Year Of Manufacture">
                            </label>

                        </div>

                        <div class="form-group d-flex">


                        

                            <label class="col-6">
                                <input type="text" class="form-control" name="luggage" placeholder="Luggage Capacity">
                            </label>


                        </div>
                        <div class="form-group d-flex">
                            <label class="col-6">
                                <input type="text" class="form-control mr-3" name="seats"
                                    placeholder="Number of Seats">
                            </label>
                        </div>



                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary ml-3">Filter</button>
					</div>
                    </form>
                </div>
            </div>

			{{-- <div id="filtered-cars"> --}}
            <div class="row">

				
                    
               
                @foreach ($filterCars as $filterCar)
                   

                    <div class="col-md-4">

                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url('{{ asset('images/' . $filterCar['img_1']) }}');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="car-single.html">{{ $filterCar['name'] }}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{ $filterCar['transmission'] }}</span>
                                    <p class="price ml-auto">${{ $filterCar['price'] }} <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    @if ($filterCar['type_id'] == 1)
                                        <a href="{{ route('car_single', ['id' => $filterCar['id']]) }}"
                                            class="btn btn-secondary py-2 ml-1">Book now</a>
                                    @else
                                        <a href="{{ route('car_single_sale', ['id' => $filterCar['id']]) }}"
                                            class="btn btn-secondary py-2 ml-1">Buy now</a>
                                    @endif

                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach


              
                    

                <div class="col-md-4">

                    <div class="car-wrap rounded ftco-animate">
                        @if(session('no_cars_message'))
                        <div class="alert alert-info">
                            {{ session('no_cars_message') }}
                        </div>
                    @endif

                    </div>

                </div>    
               

			{{-- </div> --}}

            </div>


          


        </div>
    </section>


    <section class="ftco-section bg-light">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What all offer</span>
                    <h2 class="mb-2">Cars: </h2>
                </div>
            </div>

            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">

                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url('{{ asset('images/' . $car['img_1']) }}');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="car-single.html">{{ $car['name'] }}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{ $car['transmission'] }}</span>
                                    <p class="price ml-auto">${{ $car['price'] }} <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    @if ($car['type_id'] == 1)
                                        <a href="{{ route('car_single', ['id' => $car['id']]) }}"
                                            class="btn btn-secondary py-2 ml-1">Book now</a>
                                    @else
                                        <a href="{{ route('car_single', ['id' => $car['id']]) }}"
                                            class="btn btn-secondary py-2 ml-1">Buy now</a>
                                    @endif

                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>


            {{-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> --}}
            <div class="row mt-5">

                <div class="col text-center">

                    <div class="block-27">



                    </div>

                </div>

            </div>

            {{-- <div class="row mt-5">
			<div class="col text-center">
			  <div class="block-27">
				<ul>
				  <li><a href="#">&lt;</a></li>
				  <li class="active"><span>1</span></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#">&gt;</a></li>
				</ul>
			  </div>
			</div>
		  </div> --}}

        </div>
    </section>

	<script>
		// document.addEventListener('DOMContentLoaded', function () {
		// 	const filterForm = document.getElementById('filter-form');
		// 	const filteredCarsContainer = document.getElementById('filtered-cars');
		
		// 	filterForm.addEventListener('submit', function (event) {
		// 		event.preventDefault();
		// 		const formData = new FormData(filterForm);
		
		// 		fetch('{{ route('cars.filterCars') }}', {
		// 			method: 'POST', // Use POST to avoid caching issues
		// 			body: formData
		// 		})
		// 		.then(response => response.text())
		// 		.then(data => {
		// 			filteredCarsContainer.innerHTML = data;
		// 		})
		// 		.catch(error => {
		// 			console.error('Error:', error);
		// 		});
		// 	});
		// });
		</script>


@endsection

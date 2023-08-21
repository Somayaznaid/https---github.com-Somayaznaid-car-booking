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

			<form action="{{ route('cars.filterCars') }}" method="GET">
				<label>
					<input type="checkbox" name="2" value="1"> For Sale
				</label>
				<label>
					<input type="checkbox" name="1" value="1"> For Booking
				</label>
				<br>
				<label>
					<input type="checkbox" name="manual" value="1"> Manual Transmission
				</label>
				<label>
					<input type="checkbox" name="automatic" value="1"> Automatic Transmission
				</label>
				<br>
                <label>
				<input type="text" name="name" placeholder="Car Name">
			    </label>
				<br>
				<label>
					<input type="text" name="year_of_manufacture" placeholder="Year Of Manufacture">				</label>
				<br>
				<label>
					<input type="text" name="mileage" placeholder="Mileage">			
				</label>
				<br>
				<label>
					<input type="text" name="luggage" placeholder="Luggage Capacity">
				</label>
				<br>
				<label>
					<input type="text" name="seats" placeholder="Number of Seats">
				</label>


				<!-- Repeat for other checkboxes... -->
				<button type="submit">Filter</button>
			</form>
			
			<div class="row">
			@foreach($filterCars as $filterCar)
				<!-- Display car information -->

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
									<a href="{{ route('car_single', ['id' => $filterCar['id']]) }}"
										class="btn btn-secondary py-2 ml-1">Buy now</a>
								@endif

							</p>
						</div>
					</div>

				</div>


			@endforeach
			
            </div>


            <!-- Add filter to here -->


        </div>
    </section>

	  
    <section class="ftco-section bg-light">
		<h2>
			Cars:
		</h2>
        <div class="container">
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
        const transmissionAutomatic = document.getElementById('transmission-automatic');
        const transmissionManual = document.getElementById('transmission-manual');
        const transmissionOptions = document.getElementById('transmission-options');

        transmissionAutomatic.addEventListener('click', function() {
            transmissionOptions.style.display = 'block';
        });

        transmissionManual.addEventListener('click', function() {
            transmissionOptions.style.display = 'none';
        });

        // Repeat the same pattern for other filters
    </script>
@endsection

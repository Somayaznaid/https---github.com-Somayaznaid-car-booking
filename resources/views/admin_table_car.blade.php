@extends("admin.master")

@section("content")

<div class="container-fluid py-4">
      
   
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Projects table</h6>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Car</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-left">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mileage</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Transmission</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seats</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Luggage</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fuel</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Year Of Manufacture</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cars as $car)
                      
                  
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="{{ asset('images/' . $car->img_1) }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                         
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $car->name }}</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold align-middle text-center">{{ $car->price }}$</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->mileage }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->transmission }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->seats }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->luggage }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->fuel }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $car->year_of_manufacture }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">{{ $car->description }}</span>
                          <div>
                            {{-- <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div> --}}
                          </div>
                        </div>
                      </td>
                      {{-- <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td> --}}
                    </tr>
                   
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

     



     
@endsection
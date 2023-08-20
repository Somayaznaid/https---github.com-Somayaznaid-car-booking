@extends("admin.master")

@section("content")

<div class="container-fluid py-4">
      
   
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Order table</h6>
              </div>
            </div>
            
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                   
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">start location</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">end location</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">start date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">end date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">start hour</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">booking cost</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($booking as $booking)
                        
                    
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                         
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $booking->car->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $booking->start_location}}</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $booking->end_location}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $booking->start_date}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $booking->end_date}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $booking->start_hour}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $booking->booking_cost}}</span>
                      </td>
                      <td>

                        @if($booking->status === 'approved')
                        <span class="badge badge-sm bg-gradient-success">Approved</span>
                   @else
                        <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @endif 

                </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          {{-- <span class="me-2 text-xs font-weight-bold">60%</span> --}}
                          <div>
                            {{-- <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div> --}}
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          {{-- <i class="fa fa-ellipsis-v text-xs"></i> --}}
                        </button>
                      </td>
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
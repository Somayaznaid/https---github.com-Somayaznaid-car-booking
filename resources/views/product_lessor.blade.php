@extends("lessor.master")

@section("content")


<div class="container mt-5 col-sm-12">
      <div class=" ">
        <div class="col-sm-12 col-md-12 m-1">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <h2 class="tm-site-title m-2">Your Products</h2>
              <div class="form-group">
                @if (Session::has('add_product_found'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('add_product_found') }}
                </div>
                @endif

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::has('warning'))
                <div class="alert  alert-danger" role="alert">
                  {{ Session::get('warning') }}
                </div>
                @endif


                @if (Session::has('edit_product_found'))
                <div class="alert  alert-success" role="alert">
                  {{ Session::get('edit_product_found') }}
                </div>
                @endif
                
              </div>
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">MILEAGE</th>
                    <th scope="col">TRANSMISSION</th>
                    <th scope="col">SEATS</th>
                    <th scope="col">LUGGAGE</th>
                    <th scope="col">FUEL</th>
                    <th scope="col">YEAR OF MANUFACTURE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($cars)
                  @foreach ($cars as $car)
                    
                  
                  <tr>
                    
                    <td class="tm-product-name"><img src="{{ asset('images/' . $car->img_1) }}" alt="car" width="50px" ></td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->price}}$</td>
                     @if($car->type_id === 1)
                    <td>BOOK</td>
                    @else
                    <td>SALE</td>
                    @endif
                    <td>{{$car->mileage}}</td>
                    <td>{{$car->transmission}}</td>
                    <td>{{$car->seats}}</td>
                    <td>{{$car->luggage}}</td>
                    <td>{{$car->fuel}}</td>
                    <td>{{$car->year_of_manufacture}}</td>
                    <td>{{$car->description}}</td>
                    
                    <td>
                      <a href="product/delete/ {{$car->id}}" class="tm-product-delete-link" onclick="return confirmDeletion()">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td> 

                    <td>
                      <a href="product/edit/ {{$car->id}}" class="tm-product-delete-link">
                        <i class='fa fa-edit' style='color: white'></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach


                  @else
                       
                  <td class="tm-product-name align-middle" colspan="5">  NO PRODUCT ADD YET</td>

                  
                 
                  @endif
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="{{ url('add_product') }}"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
              
          </div>
        </div>



        
          <div class="col-sm-12 col-md-12 m-1">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
              <div class="tm-product-table-container">
                <h2 class="tm-site-title m-2">Your Orders</h2>
                @if (Session::has('success_reject'))
                <div class="alert  alert-danger" role="alert">
                  {{ Session::get('success_reject') }}
                </div>
                @endif


                @if (Session::has('success_approve'))
                <div class="alert  alert-success" role="alert">
                  {{ Session::get('success_approve') }}
                </div>
                @endif
                <table class="table table-hover tm-table-small tm-product-table">
                  <thead>
                    <tr>
                      
                      <th scope="col">PRODUCT NAME</th>
                      <th scope="col">BOOKING COST</th>
                      <th scope="col">Start DATE</th>
                      <th scope="col">End DATE</th>
                      <th scope="col">START LOCATION</th>
                      <th scope="col">END LOCATION</th>
                      <th scope="col">START HOUR</th>
                      <th scope="col">&nbsp;</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bookings as $booking)
                    <tr>

                    
                      <td class="tm-product-name">{{ $booking->car->name}}</td>
                      <td>{{$booking->booking_cost}}</td>
                      <td>{{$booking->start_date}}</td>
                      <td>{{$booking->end_date}}</td>
                      <td>{{$booking->start_location}}</td>
                      <td>{{$booking->end_location}}</td> 
                      <td>{{$booking->start_hour}}</td> 
                      <td>
                        <!-- Form for approving the order -->
                        @if ($booking->status === "pending")

                        <form action="{{ route('lessor.orders.approve', ['id' => $booking->id]) }}" method="POST" style="display: inline;">
                          @csrf
                          <button type="submit" class="btn btn-success">Approve</button>
                      </form>

                      <form action="{{ route('lessor.orders.reject', ['id' => $booking->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirmRejection()">Reject</button>
                    </form>
                            
                        
                       
                        @elseif ($booking->status === "approved")

                        {{-- <form action="{{ route('lessor.orders.approve', ['id' => $booking->id]) }}" method="POST" style="display: inline;">
                          @csrf --}}
                          <button type="submit" class="btn btn-success" readonly>Approved</button>
                      {{-- </form> --}}

                    
                        @endif

                    </td>
                      
                      
                    </tr>
                     @endforeach
                   
                  </tbody>
                </table>
              </div>
              <!-- table container -->
              {{-- <a
                href="add-product.html"
                class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
              <button class="btn btn-primary btn-block text-uppercase">
                Delete selected products
              </button> --}}
            </div>
          </div>
      
    </div>

    <script src="{{ asset('js/jquery-3.3.1_lessor.min.js') }}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{ asset('js/bootstrap_lessor.min.js') }}"></script>
<!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>


<script>
  function confirmDeletion() {
      if (confirm('Are you sure you want to delete this car?')) {
          document.getElementById('delete-car-form').submit();
      } else {
          alert('Car deletion canceled.');
      }
  }


  function confirmRejection() {
      if (confirm('Are you sure you want to reject this booking?')) {
          document.getElementById('delete-car-form').submit();
      } else {
          alert('book Rejection canceled.');
      }
  }
</script>
@endsection
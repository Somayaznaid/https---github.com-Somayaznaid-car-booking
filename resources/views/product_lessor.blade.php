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
                    <th scope="col">price</th>
                    <th scope="col">mileage</th>
                    <th scope="col">transmission</th>
                    <th scope="col">seats</th>
                    <th scope="col">luggage</th>
                    <th scope="col">fuel</th>
                    <th scope="col">year_of_manufacture</th>
                    <th scope="col">description </th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @if (Session::has('lessor_found'))
                  @foreach ($cars as $car)
                    
                  
                  <tr>
                    
                    <td class="tm-product-name"><img src="{{ asset('images/' . $car->img_1) }}" alt="car" width="50px" ></td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->price}}$</td>
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


        {{-- <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
                    <td class="tm-product-name">Product Category 1</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 2</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 3</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 4</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 5</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 6</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 7</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 8</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 9</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 10</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Product Category 11</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>
          </div>
        </div> --}}


        
          <div class="col-sm-12 col-md-12 m-1">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
              <div class="tm-product-table-container">
                <h2 class="tm-site-title m-2">Your Orders</h2>
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
                    @foreach($booking as $booking)
                    <tr>
                     
                      <td class="tm-product-name">{{ $car->name}}</td>
                      <td>{{$booking->booking_cost}}</td>
                      <td>{{$booking->start_date}}</td>
                      <td>{{$booking->end_date}}</td>
                      <td>{{$booking->start_location}}</td>
                      <td>{{$booking->end_location}}</td> 
                      <td>{{$booking->start_hour}}</td> 
                      
                      
                      
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
</script>
@endsection
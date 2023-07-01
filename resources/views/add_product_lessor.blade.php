@extends("lessor.master")

@section("content")


<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="{{ route('addCar') }}" class="tm-edit-product-form" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Car Name</label>
        <input id="name" name="name" type="text" class="form-control validate border" />
        <small >@error('name'){{$message}} @enderror</small>
    </div>

    <div class="form-group mb-3">
        <label for="price">Price</label>
        <input id="price" name="price" type="number" class="form-control validate border" />
        <small >@error('price'){{$message}} @enderror</small>
    </div>
    

    <div class="form-group mb-3">
        <label for="year_of_manufacture">Year of manufacture</label>
        <input id="year_of_manufacture" name="year_of_manufacture" type="number" class="form-control validate border" />
        <small >@error('year_of_manufacture'){{$message}} @enderror</small>
    </div>

    <div class="form-group mb-3">
        <label for="mileage">Mileage</label>
        <input id="mileage" name="mileage" type="text" class="form-control validate border" />
        <small >@error('mileage'){{$message}} @enderror</small>
    </div>

    <div class="form-group mb-3">
        <label for="city">City</label>
        <input id="city" name="city" type="text" class="form-control validate border" />
        <small >@error('city'){{$message}} @enderror</small>
    </div>


    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea class="form-control validate border" name="description" rows="3"></textarea>
        <small >@error('description'){{$message}} @enderror</small>
    </div>

    <div class="form-group mb-3">
        <label for="category">Category</label>
        <select class="custom-select tm-select-accounts" id="category" name="category">
            <option selected>Select category</option>
            <option value="1">New Arrival</option>
            <option value="2">Most Popular</option>
            <option value="3">Trending</option>
        </select>

    </div>

    <div class="form-group mb-3">
        <label for="transmission">Transmission</label>
        <select class="custom-select tm-select-accounts" id="transmission" name="transmission">
            <option selected>Select Transmission</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="fuel">Fuel</label>
        <select class="custom-select tm-select-accounts" id="fuel" name="fuel">
            <option selected>Select Fuel</option>
            <option value="petrol">Petrol</option>
            <option value="hydrogen">Hydrogen</option>
            <option value="hybrid">Hybrid</option>
        </select>
    </div>

    <div class="row">
        <div class="form-group mb-3 col-xs-12 col-sm-6">
            <label for="seats">Seats</label>
            <input id="seats" name="seats" type="number" class="form-control validate border" data-large-mode="true" />
            <small >@error('seats'){{$message}} @enderror</small>
        </div>
        <div class="form-group mb-3 col-xs-12 col-sm-6">
            <label for="luggage">Luggage</label>
            <input id="luggage" name="luggage" type="number" class="form-control validate border" />
            <small >@error('luggage'){{$message}} @enderror</small>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
        <div class="tm-product-img-dummy mx-auto">
            <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
        </div>
        <div class="custom-file mt-3 mb-3">
            <input id="fileInput1" type="file" name="img_1" style="display:none;" />
            <input type="button" name="img_1" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 1"
                onclick="document.getElementById('fileInput1').click();" />
                <small >@error('img_1'){{$message}} @enderror</small>
        </div>

        <div class="custom-file mt-3 mb-3">
    <input id="fileInput2" type="file" name="img_2" style="display:none;" />
    <input type="button" name="img_2" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 2"
        onclick="document.getElementById('fileInput2').click();" />
    <small>@error('img_2'){{$message}} @enderror</small>
</div>

<div class="custom-file mt-3 mb-3">
    <input id="fileInput3" type="file" name="img_3" style="display:none;" />
    <input type="button" name="img_3" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 3"
        onclick="document.getElementById('fileInput3').click();" />
    <small>@error('img_3'){{$message}} @enderror</small>
</div>

    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
    </div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="{{ asset('js/jquery-3.3.1_lessor.min.js') }}"></script>
<!-- https://jquery.com/download/ -->
    <script src="{{ asset('jquery-ui-datepicker/jquery-ui.min.js') }}"></script>
<!-- https://jqueryui.com/download/ -->
    <script src="{{ asset('js/bootstrap_lessor.min.js') }}"></script>

    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>


@endsection
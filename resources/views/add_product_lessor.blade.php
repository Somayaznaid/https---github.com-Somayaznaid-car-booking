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
              <div class="col-xl-12 col-lg-12 col-md-12">
                <form action="{{ route('addCar') }}" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Car Name</label>
                        <input id="name" name="name" type="text" class="form-control validate border" />
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input id="price" name="price" type="number" class="form-control validate border" />
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="year_of_manufacture">Year of Manufacture</label>
                        <input id="year_of_manufacture" name="year_of_manufacture" type="number" class="form-control validate border" />
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="mileage">Mileage</label>
                        <input id="mileage" name="mileage" type="text" class="form-control validate border" />
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input id="city" name="city" type="text" class="form-control validate border" />
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control validate border" name="description" rows="3"></textarea>
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="type_id">Type</label>
                        <select class="custom-select tm-select-accounts" id="type_id" name="type_id">
                            <option selected>Select category</option>
                            <option value="1">Booking</option>
                            <option value="2">Sale</option>
                        </select>
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="transmission">Transmission</label>
                        <select class="custom-select tm-select-accounts" id="transmission" name="transmission">
                            <option selected>Select Transmission</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                        <small class="error-message"></small>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="fuel">Fuel</label>
                        <select class="custom-select tm-select-accounts" id="fuel" name="fuel">
                            <option selected>Select Fuel</option>
                            <option value="petrol">Petrol</option>
                            <option value="hydrogen">Hydrogen</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                        <small class="error-message"></small>
                    </div>
                
                    <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label for="seats">Seats</label>
                            <input id="seats" name="seats" type="number" class="form-control validate border" data-large-mode="true" />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label for="luggage">Luggage</label>
                            <input id="luggage" name="luggage" type="number" class="form-control validate border" />
                        </div>
                        <small class="error-message"></small>
                    </div>
                
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput1" type="file" name="img_1" style="display:none;" />
                            <input type="button" name="img_1" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 1" onclick="document.getElementById('fileInput1').click();" />
                            <small class="error-message"></small>
                        </div>
                
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput2" type="file" name="img_2" style="display:none;" />
                            <input type="button" name="img_2" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 2" onclick="document.getElementById('fileInput2').click();" />
                            <small class="error-message"></small>
                        </div>
                
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput3" type="file" name="img_3" style="display:none;" />
                            <input type="button" name="img_3" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 3" onclick="document.getElementById('fileInput3').click();" />
                            <small class="error-message"></small>
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

<script>
    document.querySelector('.tm-edit-product-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        var errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(element) {
            element.textContent = '';
        });

        // Perform validation
        var name = document.getElementById('name').value;
        var price = document.getElementById('price').value;
        var yearOfManufacture = document.getElementById('year_of_manufacture').value;
        var mileage = document.getElementById('mileage').value;
        var city = document.getElementById('city').value;

        var img1 = document.getElementById('fileInput1').value;
        var img2 = document.getElementById('fileInput2').value;
        var img3 = document.getElementById('fileInput3').value;

        var formIsValid = true; // Flag to track if the form is valid

        // Check if the fields are empty or meet certain criteria
        if (name.trim() === '') {
            showError('name', 'Please enter a car name.');
            formIsValid = false;
        }

        if (price.trim() === '') {
            showError('price', 'Please enter a price.');
            formIsValid = false;
        }

        if (yearOfManufacture.trim() === '') {
            showError('year_of_manufacture', 'Please enter the year of manufacture.');
            formIsValid = false;
        }

        if (mileage.trim() === '') {
            showError('mileage', 'Please enter the mileage.');
            formIsValid = false;
        }

        if (city.trim() === '') {
            showError('city', 'Please enter the city.');
            formIsValid = false;
        }

        if (img1.trim() === '') {
            showError('fileInput1', 'Please select an image for Image 1.');
            formIsValid = false;
        }

        if (img2.trim() === '') {
            showError('fileInput2', 'Please select an image for Image 2.');
            formIsValid = false;
        }

        if (img3.trim() === '') {
            showError('fileInput3', 'Please select an image for Image 3.');
            formIsValid = false;
        }

        // If form is valid, submit the form
        if (formIsValid) {
            this.submit();
        }
    });

    function showError(fieldName, errorMessage) {
        var field = document.getElementById(fieldName);
        var errorMessageElement = field.parentNode.querySelector('.error-message');
        errorMessageElement.textContent = errorMessage;
    }
</script>




      
@endsection
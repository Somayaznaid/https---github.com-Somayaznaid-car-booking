
@extends("lessor.master")

@section("content")


<div class="container mt-5">
   
    <!-- row -->
    <div class="row tm-content-row">
      <div class="tm-block-col tm-col-avatar">
        <div class="tm-bg-primary-dark tm-block tm-block-avatar">
          <h2 class="tm-block-title">Change Avatar</h2>
          <div class="tm-avatar-container">

            <img src="{{ asset($lessor->img) }}" alt="Avatar" width="50px" class="tm-avatar img-fluid mb-4">
            
            {{-- <a href="#" class="tm-avatar-delete-link">
              <i class="far fa-trash-alt tm-product-delete-icon"></i>
            </a> --}}
          </div>
         
        </div>
      </div>
      <div class="tm-block-col tm-col-account-settings">
        <div class="tm-bg-primary-dark tm-block tm-block-settings">

          <h2 class="tm-block-title">Account Settings</h2>
          @if (Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
          </div>
          @endif

          <form action="{{ route('lessor.update') }}"  method="POST" class="tm-signup-form row" id="updateProfileForm">
            @csrf
            <div class="form-group col-lg-6">
              <label for="name">Account Name</label>
              <input
                id="name"
                name="name"
                type="text"
                class="form-control validate border"
                value="{{ $lessor->name }}"
              />
              <small class="error-msg"></small>
            </div>
            <div class="form-group col-lg-6">
              <label for="email">Account Email</label>
              <input
                id="email"
                name="email"
                type="email"
                class="form-control validate border"
                value="{{ $lessor->email }}"
              />
              <small class="error-msg"></small>
            </div>
            <div class="form-group col-lg-6">
              <label for="password">Password</label>
              <input
                id="password"
                name="password"
                type="password"
                class="form-control validate border"
                
              />
              <small class="error-msg"></small>
            </div>
            <div class="form-group col-lg-6">
              <label for="password2">Re-enter Password</label>
              <input
                id="password2"
                name="password2"
                type="password"
                class="form-control validate border"
                
              />
              <small class="error-msg"></small>
            </div>
            <div class="form-group col-lg-6">
              <label for="phone">Phone</label>
              <input
                id="phone"
                name="phone"
                type="tel"
                class="form-control validate border"
                value="{{ $lessor->phone }}"
              />
              <small class="error-msg"></small>
            </div>
            {{-- <div class="form-group col-lg-6">
              <label class="tm-hide-sm">&nbsp;</label>
              <button
                type="submit"
                class="btn btn-primary btn-block text-uppercase "
              >
                Update Your Profile
              </button>
            </div> --}}
            <div class="col-12">
              <button
                type="submit"
                class="btn btn-primary btn-block text-uppercase "
              >
              Update Your Profile
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

   
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('updateProfileForm');
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const password2Input = document.getElementById('password2');
      const phoneInput = document.getElementById('phone');
  
      form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission if validation fails
  
        // Clear previous error messages
        clearErrorMessages();
  
        // Perform validation
        let isValid = true;
  
        if (nameInput.value.trim() === '') {
          displayErrorMessage(nameInput, 'Please enter your account name');
          isValid = false;
        }
  
        if (emailInput.value.trim() === '') {
          displayErrorMessage(emailInput, 'Please enter your account email');
          isValid = false;
        } else if (!validateEmail(emailInput.value.trim())) {
          displayErrorMessage(emailInput, 'Please enter a valid email address');
          isValid = false;
        }
  
        if (passwordInput.value.trim() !== '' && passwordInput.value.length < 8) {
          displayErrorMessage(passwordInput, 'Password must be at least 8 characters long');
          isValid = false;
        }
  
        if (password2Input.value !== passwordInput.value) {
          displayErrorMessage(password2Input, 'Passwords do not match');
          isValid = false;
        }
  
        if (phoneInput.value.trim() === '') {
          displayErrorMessage(phoneInput, 'Please enter your phone number');
          isValid = false;
        }
  
        if (isValid) {
          form.submit(); // Submit the form if validation passes
        }
      });
  
      function displayErrorMessage(inputElement, message) {
        const errorElement = inputElement.nextElementSibling;
        errorElement.innerText = message;
        errorElement.style.display = 'block';
      }
  
      function clearErrorMessages() {
        const errorElements = document.querySelectorAll('.error-msg');
        errorElements.forEach(function(element) {
          element.innerText = '';
          element.style.display = 'none';
        });
      }
  
      function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
        }
    });
  </script>
  


  @endsection
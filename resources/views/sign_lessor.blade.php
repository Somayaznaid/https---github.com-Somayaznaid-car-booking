<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/style_sign.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('createLessor') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                                <small class="error-msg" id="name-error"></small>
                            </div>
                        
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" />
                                <small class="error-msg" id="email-error"></small>
                            </div>
                        
                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-accounts-list-alt"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone" />
                                <small class="error-msg" id="phone-error"></small>
                            </div>
                        
                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-account-box-mail"></i></label>
                                <input type="text" name="address" id="address" placeholder="Address" />
                                <small class="error-msg" id="address-error"></small>
                            </div>
                        
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <small class="error-msg" id="password-error"></small>
                            </div>
                        
                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re-password" placeholder="Confirm Password" />
                                <small class="error-msg" id="re-password-error"></small>
                            </div>
                        
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to all statements in <a href="#" class="term-service">Terms of service</a></label>
                                <small class="error-msg" id="agree-term-error"></small>
                            </div>
                        
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit btn" value="Register" />
                            </div>
                        </form>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/smart-car.png" alt="sing up image" class="sign_img"></figure>
                        <a href="login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
   <script> 
   
   document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('register-form');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission if validation fails

    // Clear previous error messages
    clearErrorMessages();

    // Perform validation
    let isValid = true;

    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');
    const passwordInput = document.getElementById('password');
    const rePasswordInput = document.getElementById('re-password');
    const agreeTermInput = document.getElementById('agree-term');

    if (nameInput.value.trim() === '') {
      displayErrorMessage(nameInput, 'Please enter your name');
      isValid = false;
    }

    if (emailInput.value.trim() === '') {
      displayErrorMessage(emailInput, 'Please enter your email');
      isValid = false;
    } else if (!validateEmail(emailInput.value.trim())) {
      displayErrorMessage(emailInput, 'Please enter a valid email address');
      isValid = false;
    }

    if (phoneInput.value.trim() === '') {
      displayErrorMessage(phoneInput, 'Please enter your phone number');
      isValid = false;
    }

    if (addressInput.value.trim() === '') {
      displayErrorMessage(addressInput, 'Please enter your address');
      isValid = false;
    }

    if (passwordInput.value === '') {
      displayErrorMessage(passwordInput, 'Please enter a password');
      isValid = false;
    } else if (!validatePassword(passwordInput.value.trim())) {
      displayErrorMessage(passwordInput, 'Password must contain at least 3 characters, one letter, one number, and one special character');
      isValid = false;
    }

    if (rePasswordInput.value === '') {
      displayErrorMessage(rePasswordInput, 'Please confirm your password');
      isValid = false;
    } else if (passwordInput.value !== rePasswordInput.value) {
      displayErrorMessage(rePasswordInput, 'Passwords do not match');
      isValid = false;
    }

    if (!agreeTermInput.checked) {
      displayErrorMessage(agreeTermInput, 'Please agree to the terms');
      isValid = false;
    }

    if (isValid) {
      form.submit(); // Submit the form if validation passes
    }
  });

  function displayErrorMessage(inputElement, message) {
    const errorElement = document.getElementById(`${inputElement.id}-error`);
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

  function validatePassword(password) {
    const passwordRegex = /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/;
    return passwordRegex.test(password);
  }
});

    </script>

</body>
</html>
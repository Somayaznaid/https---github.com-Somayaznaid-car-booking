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
                        <form method="POST" action="{{ route('create') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                              <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input type="text" name="name" id="name" placeholder="Your Name" required/>
                              <small id="name-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <label for="email"><i class="zmdi zmdi-email"></i></label>
                              <input type="email" name="email" id="email" placeholder="Your Email" required/>
                              <small id="email-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                              <input type="password" name="password" id="pass" placeholder="Password" required/>
                              <small id="password-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group password-input">
                              <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                              <input type="password" name="re_password" id="re-pass" placeholder="Password" required/>
                              <small id="re-password-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                              <label for="agree-term" class="label-agree-term">
                                <span><span></span></span>
                                I agree all statements in <a href="#" class="term-service">Terms of service</a>
                              </label>
                              <small id="agree-term-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group form-button">
                              <input type="submit" name="signup" id="signup" class="form-submit btn" value="Register"/>
                            </div>
                          </form>

                    </div>

                    <div class="signup-image">
                        <figure><img src="images/smart-car.png" alt="sing up image" class="sign_img"></figure>
                        <a href="login" class="signup-image-link">I am already member</a>
                        <br> 
                        <a href="sign_lessor" class="signup-image-link">Sign as Lessor</a>

                    </div>

                </div>

            </div>

        </section>




    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script>
        // Function to handle form submission
        function handleFormSubmit(event) {
          event.preventDefault(); // Prevent default form submission
      
          // Reset error messages
          resetErrors();
      
          // Perform form validation
          var nameInput = document.getElementById('name');
          var emailInput = document.getElementById('email');
          var passwordInput = document.getElementById('pass');
          var rePasswordInput = document.getElementById('re-pass');
          var agreeTermCheckbox = document.getElementById('agree-term');
      
          if (nameInput.value.trim() === '') {
            showError('name', 'Please enter your name');
            nameInput.focus();
            return;
          }
      
          if (emailInput.value.trim() === '') {
            showError('email', 'Please enter your email');
            emailInput.focus();
            return;
          }
          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(emailInput.value.trim())) {
           showError('email', 'Please enter a valid email address');
           emailInput.focus();
           return;
          }
          if (passwordInput.value.trim() === '') {
            showError('password', 'Please enter a password');
            passwordInput.focus();
            return;
          }
      
          if (rePasswordInput.value.trim() === '') {
            showError('re-pass', 'Please confirm your password');
            rePasswordInput.focus();
            return;
          }
      
          if (passwordInput.value !== rePasswordInput.value) {
            showError('re-pass', 'Passwords do not match');
            rePasswordInput.focus();
            return;
          }
      
          if (!agreeTermCheckbox.checked) {
            showError('agree-term', 'Please agree to the terms');
            return;
          }
      
          // If all validations pass, submit the form
          document.getElementById('register-form').submit();
        }
      
        // Function to display an error message
        function showError(field, message) {
          var errorElement = document.getElementById(field + '-error');
          errorElement.innerText = message;
        }
      
        // Function to reset error messages
        function resetErrors() {
          var errorElements = document.getElementsByClassName('form-error');
          for (var i = 0; i < errorElements.length; i++) {
            errorElements[i].innerText = '';
          }
        }
      
        // Attach event listener to the form submit button
        var submitButton = document.getElementById('signup');
        submitButton.addEventListener('click', handleFormSubmit);
      </script>
</body>
</html>
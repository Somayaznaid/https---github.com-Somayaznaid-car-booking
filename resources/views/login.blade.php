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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container_log">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/electric-car.png"  class="login_img" alt="sing up image"></figure>
                        <a href="sign_up" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('log') }}" class="register-form" id="login-form">
                            @csrf
                            <!-- Form fields -->
                            <div class="form-group">
                              <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input type="text" name="email" id="your_email" placeholder="Your Email" />
                              <small id="email-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                              <input type="password" name="password" id="your_pass" placeholder="Password" required/>
                              <small id="password-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                              <label for="remember-me" class="label-agree-term">
                                <span><span></span></span>
                                Remember me
                              </label>
                            </div>
                          
                            <div class="form-group form-button">
                              <input type="submit" name="signin" id="signin" class="form-submit btn" value="Log in"/>
                            </div>
                          </form>

                        <div class="flash-messages">
                        @if(session('error'))
                        <div class="alert alert-danger">
                             {{ session('error') }}
                          </div>
                        @endif 
                            </div>
                            
                        {{-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> --}}
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
          var emailInput = document.getElementById('your_email');
          var passwordInput = document.getElementById('your_pass');
      
          if (emailInput.value.trim() === '') {
            showError('email', 'Please enter your email');
            emailInput.focus();
            return;
          }
      
          if (passwordInput.value.trim() === '') {
            showError('password', 'Please enter your password');
            passwordInput.focus();
            return;
          }
      
          // Perform validations for other fields
      
          // If all validations pass, submit the form
          document.getElementById('login-form').submit();
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
        var submitButton = document.getElementById('signin');
        submitButton.addEventListener('click', handleFormSubmit);
      
        // Optional: Attach event listener to the form on submit event
        var loginForm = document.getElementById('login-form');
        loginForm.addEventListener('submit', handleFormSubmit);
      </script>
</body>
</html>
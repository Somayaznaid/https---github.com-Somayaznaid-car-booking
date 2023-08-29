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
                              <input type="email" name="email" id="your_email" placeholder="Your Email" />
                              <small id="email-error" class="form-error"></small>
                            </div>
                          
                            <div class="form-group">
                              <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                              <input type="password" name="password" id="your_pass" placeholder="Password" required />
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
                              <input type="submit" name="signin" id="submitBtn" class="form-submit btn" value="Log in"/>
                            </div>
                          </form>

                        <div class="flash-messages">
                        @if(session('error'))
                        <div class="alert alert-danger">
                             {{ session('error') }}
                          </div>
                        @endif 
                            </div>
                            


              
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script>
    const emailInput = document.getElementById("your_email");
    const passwordInput = document.getElementById("your_pass");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const submitButton = document.getElementById("submitBtn");

    
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    submitButton.addEventListener("click", function (event) {
      let isValid = true;

      if (!emailRegex.test(emailInput.value)) {
        isValid = false;
        emailError.textContent = "Please enter a valid email address.";
      } else {
        emailError.textContent = "";
      }

      if (passwordInput.value.trim() === "") {
        isValid = false;
        passwordError.textContent = "Password is required.";
      } else {
        passwordError.textContent = "";
      }

      if (!isValid) {
        event.preventDefault(); 
      }
    });
        
      </script>
</body>
</html>
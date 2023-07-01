<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

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
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <small >@error('name'){{$message}} @enderror</small>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <small >@error('email'){{$message}} @enderror</small>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <small >@error('password'){{$message}} @enderror</small>

                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re-pass" placeholder="Password" />
                            </div>
                            <small >@error('re_password'){{$message}} @enderror</small>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <small >@error('agree-term'){{$message}} @enderror</small>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit btn" value="Register"/>
                            </div>

                        </form>

                    </div>

                    <div class="signup-image">
                        <figure><img src="images/car_sign.jpg" alt="sing up image" class="sign_img"></figure>
                        <a href="login" class="signup-image-link">I am already member</a>
                        
                        <a href="sign_lessor" class="signup-image-link">Sign as Lessor</a>

                    </div>

                </div>

            </div>

        </section>




    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
   
</body>
</html>
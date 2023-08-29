<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style_sign.css') }}">
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
                                <input type="text" name="name" id="name" placeholder="Your Name" required />
                                <small id="name-error" class="form-error"></small>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                                <small id="email-error" class="form-error"></small>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                                <small id="password-error" class="form-error"></small>
                            </div>

                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re-pass" placeholder="Password"
                                    required />
                                <small id="re-password-error" class="form-error"></small>
                            </div>

                           

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit btn"
                                    value="Register" />
                            </div>
                        </form>

                    </div>

                    <div class="signup-image">
                        <figure><img src="images/sport-car.png" alt="sing up image" class="sign_img"></figure>
                        <a href="login" class="signup-image-link">I am already member</a>
                        <br>
                        <a href="sign_lessor" class="signup-image-link">Sign as Lessor</a>

                    </div>

                </div>

            </div>

        </section>




    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script>
        const form = document.getElementById("register-form");
        const nameInput = document.getElementById("name");
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("pass");
        const rePasswordInput = document.getElementById("re-pass");
        const nameError = document.getElementById("name-error");
        const emailError = document.getElementById("email-error");
        const passwordError = document.getElementById("password-error");
        const rePasswordError = document.getElementById("re-password-error");
        const submitButton = document.getElementById("signup");

        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        submitButton.addEventListener("click", function(event) {
            let isValid = true;

            clearErrors();

            if (nameInput.value.trim() === "") {
                isValid = false;
                nameError.textContent = "Name is required";
            }

            if (!emailRegex.test(emailInput.value)) {
                isValid = false;
                emailError.textContent = "Please enter a valid email address.";
            }

            if (passwordInput.value.length < 6) {
                isValid = false;
                passwordError.textContent = "Password must be at least 6 characters long";
            }

            if (passwordInput.value !== rePasswordInput.value) {
                isValid = false;
                rePasswordError.textContent = "Passwords do not match";
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        function clearErrors() {
            nameError.textContent = "";
            emailError.textContent = "";
            passwordError.textContent = "";
            rePasswordError.textContent = "";
        }
    </script>


</body>

</html>

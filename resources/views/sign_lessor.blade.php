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

    <div class="main_lessor">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('createLessor') }}" class="register-form"
                            id="register-form">
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
                                <input type="text" name="password" id="password" placeholder="Password" />
                                <small class="error-msg" id="password-error"></small>
                            </div>

                            <div class="form-group password-input">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="re_password" id="re-password"
                                    placeholder="Confirm Password" />
                                <small class="error-msg" id="re-password-error"></small>
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
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- JS -->
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            let isValid = true;

            // Name validation
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('name-error');
            if (nameInput.value.trim() === '') {
                nameError.textContent = 'Name is required';
                isValid = false;
            } else {
                nameError.textContent = '';
            }

            // Email validation
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Enter a valid email address';
                isValid = false;
            } else {
                emailError.textContent = '';
            }

            // Phone validation (Jordan)
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phone-error');
            const jordanPhoneRegex = /^(\+?962|0)(7[789]|8[1234569]|9[89])[0-9]{7}$/;
            if (!jordanPhoneRegex.test(phoneInput.value)) {
                phoneError.textContent = 'Enter a valid Jordanian phone number';
                isValid = false;
            } else {
                phoneError.textContent = '';
            }

            // Address validation
            const addressInput = document.getElementById('address');
            const addressError = document.getElementById('address-error');
            if (addressInput.value.trim() === '') {
                addressError.textContent = 'Address is required';
                isValid = false;
            } else {
                addressError.textContent = '';
            }

            // Password validation
            const passwordInput = document.getElementById('password');
            const passwordError = document.getElementById('password-error');
            // Password validation rules
            const passwordRegex = /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/;
;
            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.textContent =
                    'Password must be Valid.';
                isValid = false;
            } else {
                passwordError.textContent = '';
            }

            // Confirm Password validation
            const confirmPasswordInput = document.getElementById('re-password');
            const confirmPasswordError = document.getElementById('re-password-error');
            if (confirmPasswordInput.value !== passwordInput.value) {
                confirmPasswordError.textContent = 'Passwords do not match';
                isValid = false;
            } else {
                confirmPasswordError.textContent = '';
            }

            // const confirmRePasswordInput = document.getElementById('re-password');
            // const confirmRePasswordError = document.getElementById('re-password-error');
            // if (confirmPasswordInput.value !== passwordInput.value) {
            //     confirmPasswordError.textContent = 'Passwords do not match';
            //     isValid = false;
            // } else {
            //     confirmPasswordError.textContent = '';
            // }


            // Prevent form submission if any validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>




</body>

</html>

@extends('admin.master')

@section('content')
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup-content {
            background-color: #fff;
            width: 300px;
            padding: 20px;
            margin: 100px auto;
        }

        .popup input,
        .popup button {
            margin: 10px 0;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if (Session::has('warning_delete_user'))
                    <div class="alert  alert-danger" role="alert">
                        {{ Session::get('warning_delete_user') }}
                    </div>
                @endif


                @if (Session::has('success_delete_user'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('success_delete_user') }}
                    </div>
                @endif

                @if (Session::has('warning_delete_Lessor'))
                    <div class="alert  alert-danger" role="alert">
                        {{ Session::get('warning_delete_Lessor') }}
                    </div>
                @endif


                @if (Session::has('success_delete_Lessor'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('success_delete_Lessor') }}
                    </div>
                @endif

                @if (Session::has('add_user'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('add_user') }}
                    </div>
                @endif

                @if (Session::has('add_lessor'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('add_lessor') }}
                    </div>
                @endif

                @if (Session::has('user_info_update'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('user_info_update') }}
                    </div>
                @endif

                @if (Session::has('lessor_info_update'))
                    <div class="alert  alert-success text-dark" role="alert">
                        {{ Session::get('lessor_info_update') }}
                    </div>
                @endif






                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Users table</h6>
                            <h6 class="text-white text-capitalize ps-3 ml-5">
                                <button onclick="openUserPopup()"
                                    class="btn badge badge-sm bg-gradient-secondary">add</button>
                            </h6>
                            <div id="user_popup" class="popup">
                                <div class="popup-content">
                                    <h4 class="d-flex justify-content-between align-items-center">Add User:
                                        <button onclick="closeLUserPopup()" class="close-button btn">
                                            <i class="fas fa-times"></i>
                                            <!-- Assuming you are using Font Awesome for icons -->
                                        </button>
                                    </h4>
                                    <form action="{{ route('addUser') }}" method="POST" id="userForm">
                                        @csrf
                                        <input type="text" name="name" placeholder="Name">
                                        <span class="error-message" id="nameError"></span>
                                        <input type="text" name="email" placeholder="Email">
                                        <span class="error-message" id="emailError"></span>
                                        <input type="password" name="password" placeholder="Password">
                                        <span class="error-message" id="passwordError"></span>
                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Users</th>
                                        <th
                                            class="align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-secondary opacity-7 align-middle text-center">operation</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $user['img'] }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user['name'] }}</h6>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $user['email'] }}</p>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                              @if ($user->status === 'online')
                                                  <span class="badge badge-sm bg-gradient-success">Online</span>
                                              @else
                                                  <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                              @endif
                                          </td>

                                            <td class="align-middle text-center">
                                                <a href="/edit/{{ $user['id'] }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                               

                                                  
                                                

                                                <!-- Button trigger modal -->
                                                <button type="button" class="text-danger border-0 bg-white font-weight-bold text-xs" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete User: 
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <p>Are you sure you want to delete the user: {{ $user->name }}?</p>
                                                              
                                                            </div>
                                                            <div class="modal-footer">
                                                               
                                                              <a href="admin_table/delete/user {{ $user['id'] }}"
                                                              class="text-light font-weight-bold text-xs btn btn-danger" data-toggle="tooltip"
                                                              data-original-title="Edit user">
                                                              Delete
                                                              </a>

                                                              <form action="{{ url('admin_table') }}" method="POST"></form>
                                                                <button type="button" class="btn btn-primary font-weight-bold text-xs">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lessors table</h6>
                            <h6 class="text-white text-capitalize ps-3 ml-5">
                                <button onclick="openLessorPopup()"
                                    class="btn badge badge-sm bg-gradient-secondary">add</button>
                            </h6>

                            <div id="lessor_popup" class="popup">
                                <div class="popup-content">
                                    <h4 class="d-flex justify-content-between align-items-center">Add Lessor:
                                        <button onclick="closeLessorPopup()" class="close-button btn">
                                            <i class="fas fa-times"></i>
                                            <!-- Assuming you are using Font Awesome for icons -->
                                        </button>
                                    </h4>
                                    <form action="{{ route('addlessor') }}" method="POST" id="lessorForm">
                                        @csrf
                                        <input type="text" name="name" placeholder="Name">
                                        <small id="nameError">{{ $errors->first('name') }}</small>
                                        <input type="text" name="email" placeholder="Email">
                                        <small id="emailError">{{ $errors->first('email') }}</small>
                                        <input type="text" name="password" placeholder="Password">
                                        <small id="passwordError">{{ $errors->first('password') }}</small>
                                        <input type="text" name="phone" placeholder="Phone">
                                        <small id="phoneError">{{ $errors->first('phone') }}</small>
                                        <input type="text" name="address" placeholder="Address">
                                        <small id="addressError">{{ $errors->first('address') }}</small>
                                        <button class="btn btn-secondary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lessors</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address</th>
                                        <th
                                            class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>

                                        <th class="text-secondary opacity-7 text-center align-middle">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessors as $lessor)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $lessor['img'] }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $lessor['name'] }}</h6>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $lessor['email'] }}</p>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $lessor['phone'] }}</p>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $lessor['address'] }}</p>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($lessor->status === 'online')
                                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                @endif
                                            </td>

                                            <td class="align-middle text-center">
                                                <a href="edit/lessor/ {{ $lessor['id'] }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                           
                                                <!-- Button trigger modal -->
                                                <button type="button" class="text-danger border-0 bg-white font-weight-bold text-xs" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Lessor: 
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body">
                                                              <p>Are you sure you want to delete the lessor: {{ $lessor->name }}?</p>
                                                             
                                                            </div>
                                                            <div class="modal-footer">
                                                               
                                                              <a href="admin_table/delete/lessor {{ $lessor['id'] }}"
                                                              class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                              data-original-title="Edit user">
                                                              Delete
                                                          </a>

                                                              <form action="{{ url('admin_table') }}" method="POST"></form>
                                                                <button type="button" class="btn btn-primary font-weight-bold text-xs">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>
            function openUserPopup() {
                var popup = document.getElementById("user_popup");
                popup.style.display = "block";
            }

            function closeUserPopup() {
                var popup = document.getElementById("user_popup");
                popup.style.display = "none";
            }

            function closeLessorPopup() {
                var popup = document.getElementById("lessor_popup");
                popup.style.display = "none";
            }

            function openLessorPopup() {
                var popup = document.getElementById("lessor_popup");
                popup.style.display = "block";
            }

            function submitUserForm() {
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;

                // You can perform any desired action with the input values here

                // Close the popup
                var popup = document.getElementById("user_popup");
                popup.style.display = "none";

                closeLessorPopup();
            }

            function submitLessorForm() {
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;

                // You can perform any desired action with the input values here

                // Close the popup
                var popup = document.getElementById("lessor_popup");
                popup.style.display = "none";
            }


            // function confirmDeletion() {
            //       if (confirm('Are you sure you want to delete this user?')) {
            //           document.getElementById('delete-car-form').submit();
            //       } else {
            //           alert('Car deletion canceled.');
            //       }
            //   }


            // add user validation 

            function submitUserForm(event) {
                event.preventDefault(); // Prevent form submission if validation fails


                const nameInput = document.querySelector('input[name="name"]');
                const emailInput = document.querySelector('input[name="email"]');
                const passwordInput = document.querySelector('input[name="password"]');


                const nameError = document.getElementById('nameError');
                const emailError = document.getElementById('emailError');
                const passwordError = document.getElementById('passwordError');


                nameError.textContent = '';
                emailError.textContent = '';
                passwordError.textContent = '';


                let isValid = true;

                if (nameInput.value.trim() === '') {
                    isValid = false;
                    nameError.textContent = 'Please enter your name';
                }

                if (emailInput.value.trim() === '') {
                    isValid = false;
                    emailError.textContent = 'Please enter your email';
                }

                if (passwordInput.value.trim() === '') {
                    isValid = false;
                    passwordError.textContent = 'Please enter your password';
                }

                if (isValid) {
                    // Submit the form if validation passes
                    document.getElementById('userForm').submit();
                }
            }

            // Event listener for form submission
            document.getElementById('userForm').addEventListener('submit', submitUserForm);



            // Add Lessor validation
            // document.addEventListener('DOMContentLoaded', function() {
            //   const form = document.getElementById('lessorForm');

            //   form.addEventListener('submit', function(event) {
            //     event.preventDefault(); // Prevent form submission if validation fails

            //     // Clear previous error messages
            //     clearErrorMessages();

            //     // Perform validation
            //     let isValid = true;

            //     const nameInput = document.querySelector('input[name="name"]');
            //     const emailInput = document.querySelector('input[name="email"]');
            //     const passwordInput = document.querySelector('input[name="password"]');
            //     const phoneInput = document.querySelector('input[name="phone"]');
            //     const addressInput = document.querySelector('input[name="address"]');

            //     if (nameInput.value.trim() === '') {
            //       displayErrorMessage(nameInput, 'Please enter your name');
            //       isValid = false;
            //     }

            //     if (emailInput.value.trim() === '') {
            //       displayErrorMessage(emailInput, 'Please enter your email');
            //       isValid = false;
            //     } else if (!validateEmail(emailInput.value.trim())) {
            //       displayErrorMessage(emailInput, 'Please enter a valid email address');
            //       isValid = false;
            //     }

            //     if (passwordInput.value.trim() === '') {
            //       displayErrorMessage(passwordInput, 'Please enter a password');
            //       isValid = false;
            //     } else if (!validatePassword(passwordInput.value.trim())) {
            //       displayErrorMessage(passwordInput, 'Password must contain at least 6 characters, one letter, one number, and one special character');
            //       isValid = false;
            //     }

            //     if (phoneInput.value.trim() === '') {
            //       displayErrorMessage(phoneInput, 'Please enter your phone number');
            //       isValid = false;
            //     }

            //     if (addressInput.value.trim() === '') {
            //       displayErrorMessage(addressInput, 'Please enter your address');
            //       isValid = false;
            //     }

            //     if (isValid) {
            //       form.submit(); // Submit the form if validation passes
            //     }
            //   });

            //   function displayErrorMessage(inputElement, message) {
            //     const errorElement = document.getElementById(`${inputElement.name}Error`);
            //     errorElement.innerText = message;
            //     errorElement.style.display = 'block';
            //   }

            //   function clearErrorMessages() {
            //     const errorElements = document.querySelectorAll('.error-msg');
            //     errorElements.forEach(function(element) {
            //       element.innerText = '';
            //       element.style.display = 'none';
            //     });
            //   }
            //   document.getElementById('lessorForm').addEventListener('submit', submitLessorForm);

            //   function validateEmail(email) {
            //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            //     return emailRegex.test(email);
            //   }

            //   function validatePassword(password) {
            //     const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
            //     return passwordRegex.test(password);
            //   }
            // });


            // function confirmDeletion() {
            //     return confirm('Are you sure you want to delete this user?');
            // }



            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })
        </script>
    @endsection

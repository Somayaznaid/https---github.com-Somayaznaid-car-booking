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
                                <div class="popup-content rounded">
                                    <h4 class="d-flex justify-content-between align-items-center">Add User:
                                        <button onclick="closeUserPopup()" class="close-button btn">
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
                                        <th
                                            class="align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                <button type="button"
                                                    class="text-danger border-0 bg-white font-weight-bold text-xs"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                                    Delete
                                                </button>

                                


                                                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete {{ $user->name }}</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{ $user->name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                                                                <a href="admin_table/delete/user {{ $user['id'] }}"
                                                                class="text-light font-weight-bold text-xs btn btn-danger" data-toggle="tooltip"
                                                                data-original-title="Edit user">
                                                                Delete
                                                                </a>
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
                                <div class="popup-content rounded">
                                    <h4 class="d-flex justify-content-between align-items-center">Add Lessor:
                                        <button onclick="closeLessorPopup()" class="close-button btn">
                                            <i class="fas fa-times"></i>
                                            <!-- Assuming you are using Font Awesome for icons -->
                                        </button>
                                    </h4>
                                    <form action="{{ route('addlessor') }}" method="POST" id="lessorForm"
                                        >
                                        @csrf
                                        <input type="text" name="name" placeholder="Name" id="nameLessor">
                                        <small id="nameLessorError"></small>
                                        <input type="text" name="email" placeholder="Email" id="emailLessor">
                                        <small id="emailLessorError"></small>
                                        <input type="text" name="password" placeholder="Password" id="passwordLessor">
                                        <small id="passwordLessorError"></small>
                                        <input type="text" name="phone" placeholder="Phone" id="phoneLessor">
                                        <small id="phoneLessorError"></small>
                                        <input type="text" name="address" placeholder="Address" id="addressLessor">
                                        <small id="addressLessorError"></small>
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
                                                <button type="button"
                                                    class="text-danger border-0 bg-white font-weight-bold text-xs"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $lessor->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                

                                                <div class="modal fade" id="deleteModal{{ $lessor->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete {{ $lessor->name }}</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{ $lessor->name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                                                                <a href="admin_table/delete/lessor {{ $lessor['id'] }}"
                                                                class="text-light font-weight-bold text-xs btn btn-danger" data-toggle="tooltip"
                                                                data-original-title="Edit lessor">
                                                                Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                {{-- <div class="modal fade" id="deleteModal{{ $lessor->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete {{ $lessor->name }}</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{ $lessor->name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                                                                {{-- <a href="admin_table/delete/lessor {{ $lessor->id }}"
                                                                class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                                data-original-title="Edit user">
                                                                Delete
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                {{-- </div> --}} 




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





            // add user validation 

            function validationUserForm(event) {
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
            document.getElementById('userForm').addEventListener('submit', validationUserForm);

            // Add Lessor validation 
            function validateLessorForm(event) {
                event.preventDefault();
                // Get form input values
                var name = document.getElementById('nameLessor').value;
                var email = document.getElementById('emailLessor').value;
                var password = document.getElementById('passwordLessor').value;
                var phone = document.getElementById('phoneLessor').value;
                var address = document.getElementById('addressLessor').value;

                // Regular expressions for validation
                var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
                var passwordRegex = /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/;
                var phoneRegex = /^(\+?962|0)(7[789]|79|77|78|79|07)[0-9]{7}$/i;

                // Reset error messages
                document.getElementById('nameLessorError').textContent = '';
                document.getElementById('emailLessorError').textContent = '';
                document.getElementById('passwordLessorError').textContent = '';
                document.getElementById('phoneLessorError').textContent = '';
                document.getElementById('addressLessorError').textContent = '';

                // Validate name
                if (name.trim() === '') {
                    document.getElementById('nameLessorError').textContent = 'Name is required';
                    return false;
                }

                // Validate email
                if (!email.match(emailRegex)) {
                    document.getElementById('emailLessorError').textContent = 'Invalid email format';
                    return false;
                }

                // Validate password
                if (!password.match(passwordRegex)) {
                    document.getElementById('passwordLessorError').textContent =
                        'Password must have at least 8 characters and contain at least one letter and one number';
                    return false;
                }

                // Validate phone
                if (!phone.match(phoneRegex)) {
                    document.getElementById('phoneLessorError').textContent = 'Invalid Jordanian phone number';
                    return false;
                }

                // Validate address
                if (address.trim() === '') {
                    document.getElementById('addressLessorError').textContent = 'Address is required';
                    return false;
                }

                // If all validations pass, the form will be submitted
                return true;
            }

            document.getElementById('lessorForm').addEventListener('submit', validateLessorForm);

            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })
        </script>
    @endsection

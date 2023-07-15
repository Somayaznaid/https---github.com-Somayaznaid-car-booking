@extends("admin.master")

@section("content")
<div class="card my-4">
  <form action="{{ route('editLessor') }}" method="POST" class="p-4" id="editUserForm">
    @csrf 
    <input type="hidden" name="id" value="{{$lessor['id']}}">
    <div class="form-group">
        <label for="name" class="m-2">Name:</label>
        <input type="text" name="name" id="name" class="form-control border m-2" placeholder="Name" value="{{$lessor['name']}}">
        <small id="nameError" class="text-danger"></small>
    </div>
    <div class="form-group">
        <label for="email" class="m-2">Email:</label>
        <input type="text" name="email" id="email" class="form-control border m-2" placeholder="Email" value="{{$lessor['email']}}">
        <small id="emailError" class="text-danger"></small>
    </div>
    <div class="form-group">
        <label for="password" class="m-2">Password:</label>
        <input type="password" name="password" id="password" class="form-control border m-2" placeholder="Password" value="{{$lessor['password']}}">
        <small id="passwordError" class="text-danger"></small>
    </div>

    <div class="form-group">
        <label for="phone" class="m-2">Password:</label>
        <input type="phone" name="phone" id="phone" class="form-control border m-2" placeholder="Phone" value="{{$lessor['phone']}}">
        <small id="phoneError" class="text-danger"></small>
    </div>

    <div class="form-group">
        <label for="address" class="m-2">Password:</label>
        <input type="address" name="address" id="address" class="form-control border m-2" placeholder="address" value="{{$lessor['address']}}">
        <small id="addressError" class="text-danger"></small>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary m-2" onclick="validateForm(event)">Update</button>
    </div>
</form>
</div>

<script>
  function validateForm(event) {
      event.preventDefault(); // Prevent form submission

      // Get form inputs
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');

      // Get error elements
      const nameError = document.getElementById('nameError');
      const emailError = document.getElementById('emailError');
      const passwordError = document.getElementById('passwordError');

      // Reset previous error messages
      nameError.textContent = '';
      emailError.textContent = '';
      passwordError.textContent = '';

      // Validate name field
      if (nameInput.value.trim() === '') {
          nameError.textContent = 'Name is required';
          nameInput.focus();
          return false;
      }

      // Validate email field
      if (emailInput.value.trim() === '') {
          emailError.textContent = 'Email is required';
          emailInput.focus();
          return false;
      } else if (!isValidEmail(emailInput.value.trim())) {
          emailError.textContent = 'Invalid email format';
          emailInput.focus();
          return false;
      }

      // Validate password field
      if (passwordInput.value.trim() === '') {
          passwordError.textContent = 'Password is required';
          passwordInput.focus();
          return false;
      } else if (passwordInput.value.length < 6) {
          passwordError.textContent = 'Password must be at least 6 characters long';
          passwordInput.focus();
          return false;
      }

      // Form validation passed, submit the form
      document.getElementById('editUserForm').submit();
  }

  function isValidEmail(email) {
      // Use a regular expression to validate email format
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
  }
</script>

@endsection
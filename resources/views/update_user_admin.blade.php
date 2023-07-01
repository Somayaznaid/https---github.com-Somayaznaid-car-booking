@extends("admin.master")

@section("content")
<div class="card my-4">
  <form action="{{ route('editUser') }}" method="POST" class="p-4">
    @csrf 
    <input type="hidden" name="id" value='{{$user["id"]}}'>
    <div class="form-group">
      <label for="name" class="m-2">Name:</label>
      <input type="text" name="name" id="name" class="form-control border m-2" placeholder="Name" value='{{$user["name"]}}'>
    </div>
    <div class="form-group">
      <label for="email" class="m-2">Email:</label>
      <input type="text" name="email" id="email" class="form-control border m-2" placeholder="Email" value='{{$user["email"]}}'>
    </div>
    <div class="form-group">
      <label for="password" class="m-2">Password:</label>
      <input type="password" name="password" id="password" class="form-control border m-2" placeholder="Password" value='{{$user["password"]}}'>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary m-2">Update</button>
 </div>
  </form>
</div>


@endsection
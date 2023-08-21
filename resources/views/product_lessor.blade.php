@extends('lessor.master')

@section('content')


    <div class="container mt-5 col-sm-12">
        <div class=" ">
            <div class="col-sm-12 col-md-12 m-1">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <h2 class="tm-site-title m-2">Your Products</h2>
                        <div class="form-group">
                            @if (Session::has('add_product_found'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('add_product_found') }}
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::has('warning'))
                                <div class="alert  alert-danger" role="alert">
                                    {{ Session::get('warning') }}
                                </div>
                            @endif


                            @if (Session::has('edit_product_found'))
                                <div class="alert  alert-success" role="alert">
                                    {{ Session::get('edit_product_found') }}
                                </div>
                            @endif

                        </div>
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                                <tr>

                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">MILEAGE</th>
                                    <th scope="col">TRANSMISSION</th>
                                    <th scope="col">SEATS</th>
                                    <th scope="col">LUGGAGE</th>
                                    <th scope="col">FUEL</th>
                                    <th scope="col">YEAR OF MANUFACTURE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cars)
                                    @foreach ($cars as $car)
                                        <tr>

                                            <td class="tm-product-name"><img src="{{ asset('images/' . $car->img_1) }}"
                                                    alt="car" width="50px"></td>
                                            <td>{{ $car->name }}</td>
                                            <td>{{ $car->price }}$</td>
                                            @if ($car->type_id === 1)
                                                <td>BOOK</td>
                                            @else
                                                <td>SALE</td>
                                            @endif
                                            <td>{{ $car->mileage }}</td>
                                            <td>{{ $car->transmission }}</td>
                                            <td>{{ $car->seats }}</td>
                                            <td>{{ $car->luggage }}</td>
                                            <td>{{ $car->fuel }}</td>
                                            <td>{{ $car->year_of_manufacture }}</td>
                                            <td>{{ $car->description }}</td>

                                            <td>
                                                <a href="" class="tm-product-delete-link" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $car->id }}">

                                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                                </a>


                                                {{-- <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Launch demo modal
                                                </button> --}}

                                                <!-- Modal -->
                                                <div class="modal fade tm-block tm-block-products" id="exampleModal{{ $car->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Car:
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{ $car->name }} ?
                                                            </div>
                                                            <div class="modal-footer">

                                                                <a href="product/delete/ {{ $car->id }}">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </a>

                                                                {{-- <form action="{{ url("product_lessor") }}" method="POST">
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                                </form> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="product/edit/ {{ $car->id }}" class="tm-product-delete-link">
                                                    <i class='fa fa-edit' style='color: white'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td class="tm-product-name align-middle" colspan="5"> NO PRODUCT ADD YET</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="{{ url('add_product') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new
                        product</a>

                </div>
            </div>






        </div>

        <script src="{{ asset('js/jquery-3.3.1_lessor.min.js') }}"></script>
        <!-- https://jquery.com/download/ -->
        <script src="{{ asset('js/bootstrap_lessor.min.js') }}"></script>
        <!-- https://getbootstrap.com/ -->
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })
        </script>


        <script>
            // function confirmDeletion() {
            //     if (confirm('Are you sure you want to delete this car?')) {
            //         document.getElementById('delete-car-form').submit();
            //     } else {
            //         alert('Car deletion canceled.');
            //     }
            // }


            // function confirmRejection() {
            //     if (confirm('Are you sure you want to reject this booking?')) {
            //         document.getElementById('delete-car-form').submit();
            //     } else {
            //         alert('book Rejection canceled.');
            //     }
            // }

            // var myModal = document.getElementById('myModal')
            // var myInput = document.getElementById('myInput')

            // myModal.addEventListener('shown.bs.modal', function() {
            //     myInput.focus()
            // })
        </script>
    @endsection

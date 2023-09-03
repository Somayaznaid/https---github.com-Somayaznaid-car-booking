@extends('lessor.master')

@section('content')
    <div class="col-sm-12 col-md-12 m-1">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-order-table-container">
                <h2 class="tm-site-title m-2">Your Orders</h2>
                @if (Session::has('success_reject'))
                    <div class="alert  alert-success" role="alert">
                        {{ Session::get('success_reject') }}
                    </div>
                @endif


                @if (Session::has('success_approve'))
                    <div class="alert  alert-success" role="alert">
                        {{ Session::get('success_approve') }}
                    </div>
                @endif
                <table class="table table-hover tm-table-small tm-product-table">
                    <thead>
                        <tr>

                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">BOOKING COST</th>
                            <th scope="col">Start DATE</th>
                            <th scope="col">End DATE</th>
                            <th scope="col">START LOCATION</th>
                            <th scope="col">END LOCATION</th>
                            <th scope="col">START HOUR</th>
                            <th scope="col">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>


                                <td class="tm-product-name">{{ $booking->car->name }}</td>
                                <td>{{ $booking->cost }}</td>
                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                <td>{{ $booking->start_location }}</td>
                                <td>{{ $booking->end_location }}</td>
                                <td>{{ $booking->start_hour }}</td>
                                <td>
                                    <!-- Form for approving the order -->
                                    @if ($booking->status === 'pending')
                                        <form action="{{ route('lessor.orders.approve', ['id' => $booking->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>



                                        {{-- <form action="{{ route('lessor.orders.reject', ['id' => $booking->id]) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf --}}
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Reject</button>
                                        {{-- </form> --}}

                                        <div class="modal fade tm-block tm-block-products" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">


                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                            Car:
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to reject this booking for
                                                        {{ $booking->car->name }} car ?
                                                    </div>
                                                    <div class="modal-footer">

                                                        {{-- <a href="{{ route('lessor.orders.reject', ['id' => $booking->id]) }}"> --}}
                                                        <form
                                                            action="{{ route('lessor.orders.reject', ['id' => $booking->id]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Reject</button>
                                                        </form>
                                                        {{-- </a> --}}

                                                        {{-- <form action="{{ url("product_lessor") }}" method="POST">
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                            </form> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($booking->status === 'approved')
                                        <form action="{{ route('lessor.orders.approve', ['id' => $booking->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success" readonly>Approved</button>
                                        </form>
                                    @endif

                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    </div>

    <script src="{{ asset('js/jquery-3.3.1_lessor.min.js') }}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{ asset('js/bootstrap_lessor.min.js') }}"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        // $(function() {
        //     $(".tm-product-name").on("click", function() {
        //         window.location.href = "edit-product.html";
        //     });
        // });

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>


@endsection

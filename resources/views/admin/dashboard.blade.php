@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h3 class="fs-2 m-0">Dashboard</h3>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Fetching data from the admin table -->
        @php
        $admin = App\Models\Admin::where('id', session('loginId'))->first();
        @endphp

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="fas fa-user me-2"></i>{{ $admin->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('admins.edit',$admin)}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('admins.logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p> {{$message}} </p>
        </div>
        @endif
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$totalProducts}}</h3>
                    <p class="fs-5">Products</p>
                </div>
                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$totalPaymentStatus}}</h3>
                    <p class="fs-5">Pending Payments</p>
                </div>
                <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$todayOrders}}</h3>
                    <p class="fs-5">Orders in Today</p>
                </div>
                <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$thisMonthOrders}}</h3>
                    <p class="fs-5">Orders in this Month</p>
                </div>
                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>{{$order->payment_status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection

@extends('layouts.admin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h3 class="fs-2 m-0">Products</h3>
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
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="{{route('admins.logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Products List') }}
                    <a href="{{route('products.create')}}" class="btn btn-success btn-xs py-1 float-end">Add</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p> {{$message}} </p>
                    </div>
                    @endif
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <tr>
                        <th scope="col" width="50">S.No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tbody>
                        @foreach ($products as $product)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{asset('upload/image/' .$product->image)}}" width="100px" height="100px">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{route('products.edit',$product)}}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <br><br>
                                <form action="{{route('products.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-trash" style="color: #ed0707;"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

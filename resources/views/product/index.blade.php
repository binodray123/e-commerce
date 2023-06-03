@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     Products List
                    <a href="{{route('products.create')}}" class="btn btn-success btn-xs py-1 float-end">Add</a>
                </div>

                <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p> {{$message}} </p>
                    </div>
                    @endif

                    <table class="table table-border">
                        <tr>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
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
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

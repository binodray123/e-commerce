@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cart List
                    <a href="{{route('products')}}" class=" py-1 float-end"><i class="fa-solid fa-xmark fa-lg" style="color: #eb0a0a;"></i></a>
                </div>

                <div class="card-body">

                    <table class="table table-border">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Remove</th>
                        </tr>
                        <tbody>
                            @foreach ($cartItems as $item)

                            <tr>
                                <td>
                                    <img src="{{asset('upload/image/' .$item->product->image)}}" width="100px" height="100px">
                                </td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->product->price}}</td>
                                <td>{{$item->product->description}}</td>
                                <td><a href="" class="btn"><i class="fa-solid fa-trash fa-lg" style="color: #f20713;"></i></a></td>
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

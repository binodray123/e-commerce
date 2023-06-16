@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="{{route('products.orderNow')}}" class="btn btn-success py-1 float-center">Order Now</a>
                    <a href="{{route('products')}}" class=" py-2 float-end"><i class="fa-solid fa-xmark fa-lg" style="color: #eb0a0a;"></i></a>
                </div>

                <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p> {{$message}} </p>
                    </div>
                    @endif

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
                                <td>
                                    <form action="{{route('carts.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn"><i class="fa-solid fa-trash fa-lg" style="color: #f20713;"></i></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                            {{ $cartItems->links() }}
                        </div>
        </div>
    </div>
</div>
@endsection

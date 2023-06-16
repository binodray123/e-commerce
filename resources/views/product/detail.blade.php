@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{asset('upload/image/' .$product->image)}}" style="height: 350px; width:100%">
        </div>
        <div class="col-sm-6">
            <b><a href="{{route('home')}}"> Go Back</a></b>
            <br> <br>
            <h2>{{$product->name}}</h2>
            <h4> <b>Price</b> : {{$product->price}}</h4>
            <h5> <b> Category </b> : {{$product->category}}</h5>
            <h6> <b>Details</b> : {{$product->description}}</h6>

            <br>
            <form action="{{route('products.addToCart',$product->id)}}" method="post">
                @csrf
                <!-- <input type="hidden" name="product_id" value="$product->id"> -->
                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</button>
            </form>
            <br> <br>
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection

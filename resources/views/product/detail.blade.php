@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{asset('upload/image/' .$product->image)}}" style="height: 350px; width:100%" >
        </div>
        <div class="col-sm-6">
            <a href="{{route('products')}}" > Go Back</a>
            <br> <br>
            <h2>{{$product->name}}</h2>
            <h4> <b>Price</b> : {{$product->price}}</h4>
            <h5> <b> Category </b> : {{$product->category}}</h5>
            <h6> <b>Details</b> : {{$product->description}}</h6>

        <br>
        <button class="btn btn-primary">Add to Cart</button>
        <br> <br>
        <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection

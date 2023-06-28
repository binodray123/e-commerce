@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <!-- <div class="card-header">{{ __('Products') }}</div> -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p> {{$message}} </p>
                    </div>
                    @endif
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner ">
                            @foreach ($products as $product)
                            <div class="carousel-item {{$product['id']==2?'active':''}}">
                                <a href="{{route('products.details',$product)}}">
                                    <img src="{{asset('upload/image/' .$product->image)}}" class="d-block" style="width:100%; height: 400px;">

                                    <div class="carousel-caption " style="background-color: #35443585;">
                                        <h3> {{ $product->name }} </h3>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <div class="trending-wrapper">
                        <h3>Trending Products</h3>
                        @foreach ($products as $product)
                        <div class="trending-product">
                            <a href="{{route('products.details', $product)}}">
                                <img src="{{asset('upload/image/' .$product->image)}}" class="trending-image">
                                <h5> {{ $product->name }} </h5>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
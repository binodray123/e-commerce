@extends('layouts.app')
@section("content")

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
            <div class="card shadow-0 border rounded-3">
                <div class="card-header">
                    My Orders
                    <a href="{{route('products')}}" class=" py-2 float-end"><i class="fa-solid fa-xmark fa-lg" style="color: black;"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                            @foreach ($orders as $item )
                                <img class="w-100" src="{{asset('upload/image/' .$item->product->image)}}">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>Name : {{$item->product->name}}</h5>
                                    <h6>Delivery Status : {{$item->status}}</h6>
                                    <h6>Address : {{$item->address}}</h6>
                                    <h6>Payment Status : {{$item->payment_status}}</h6>
                                    <h6>Payment Method : {{$item->payment_method}}</h6>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

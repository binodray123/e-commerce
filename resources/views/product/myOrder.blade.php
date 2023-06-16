@extends('layouts.app')
@section("content")

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">My Orders</h3>
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="order">
                        <div class="row">
                            @foreach ($orders as $item )
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="image">
                                    <img src="{{asset('upload/image/' .$item->product->image)}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="order-details">
                                    <h5>Name : {{$item->product->name}}</h5>
                                    <h6>Delivery Status : {{$item->status}}</h6>
                                    <h6>Address : {{$item->address}}</h6>
                                    <h6>Payment Status : {{$item->payment_status}}</h6>
                                    <h6>Payment Method : {{$item->payment_method}}</h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Order Details
                    <a href="{{route('products.cartList')}}" class=" py-2 float-end"><i class="fa-solid fa-xmark fa-lg" style="color: #eb0a0a;"></i></a>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p> {{$message}} </p>
                    </div>
                    @endif

                    <table class="table table-border">
                        <tbody>
                            <tr>
                                <td>Total Products Amount</td>
                                <td>Rs. {{$total}}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>Rs. 0</td>
                            </tr>
                            <tr>
                                <td>Delivery Charge</td>
                                <td>Rs. 100</td>
                            </tr>
                            <tr>
                                <td>Total Amount with Charges</td>
                                <td>Rs. {{$total+100}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="POST" action="{{route('products.order')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Enter your address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-end">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                <select name="payment_method" id="payment_method" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" value="{{ old('payment_method') }}" required autocomplete="payment_method">
                                    <option value="">Select payment</option>
                                    <option value="Esewa">Esewa on Delivery</option>
                                    <option value="Khalti">Khalti on Delivery</option>
                                    <option value="Cash">Cash on Delivery</option>
                                </select>

                                @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

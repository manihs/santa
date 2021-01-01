@extends('layouts.app')

@section('content')
<div class="card my-3 mx-auto col-7">

<div class="card-body">

    <h4 class="card-title mb-5">Thanks for your order!</h4>
    <p class="card-text mb-2 fw-bold">Hi {{ $data['firstname'] }},</p>
    <p class="card-text mb-3"> We are delighted that you have found something you like! As soon as your package is on its way, you will receive a delivery confirmation from us by email</p>
    <div class="row mb-3">
        <div class="col">
            <p class="card-text mb-2 fw-bold">Dilvery address</p>
            <p class="card-text mb-3"> {{ $data['address'] }} </p>
            <p class="card-text mb-3"> {{ $data['city'] }}, <p class="card-text mb-3"> {{ $data['state'] }} </p>
            <p class="card-text mb-3"> {{ $data['zip'] }} </p>
        </div>
        <div class="col text-end">
            <p class="card-text mb-2 fw-bold">Order Number</p>
            <p class="card-text mb-3"> 932478938</p>
            <p class="card-text mb-2 fw-bold">Order Date</p>
            <p class="card-text mb-3"> {{ date("Y/m/d") }}</p>
        </div>
    </div>
    <p class="card-text mb-2 fw-bold">Your Item</p>
    <hr>
    <div class="row mb-3">
        <div class="col-9">
            <div class="row">
                <div class="col-4"><img src="{{ asset($product->imgfront) }}" alt="" width="100%"></div>
                <div class="col-8">
                    <p class="card-text mb-2 fw-bold">{{ $product->name }}</p>
                    <p class="card-text mb-2"> quantity {{ $data['qtn']  }}</p>
                </div>
            </div>
        </div>
        <div class="col-3 text-end">
            <p class="card-text mb-2">{{ $data['qtn']  * $product->price}} Rs</p>
        </div>
    </div>

    <hr>
    <div class="row mb-3">
        <div class="col">
            <p class="card-text mb-2 fw-bold">Payment Method</p>
            <p class="card-text mb-2 fw-bold">Sub-Total</p>
            <p class="card-text mb-2 fw-bold">Shipping Fee</p>
            <p class="card-text mb-2 fw-bold">Total</p>
        </div>
        <div class="col text-end">
            <p class="card-text mb-2">Card Payment </p>
            <p class="card-text mb-2">  {{ $data['qtn'] * $product->price }} Rs</p>
            <p class="card-text mb-2">Free</p>
            <p class="card-text mb-2"> {{ $data['qtn'] * $product->price }} RS</p>
        </div>
    </div>
</div>
</div>
@endsection


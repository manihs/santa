
@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid">    
       <div class="row" style="min-height: 90vh!important;">
        <div class="col-3 bg-dark">
            <div id="list-example" class="list-group my-3">
                <a class="list-group-item list-group-item-action" href="{{ route('product') }}">Product</a>
                <a class="list-group-item list-group-item-action" href="{{ route('order') }}">Order</a>      
                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">   {{ __('Logout') }} </a>          
            </div>
        </div>
        <div class="col-9 px-5">
            <!--  -->
                <h3 class="text-muted text-capitalize px-0 my-4">{{ $product->modelno }} : {{$product->name }}</h3>
                <div class="row mx-auto">
                    <div class="col-6 px-0"><img src="{{ asset($product->imgfront) }}" alt="" width="100%"></div>
                </div>

                <!--  -->
                <h5 class="my-4 text-muted">Detail</h5>
                <table class="table">
               
                    <tbody>
                        <tr>
                            <td>Model No</td>
                            <td>{{ $product->modelno }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $product->gender }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $product->category }}</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>{{ $product->color }}</td>
                        </tr>
                        <tr>
                            <td>Material</td>
                            <td>{{ $product->material }}</td>
                        </tr>
                        <tr>
                            <td>describion</td>
                            <td>{{ $product->desc }}</td>
                        </tr>
                        <tr>
                            <td>quantity available</td>
                            <td>{{ $product->qtn }}</td>
                        </tr>
                        <tr>
                            <td>Required</td>
                            <td>{{ $product->required }}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{ $product->note }}</td>
                        </tr>

                        
                        
                    </tbody>
                </table>

            <!--  -->
        </div>
       </div>
    </div>
<main>
@endsection

@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid">    
       <div class="row" style="min-height: 90vh!important;">
        <div class="col-3 bg-dark">
            <div id="list-example" class="list-group my-3">
                <a class="list-group-item list-group-item-action" href="{{ route('product') }}">Product</a>
                <a class="list-group-item list-group-item-action" href="{{ route('order') }}">Order</a>            
                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">   {{ __('Logout') }} </a>  </div>
        </div>
        <div class="col-9 px-5">
            <!--  -->
                @if ( Session::has('status') )
                
                    <div class="alert  alert-success {{ Session::get('status') }}">
                        <h3>{{ Session::get('status') }}</h3>
                    </div>
                
                @endif
                <div class="py-4 border-bottom">
                    <h4 class="text-muted">New Product</h4>
                </div>
                <form action="{{ route('update.product') }}" method="post" class="py-3 pb-5" enctype="multipart/form-data">
                
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Model No</label>
                        <input type="text" value="{{ $product->modelno }}" name="modelno" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Name</label>
                        <input type="text" value="{{ $product->name }}" name="name" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Price</label>
                        <input type="text" value="{{ $product->price }}" name="price" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Quantity</label>
                        <input type="text" value="{{ $product->qtn }}" name="qtn" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Color</label>
                        <input type="text" value="{{ $product->color }}" name="color" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Material</label>
                        <input type="text" value="{{ $product->material }}" name="material" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @if ( $product->gender == 'male') checked="true" @endif name="gender" type="checkbox" id="inlineCheckbox1" value="male">
                                <label class="form-check-label" for="inlineCheckbox1">male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @if ( $product->gender == 'female') checked="true" @endif  name="gender" type="checkbox" id="inlineCheckbox2" value="female">
                                <label class="form-check-label" for="inlineCheckbox2">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-3">Desc</label>
                        <textarea class="form-control col-5" value="{{ $product->desc }}" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-0">save</button>
                    </div>

                </form>
            <!--  -->
        </div>
       </div>
    </div>
<main>
@endsection

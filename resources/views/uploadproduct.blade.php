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
                <div class="py-4 border-bottom">
                    <h4 class="text-muted">New Product</h4>
                </div>
                <form action="{{ route('upload.product') }}" method="post" class="py-3 pb-5" enctype="multipart/form-data">
                
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Model No</label>
                        <input type="number" name="modelno" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Price</label>
                        <input type="number" name="price" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="qtn" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Color</label>
                        <input type="text" name="color" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Material</label>
                        <input type="text" name="material" class="col-5 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">category</label>
                        <select class="custom-select col-5" name="category">
                            <option selected>Choose...</option>
                            @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="checkbox" id="inlineCheckbox1" value="male">
                                <label class="form-check-label" for="inlineCheckbox1">male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="checkbox" id="inlineCheckbox2" value="female">
                                <label class="form-check-label" for="inlineCheckbox2">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="exampleInputEmail1">Front Image</label>
                        <div class="input-group col-5 p-0">
                            <div class="custom-file">
                                <input type="file" name="img-front" class="custom-file-input" id="validatedInputGroupCustomFile" required>
                                <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
                            </div>
                        </div>
                    </div>

                  

                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-3">Desc</label>
                        <textarea class="form-control col-5" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-0">upload</button>
                    </div>

                </form>
            <!--  -->
        </div>
       </div>
    </div>
<main>
@endsection

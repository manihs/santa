@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid">    
       <div class="row" style="min-height: 90vh!important;">
        <div class="col-3 bg-dark">
            <div id="list-example" class="list-group my-3">
                <a class="list-group-item list-group-item-action" href="{{ route('home') }}">Product</a>
                <a class="list-group-item list-group-item-action" href="{{ route('order') }}">Order</a>
                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">   {{ __('Logout') }} </a>
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div class="text-muted">
                    Product
                </div>
                <a href="{{ route('create.product') }}" class="btn btn-primary rounded-0">Add Product</a>
            </div>
            <div class="">

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">model No</th>
                    <th scope="col">image</th>
                    <th scope="col">name</th>
                    <th scope="col">qtn</th>
                    <th scope="col">price</th>
                    <th scope="col">view</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                    <tr class="">
                        <th scope="row"> {{ $product->modelno }} </th>
                        <th scope="row"> <img src="{{  asset($product->imgfront) }}" alt="" width="140px"> </th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->qtn }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{ route('show.product',['id' => $product->id ]) }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,28.66667c-51.13157,0 -84.15967,52.81077 -84.75703,53.77239c-0.80406,1.01283 -1.2421,2.26775 -1.24297,3.56094c0.00102,1.1094 0.32388,2.19467 0.92943,3.12422c0.00743,0.01122 0.01489,0.02242 0.0224,0.03359c0.09858,0.20342 27.82281,54.17552 85.04818,54.17552c56.98258,0 84.666,-53.44188 85.00339,-54.09714c0.02282,-0.03707 0.04522,-0.0744 0.06719,-0.11198c0.60555,-0.92955 0.92841,-2.01482 0.92942,-3.12422c-0.0002,-1.28802 -0.43411,-2.53845 -1.23177,-3.54974c-0.00373,-0.00374 -0.00746,-0.00747 -0.0112,-0.0112c-0.59736,-0.96163 -33.62546,-53.77239 -84.75703,-53.77239zM86,45.86667c22.16507,0 40.13333,17.96827 40.13333,40.13333c0,22.16507 -17.96827,40.13333 -40.13333,40.13333c-22.16507,0 -40.13333,-17.96827 -40.13333,-40.13333c0,-22.16507 17.96827,-40.13333 40.13333,-40.13333zM86,68.8c-9.4993,0 -17.2,7.7007 -17.2,17.2c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c0,-9.4993 -7.7007,-17.2 -17.2,-17.2z"></path></g></g></svg></a></td>
                        <td><a href="{{ route('edit.product',['id' => $product->id ]) }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M132.92788,1.65385c-3.92788,-0.02584 -7.77824,1.36959 -10.75,4.34135l-6.61538,6.82212l43.62019,43.82692l6.61538,-6.82212c5.96935,-5.96935 6.02103,-15.65985 0,-21.70673l-21.91346,-21.91346c-3.02344,-3.02344 -7.02885,-4.52224 -10.95673,-4.54808zM108.12019,18.8125l-10.33654,9.92308l45.48077,45.48077l10.54327,-9.71635zM91.16827,35.97115l-71.52885,70.90865c-1.65385,0.85276 -2.84254,2.35156 -3.30769,4.13462l-15.29808,51.88942c-0.69772,2.27404 -0.07753,4.78065 1.60217,6.46034c1.67969,1.67969 4.18629,2.29988 6.46033,1.60216l51.88942,-15.29808c2.40324,-0.36178 4.39303,-2.04147 5.16827,-4.34135l70.49519,-69.875l-9.71635,-9.71635l-72.35577,72.5625l-29.14904,8.47596l-6.20192,-6.20192l8.88942,-30.38942l71.73558,-71.52885zM106.87981,51.88942l-72.5625,72.76923l10.54327,2.27404l1.44712,9.71635l72.76923,-72.5625z"></path></g></g></svg></a></td>
                        <td><a href="{{ route('destroy.product',['id' => $product->id ]) }}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M71.66667,14.33333l-7.16667,7.16667h-35.83333v14.33333h7.16667v107.5c0,7.83362 6.49972,14.33333 14.33333,14.33333h71.66667c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-107.5h7.16667v-14.33333h-14.33333h-21.5l-7.16667,-7.16667zM50.16667,35.83333h71.66667v107.5h-71.66667zM69.56706,59.43294l-10.13411,10.13411l16.43295,16.43294l-16.43295,16.43294l10.13411,10.13411l16.43294,-16.43294l16.43294,16.43294l10.13411,-10.13411l-16.43294,-16.43294l16.43294,-16.43294l-10.13411,-10.13411l-16.43294,16.43295z"></path></g></g></svg></a></td>
                    </tr>
                    
                    @endforeach
                    
                <tbody>
            </table>
                            
            </div>
        </div>
       </div>
    </div>
<main>
@endsection

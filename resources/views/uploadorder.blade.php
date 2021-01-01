@extends('layouts.app')
@section('css')
<style>
   .mrow {
   display: -ms-flexbox; /* IE10 */
   display: flex;
   -ms-flex-wrap: wrap; /* IE10 */
   flex-wrap: wrap;
   margin: 0 -16px;
   }
   .mcol-25 {
   -ms-flex: 25%; /* IE10 */
   flex: 25%;
   }
   .mcol-50 {
   -ms-flex: 50%; /* IE10 */
   flex: 50%;
   }
   .mcol-75 {
   -ms-flex: 75%; /* IE10 */
   flex: 75%;
   }
   .mcol-25,
   .mcol-50,
   .mcol-75 {
   padding: 0 16px;
   }
   .mcontainer {
   background-color: #f2f2f2;
   padding: 5px 20px 15px 20px;
   border: 1px solid lightgrey;
   border-radius: 3px;
   }
   input[type=text] {
   width: 100%;
   margin-bottom: 20px;
   padding: 12px;
   border: 1px solid #ccc;
   border-radius: 3px;
   }
   label {
   margin-bottom: 10px;
   display: block;
   }
   .micon-container {
   margin-bottom: 20px;
   padding: 7px 0;
   font-size: 24px;
   }
   .mbtn {
   background-color: #4CAF50;
   color: white;
   padding: 12px;
   margin: 10px 0;
   border: none;
   width: 100%;
   border-radius: 3px;
   cursor: pointer;
   font-size: 17px;
   }
   .mbtn:hover {
   background-color: #45a049;
   }
   a {
   color: #2196F3;
   }
   hr {
   border: 1px solid lightgrey;
   }
   span.mprice {
   float: right;
   color: grey;
   }
   /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
   @media (max-width: 800px) {
   .row {
   flex-direction: column-reverse;
   }
   .col-25 {
   margin-bottom: 20px;
   }
   }
</style>
@endsection
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
      <!--  -->
     
      <!--  -->
      <div class="mrow py-3">
         <div class="mcol-75 py-3">
            <div class="mcontainer">
               <div class="jumbotron">
                  <h1 class="display-4">{{ $product->name }}</h1>
                  <hr class="my-4">
                  <p>
                     Material : {{ $product->material }}, Color : {{ $product->color }}
                  </p>
                  <div class="btn btn-primary btn-lg" href="#" role="button">Rs {{ $product->price }}</div>
               </div>
               <form action="{{ route('store.order') }}" method="post" class="py-3">
               @csrf
                  <input type="hidden" name=id value="{{ $product->ppid }}">
                  <div class="mrow">
                     <div class="mcol-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Name Surname" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="mail@example.com" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="Enter Address" required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="City" required>
                        <div class="mrow">
                           <div class="mcol-50">
                              <label for="state">State</label>
                              <input type="text" id="state" name="state" placeholder="State" required>
                           </div>
                           <div class="mcol-50">
                              <label for="zip">Zip</label>
                              <input type="text" id="zip" name="zip" placeholder="Zip" required>
                           </div>
                        </div>
                        <label for="city"> Quantity</label>
                        <input type="text" id="city" name="qtn" placeholder="Enter quantity" value="12" required>
                     </div>
                     <div class="mcol-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="micon-container">
                           <i class="fa fa-cc-visa" style="color:navy;"></i>
                           <i class="fa fa-cc-amex" style="color:blue;"></i>
                           <i class="fa fa-cc-mastercard" style="color:red;"></i>
                           <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required> 
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
                        <div class="mrow">
                           <div class="mcol-50">
                              <label for="expyear">Exp Year</label>
                              <input type="text" id="expyear" name="expyear" placeholder="2018" required>
                           </div>
                           <div class="mcol-50">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="352" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <label>
                  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                  </label>
                  <input type="submit" value="Continue to checkout" class="mbtn">
               </form>
            </div>
         </div>
         <div class="mcol-25">
         </div>
         <!--  -->
      </div>
   </div>
</div>
<main>
@endsection
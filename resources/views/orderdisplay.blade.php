@extends('layouts.app')

@section('content')

<div class="card my-5 mx-auto col-7">
<table class="table">
               
               <tbody>
                   <tr>
                       <td>Product No</td>
                       <td> {{ $order->postId }} </td>
                   </tr>
                   <tr>
                       <td>Name</td>
                       <td>{{ $order->firstname }}</td>
                   </tr>
                   <tr>
                       <td>Email</td>
                       <td>{{ $order->email }}</td>
                   </tr>
                   <tr>
                       <td>Address</td>
                       <td>  {{ $order->address }}</td>
                   </tr>
                   <tr>
                       <td>Contact</td>
                       <td>{{ $order->contact }}</td>
                   </tr>
                   <tr>
                       <td>City</td>
                       <td>{{ $order->city }}</td>
                   </tr>
               
                   <tr>
                       <td>State</td>
                       <td>{{ $order->state }}</td>
                   </tr>
                   <tr>
                       <td>Zip</td>
                       <td> {{ $order->zip }}</td>
                   </tr>
                   <tr>
                       <td>quantity</td>
                       <td>{{ $order->qtn }}</td>
                   </tr>
                
                   <tr>
                       <td>Total</td>
                       <td>{{ $order->total }}</td>
                   </tr>

                   
                   
               </tbody>
           </table>
</div>

@endsection

 




  

  

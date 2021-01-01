<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\DB,
    Support\Facades\Auth,
    Support\Facades\Redirect,
    Support\Str,
};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')->leftjoin('products','products.id', '=', 'orders.postid')->get();

        return view('order', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = DB::table('products')

        ->select('*', 'products.id as ppid')
        
        ->leftJoin('stocks', 'stocks.productId', '=', 'products.id')

        ->leftJoin('product_categories', 'product_categories.productId', '=', 'products.id')

        ->leftJoin('categories', 'categories.id', '=', 'product_categories.categoryId')

        ->where('products.id','=', $id)

        ->first();

        return view('uploadorder', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->input('id');
   
        $product = DB::table('products')

        ->leftJoin('stocks', 'stocks.productId', '=', 'products.id')

        ->leftJoin('product_categories', 'product_categories.productId', '=', 'products.id')

        ->leftJoin('categories', 'categories.id', '=', 'product_categories.categoryId')

        ->where('products.id','=', $id)

        ->first();

        DB::table('orders')->insert(
            [
            'postId' => $request->input('id'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'contact' => '23434234',
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),     
            'cardname' => $request->input('cardname'),     
            'cardnumber' => $request->input('cardnumber'),     
            'expmonth' => $request->input('expmonth'),     
            'expyear' => $request->input('expyear'),     
            'cvv' => $request->input('cvv'),     
            'sameadr' => $request->input('sameadr'),     
            'qtn' => $request->input('qtn'),     
            'total' => $product->price * $request->input('qtn')
            ]
        );

        DB::table('stocks')

        ->where('productId','=', $id)

        ->update(['qtn'=> $product->qtn - $request->input('qtn') ]);
       
        $data = $request->all();
    
        return view('thankyou', compact('product','data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        // dd($order);

        return view('orderdisplay', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

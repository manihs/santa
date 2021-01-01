<?php

namespace App\Http\Controllers;

use Illuminate\{

    Http\Request,

    Support\Facades\DB,

    Support\Facades\Auth,

    Support\Facades\Redirect,

    Support\Str,

};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')   

        ->leftJoin('stocks', 'stocks.productId', '=', 'products.id')

        ->where('products.userId','=', Auth::id())->get();
     
        return view('home',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        
        return view('uploadproduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image1 = $request->file('img-front');

        $destinationPath1 = 'users\u-'.Auth::id().'\upload\d-'.date("Y-m-d");

        $path1 = $destinationPath1.'\img-'.auth::id().time().'.'.$image1->getClientOriginalExtension();

        $image1->move($destinationPath1,'img-'.auth::id().time().'.'.$image1->getClientOriginalExtension());



        $id = DB::table('products')->insertGetId(
                [
    
                    'userId' => Auth::id(), 
    
                    'modelno' => $request->input('modelno'), 
    
                    'name' => $request->input('name'), 
    
                    'gender' => $request->input('gender'), 
    
                    'price' => $request->input('price'), 
    
                    'color' => $request->input('color'), 
    
                    'material' => $request->input('material'), 
    
                    'imgfront' => $path1, 
    
                    'imgback' => null, 
    
                    'desc' => $request->input('desc'), 
    
                    ]    
    
            );

            DB::table('stocks')->insert([
                [
    
                    'productId' => $id, 
    
                    'qtn' => $request->input('qtn'), 
    
                    'required' => 'yes', 
    
                    'note' => null, 
    
                ],
    
            ]);

            DB::table('product_categories')->insert([
                [

                    'productId' => $id, 

                    'categoryId' => $request->input('category')

                ],
            ]);       

        return redirect()->back()->with('status', 'Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
    
        ->leftJoin('stocks', 'stocks.productId', '=', 'products.id')
    
        ->leftJoin('product_categories', 'product_categories.productId', '=', 'products.id')
    
        ->leftJoin('categories', 'categories.id', '=', 'product_categories.categoryId')
    
        ->where('products.userId','=', Auth::id())
    
        ->where('products.id','=', $id)
    
        ->first();

        return view('product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
    
        ->leftJoin('stocks', 'stocks.productId', '=', 'products.id')
    
        ->where('products.userId','=', Auth::id())
    
        ->where('products.id','=', $id)
    
        ->first();

        return view('editproduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
        $id = $request->input('id');

        DB::table('products')
    
        ->where('products.id', '=', $id)
    
        ->where('products.userId', '=', Auth::id())
    
        ->update(
    
            array(
    
                'modelno' => $request->input('modelno'), 
    
                'name' => $request->input('name'), 
    
                'gender' => $request->input('gender'), 
    
                'price' => $request->input('price'), 
     
                'color' => $request->input('color'), 
     
                'material' => $request->input('material'), 
     
                'desc' => $request->input('desc'), 
     
                )
     
            );


        DB::table('stocks')
     
        ->where('productId', '=', $id)
     
        ->update(
     
            array(
                
                'qtn' => $request->input('qtn'), 
     
                'required' => 'yes', 
     
                'note' => null
     
                )
     
            );

        return redirect()->back()->with('status', 'Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('products')

        ->where('products.userId', '=', Auth::id())

        ->where('products.id', '=', $id)

        ->delete();

        DB::table('stocks')->where('productId', '=', $id)

        ->delete();

        return redirect()->back()->with('status', 'Successfully Deleted');
 
    }

}

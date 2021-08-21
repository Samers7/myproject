<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $image = 'no image';

        if ($request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path('/product_images/'); // upload path
            // Upload Orginal Image
            $productImagePath = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $productImagePath);
            $image = '/product_images/'.$productImagePath;
        }

      //dd($image);

       $product = new Product;
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->price = $request->input('price');
       $product->quantity = $request->input('quantity');
       $product->image = $image;
       $product->save();

       return redirect('/products');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table('products')->where('id',$id)->get();
        return view('show')->with(['products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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


        if ($request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path('/product_images/'); // upload path
            // Upload Orginal Image
            $productImagePath = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $productImagePath);
            $image = '/product_images/'.$productImagePath;


            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->image = $image;
            $product->save();

      }else{

      //dd($image);
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->quantity = $request->input('quantity');
      $product->save();
      }

       return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    return redirect('/products');
    }
}

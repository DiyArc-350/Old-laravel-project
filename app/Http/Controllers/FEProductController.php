<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\ProductInfoModel;
use App\Models\ProductImageModel;

class FEProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $product = ProductModel::where('product_code', '=', $request->product_code)->first();
        $cart = CartModel::where('orders_code','=',null)->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('product_code', '=', $request->product_code)->where('cart_deletestatus', '=', 0)->first();

        // dd($cart);

        if(!empty($cart)){
            $subtotal = $request->cart_quantity * $product['product_price_purchase'];

            CartModel::where('cart_id', '=', $cart->cart_id)->update([
                'customer_number' => auth()->guard('customer')->user()->customer_number,
                'product_code' => $request->product_code,
                'cart_quantity' => $cart->cart_quantity + $request->cart_quantity,
                'cart_price_item' => $product['product_price_purchase'],
                'cart_price_subtotal' => $cart->cart_price_subtotal + $subtotal,
                'cart_note' => $request->cart_note,
                'cart_updatedate' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->back()->with('msg', 'Product added to cart');
            

        }
        
        $subtotal = $request->cart_quantity * $product['product_price_purchase'];
        $custnum = auth()->guard('customer')->user()->customer_number;

        CartModel::insert([
            'cart_code' => rand(100,999).date('Hisymd'),
            'customer_number' => $custnum,
            'product_code' => $request->product_code,
            'cart_quantity' => $request->cart_quantity,
            'cart_price_item' => $product['product_price_purchase'],
            'cart_price_subtotal' => $subtotal,
            'cart_note' => $request->cart_note,
            'cart_insertdate' => date('Y-m-d H:i:s'),
            'cart_insertby' => auth()->guard('customer')->user()->customer_id,
            'cart_deletestatus' => 0,
        ]);

        return redirect()->back()->with('msg', 'Product added to cart');
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
        $product = ProductModel::select('*')->where('product_code', '=', $id)->where('product_deletestatus', '=', 0)->first();
        $image = ProductImageModel::select('*')->where('product_code', '=', $id)->where('product_image_deletestatus', '=', 0)->get();
        $info = ProductInfoModel::select('*')->where('product_code', '=', $id)->where('product_info_deletestatus', '=', 0)->get();
        $productlist = ProductModel::leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
        ->where('product_deletestatus', '=', 0)
        ->get();
        // dd($product);
        return view('frontend.product.product', [
            'product' => $product,
            'productlist' => $productlist,
            'image' => $image,
            'info' => $info,
        ]);
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

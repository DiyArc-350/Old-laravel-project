<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use App\Models\CustomerAddressModel;

class FECheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preCheckout()
    {
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
        ->where('orders_code', '=', null)
        ->where('cart_deletestatus', '=', 0)
        ->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)
        ->get();

        $address = CustomerAddressModel::where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('customer_address_deletestatus', '=', 0)->orderBy('customer_address_id', 'ASC')->get();
        // $default_address = CustomerAddressModel::where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('customer_address_deletestatus', '=', 0)->orderBy('customer_address_id', 'ASC')->first();
        // $default = $default_address['customer_address_id'];
        $total = CartModel::select('cart_price_subtotal')->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('cart_deletestatus', '=', 0)->where('orders_code', '=', null)->sum('cart_price_subtotal');
        // dd($total);

        return view('frontend.account.preCheckOut', [
            'cart' => $cart,
            'total' => $total,
            'address' => $address,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders_code = substr( auth()->guard('customer')->user()->customer_number,4,4).date('mdHi');
        foreach($request->cart_id as $key=>$update) {
            
            CartModel::where('cart_id', '=', $request->cart_id[$key])->update([
                'orders_code' => $orders_code,
                'cart_updatedate' => date('Y-m-d H:i:s'),
            ]);
        }
        
        $totalItem = CartModel::select('cart_price_subtotal')->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('cart_deletestatus', '=', 0)->where('orders_code', '=', $orders_code)->sum('cart_quantity');

        OrdersModel::insert([
            'orders_code' => $orders_code,
            'customer_number' =>  auth()->guard('customer')->user()->customer_number,
            'customer_address_code' => $request->customer_address_code,
            'orders_datetime' => date('Y-m-d H:i:s'),
            'orders_invoice' => 'INV/'.$orders_code,
            'orders_total_item' => $totalItem,
            'orders_total_price' => $request->orders_total_price,
            'orders_shipping_price' => '8000',
            'orders_status' => 'waiting',
            'orders_payment_status' =>'unpaid',
            'orders_insertdate' =>date('Y-m-d H:i:s'),
            'orders_insertby' => auth()->guard('customer')->user()->customer_id,
            'orders_deletestatus' => 0,
        ]);


        return redirect(route('fe.editprofile'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInvoice($code)
    {
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
        ->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)
        ->where('orders_code', '=', $code)
        ->get();

        $orders = OrdersModel::where('orders_code', '=', $code)->first();
        $address = CustomerAddressModel::where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('customer_address_code', '=', $orders['customer_address_code'])->first();
        $total = CartModel::select('cart_price_subtotal')->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('cart_deletestatus', '=', 0)->where('orders_code', '=', $code)->sum('cart_price_subtotal');


        return view('frontend.account.checkoutInvoice', [
            'cart' => $cart,
            'address' => $address,
            'orders' => $orders,
            'total' => $total,
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

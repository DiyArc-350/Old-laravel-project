<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\CartModel;
use App\Models\OrdersModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\CustomerAddressModel;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = OrdersModel::select('*')->get();
        $orders = OrdersModel::leftjoin('customer', 'customer.customer_number', '=', 'orders.customer_number')
        ->get();
        return view('backend.orders.orders_list', [
            'title' => 'Orders List',
            'category' => 'Trasnsaction',
            'rows' => $orders
        ]);
    }

    public function customer_list()
    {
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        // dd($customer);

        return view('backend.orders.select_customer',[
            'title' => 'Select Customer',
            'customer' => $customer,
        ]);
    }


    public function cart_list(Request $request)
    {
        // $cart = CartModel::select('*')->get();
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
                ->leftjoin('customer', 'customer.customer_number', '=', 'cart.customer_number')
                ->where('cart_deletestatus', '=', 0)
                ->where('cart.customer_number', '=', $request->customer_number)
                ->get();

        $address = CustomerAddressModel::select('*')->where('customer_number', '=', $request->customer_number)->get();

        // dd($cart)

        return view('backend.orders.checkout_list', [
            'title' => 'Checkout List',
            'category' => 'Trasnsaction',
            'rows' => $cart,
            'address' => $address,
            'customer_number' => $request->customer_number
        ]);
    }
    public function detail($id)
    {
        $orders = OrdersModel::where('orders_code', '=', $id)
        ->leftjoin('customer', 'customer.customer_number', '=', 'orders.customer_number')
        ->first();
        $total = CartModel::select('cart_price_subtotal')->where('cart_deletestatus', '=', 0)->where('orders_code', '=', $id)->sum('cart_price_subtotal');
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
        ->where('orders_code', '=', $id)
        ->get();

        return view('backend.orders.orders_detail', [
            'title' => 'Orders Detail',
            'category' => 'Trasnsaction',
            'cart' => $cart,
            'total' => $total,
            'orders' => $orders

        ]);
    }
    public function detailupdate(Request $request, $id)
    {
        OrdersModel::where('orders_code', '=', $id)->update([
            'orders_payment_status' => $request->orders_payment_status,
            'orders_status' => $request->orders_status,
            'orders_updatedate' => date('Y-m-d H:i:s'),
            'orders_updateby' => auth()->guard('employee')->user()->employee_id,
        ]);

        return redirect()->back();
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
        dd($request->cart_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

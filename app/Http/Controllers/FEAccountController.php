<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;

class FEAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = EmployeeModel::select('*')->get();

        $data = [
        'title' => 'Profile Customer',
        // 'rows' => $employee
        ];

        return view('frontend.account.profile', $data);
    }

    public function cart()
    {
        // $employee = EmployeeModel::select('*')->get();

        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
        ->where('orders_code', '=', null)
        ->where('cart_deletestatus', '=', 0)
        ->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)
        ->get();
        $total = CartModel::select('cart_price_subtotal')->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('orders_code', '=', null)->where('cart_deletestatus', '=', 0)->sum('cart_price_subtotal');
        // dd($total);

        return view('frontend.account.cart', [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function updateCart(Request $request)
    {
        // dd($request->all());
        foreach($request->cart_id as $key=>$update) {
            // $product = ProductModel::select('*')->where('product_code', '=', $request->product_code)->first();
            $subtotal = $request->cart_quantity[$key] * $request->cart_price_item[$key];

            CartModel::where('cart_id', '=', $request->cart_id[$key])->update([
                'cart_quantity' => $request->cart_quantity[$key],
                'cart_price_subtotal' => $subtotal,
                // 'cart_note' => $request->cart_note,
                'cart_updatedate' => date('Y-m-d H:i:s'),
        ]);
        }

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder()
    {
        // cust_num
        // make invoice
        // total quantity
        // total price
        // payment => penddig
        // status => waitting
        // insert date
        // insert by
        // delete status


        // update order code for cart items

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
        CustomerModel::where('customer_number', '=', $id)->update([
            'customer_fullname' => $request->customer_fullname,
            'customer_email' => $request->customer_email,
            'customer_handphone1' => $request->customer_handphone1,
            'customer_updatedate' => date('Y-m-d H:i:s'),
            'customer_updateby' => auth()->guard('customer')->user()->customer_id,
        ]);

        return redirect()->to(route('fe.editprofile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem($id)
    {
        CartModel::where('cart_id', $id)->update([
            'cart_deletestatus' => '1',
            'cart_deleteby' => auth()->guard('customer')->user()->customer_id,
            'cart_deletedate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back();
    }
}
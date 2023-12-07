<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Http\RedirectResponse;

use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cart = CartModel::select('*')->get();
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
                ->leftjoin('customer', 'customer.customer_number', '=', 'cart.customer_number')
                ->where('cart_deletestatus', '=', 0)
                ->get();

        return view('backend.cart.cart_list', [
            'title' => 'Cart List',
            'category' => 'Trasnsaction',
            'rows' => $cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = ProductModel::select('*')->where('product_deletestatus', '=', 0)->where('product_stock', '>', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        // dd($customer);

        return view('backend.cart.create_cart',[
            'title' => 'Create Cart',
            'customer' => $customer,
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = ProductModel::select('*')->where('product_code', '=', $request->product_code)->first();
        $cart = CartModel::where('orders_code','=',null)->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)->where('product_code', '=', $request->product_code)->where('cart_deletestatus', '=', 0)->first();

        dd($cart);

        if(!empty($cart)){
            $subtotal = $request->cart_quantity * $product['product_price_purchase'];

            CartModel::where('cart_id', '=', $cart->cart_id)->update([
                'customer_number' => auth()->guard('customer')->user()->customer_number,
                'product_code' => $request->product_code,
                'cart_quantity' => $request->cart_quantity,
                'cart_price_item' => $product['product_price_purchase'],
                'cart_price_subtotal' => $subtotal,
                'cart_note' => $request->cart_note,
                'cart_updatedate' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to(route('cart.index'));

        }
        
        $subtotal = $request->cart_quantity * $product['product_price_purchase'];

        CartModel::insert([
            'cart_code' => rand(100,999).date('Hisymd'),
            'customer_number' => auth()->guard('customer')->user()->customer_number,
            'product_code' => $request->product_code,
            'cart_quantity' => $request->cart_quantity,
            'cart_price_item' => $product['product_price_purchase'],
            'cart_price_subtotal' => $subtotal,
            'cart_note' => $request->cart_note,
            'cart_insertdate' => date('Y-m-d H:i:s'),
            'cart_deletestatus' => 0,
        ]);
            
        return redirect()->to(route('cart.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::select('*')->where('product_deletestatus', '=', 0)->where('product_stock', '>', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        $cart = CartModel::select('*')->where('cart_id', '=', $id)->first();
        
        // dd($customer);

        return view('backend.cart.cart_detail',[
            'title' => 'Update Cart',
            'customer' => $customer,
            'product' => $product,
            'row' => $cart
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
        $product = ProductModel::select('*')->where('product_code', '=', $request->product_code)->first();
        $subtotal = $request->cart_quantity * $product['product_price_purchase'];

        CartModel::where('cart_id', '=', $id)->update([
            'customer_number' => $request->customer_number,
            'product_code' => $request->product_code,
            'cart_quantity' => $request->cart_quantity,
            'cart_price_item' => $product['product_price_purchase'],
            'cart_price_subtotal' => $subtotal,
            'cart_note' => $request->cart_note,
            'cart_updatedate' => date('Y-m-d H:i:s'),
        ]);
            
        return redirect()->to(route('cart.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        CartModel::where('cart_id', $id)->update([
            'cart_deletestatus' => '1',
            // 'company_deleteby' => '100',
            'cart_deletedate' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->back();
    }


    public function test(Request $request, $id)
    {
        if(empty($request->all())){
            return redirect()->back();
        }

        dd($request->all());
    }
}

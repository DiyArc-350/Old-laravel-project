<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDiscountModel;

class ProductDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = ProductDiscountModel::select('*')->where('product_discount_deletestatus', '=', 0)->get();
        return view('backend.product_discount.product_discount_list', [
            'title' => 'Produk Discount List',
            'rows' => $discount
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product_discount.create_product_discount',[
            'title' => 'Create Product Discount'
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
        ProductDiscountModel::insert([
            'product_discount_code' => $request->product_discount_code,
            'product_discount_name' => $request->product_discount_name,
            'product_discount_info' => $request->product_discount_info,
            'product_discount_percent' => $request->product_discount_percent,
            'product_discount_active' => $request->product_discount_active,
            'product_discount_deletestatus' => '0',
            'product_discount_insertby' => '100',
            'product_discount_insertdate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('product.discount.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = ProductDiscountModel::select('*')->where('product_discount_id', '=', $id)->first();
        // dd($discount);
        return view('backend.product_discount.product_discount_detail',[
            'title' => 'Detail product discount',
            'row' => $discount
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
        ProductDiscountModel::where('product_discount_id', '=', $id)->update([
            'product_discount_name' => $request->product_discount_name,
            'product_discount_info' => $request->product_discount_info,
            'product_discount_percent' => $request->product_discount_percent,
            'product_discount_active' => $request->product_discount_active,
            'product_discount_updatedate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('product.discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        productDiscountModel::where('product_discount_id', $id)->update([
            // 'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
            'product_discount_deletedate' => date('Y-m-d H:i:s'),
            // 'delete_by' => Auth()->user()->employee_id,
            'product_discount_deletestatus' => 1
        ]);

        return redirect()->to(route('product.discount.index'));
    }
}


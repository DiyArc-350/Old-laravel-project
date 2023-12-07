<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountModel;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = DiscountModel::select('*')->where('discount_deletestatus', '=', 0)->get();
        return view('backend.discount.discount_list', [
            'title' => 'discount List',
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
        return view('backend.discount.create_discount',[
            'title' => 'Create Discount'
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
        DiscountModel::insert([
            'discount_code' => "D-".rand(100,999).substr(time(),-3),
            'discount_serial_number' => date('y').' '.substr(time(), -4),
            'discount_startdate' => $request->discount_startdate,
            'discount_enddate' => $request->discount_enddate,
            'discount_name' => $request->discount_name,
            'discount_info' => $request->discount_info,
            'discount_percent' => $request->discount_percent,
            'discount_active' => $request->discount_active,
            'discount_deletestatus' => '0',
            'discount_insertby' => '100',
            'discount_insertdate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('discount.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = DiscountModel::select('*')->where('discount_id', '=', $id)->first();
        // dd($discount);
        return view('backend.discount.discount_detail',[
            'title' => 'Detail discount',
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
        DiscountModel::where('discount_id', '=', $id)->update([
            'discount_startdate' => $request->discount_startdate,
            'discount_enddate' => $request->discount_enddate,
            'discount_name' => $request->discount_name,
            'discount_info' => $request->discount_info,
            'discount_percent' => $request->discount_percent,
            'discount_active' => $request->discount_active,
            'discount_updatedate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DiscountModel::where('discount_id', $id)->update([
            // 'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
            'discount_deletedate' => date('Y-m-d H:i:s'),
            // 'delete_by' => Auth()->user()->employee_id,
            'discount_deletestatus' => 1
        ]);

        return redirect()->to(route('discount.index'));
    }
}

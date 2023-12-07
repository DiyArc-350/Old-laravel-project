<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAddressModel;

class FEAccountAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('frontend.account.createAddress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_address_code = "CA-".rand(100,999).date('y').substr(time(),-2);
        CustomerAddressModel::insert([
            'customer_number' => auth()->guard('customer')->user()->customer_number,
            'customer_address_code' => $customer_address_code,
            'customer_address_type' => $request->customer_address_type,
            'customer_address_name' => $request->customer_address_name,
            'customer_address_phone' => $request->customer_address_phone,           
            'customer_address_address' => $request->customer_address_address,
            'customer_address_city' => $request->customer_address_city,
            'customer_address_province' => $request->customer_address_province,
            'customer_address_postcode' => $request->customer_address_postcode,
            'customer_address_insertdate' => date('Y-m-d H:i:s'),
            'customer_address_insertby' => auth()->guard('customer')->user()->customer_id,
            'customer_address_deletestatus' => 0,
        ]);

        return redirect()->to(route('fe.editprofile'));
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
        $address = CustomerAddressModel::select('*')->where('customer_address_id', '=', $id)->first();
            return view('frontend.account.editAddress',[
                'title' => 'Update Customer Address',
                'row' => $address
            ]);
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
        CustomerAddressModel::where('customer_address_id', '=', $id)->update([
            'customer_address_type' => $request->customer_address_type,
            'customer_address_name' => $request->customer_address_name,
            'customer_address_phone' => $request->customer_address_phone,           
            'customer_address_address' => $request->customer_address_address,
            'customer_address_city' => $request->customer_address_city,
            'customer_address_province' => $request->customer_address_province,
            'customer_address_postcode' => $request->customer_address_postcode,
            'customer_address_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('fe.editprofile'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        CustomerAddressModel::where('customer_address_id', $id)->update([
            'customer_address_deletestatus' => '1',
            // 'customer_address_deleteby' => '100',
            'customer_address_deletedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back();
    }
}

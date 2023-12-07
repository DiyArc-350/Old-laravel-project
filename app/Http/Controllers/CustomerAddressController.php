<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddressModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $address = CustomerAddressModel::select('*')->where('customer_address_deletestatus', '=', 0)->get();
        
        $address = CustomerAddressModel::leftjoin('customer', 'customer.customer_number', '=', 'customer_address.customer_number')
        ->where('customer_address_deletestatus', '=', 0)
        ->get();
        return view('backend.customer_address.customer_address_list', [
            'title' => 'Customer address List',
            'rows' => $address
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        if(empty($request->all())){
            $customer =  CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
            return view('backend.customer_address.create_customer_address',[
                'title' => 'Create Customer Address',
                'customer' => $customer
            ]);
        }

        return view('backend.customer_address.create_customer_address',[
            'title' => 'Create Customer Address',
            'custnum' => $request->customer_number
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
        $customer_address_code = "CA-".rand(100,999).date('y').substr(time(),-2);
        CustomerAddressModel::insert([
            'customer_number' => $request->customer_number,
            'customer_address_code' => $customer_address_code,
            'customer_address_type' => $request->customer_address_type,
            'customer_address_name' => $request->customer_address_name,
            'customer_address_phone' => $request->customer_address_phone,           
            'customer_address_address' => $request->customer_address_address,
            'customer_address_city' => $request->customer_address_city,
            'customer_address_province' => $request->customer_address_province,
            'customer_address_postcode' => $request->customer_address_postcode,
            'customer_address_insertdate' => date('Y-m-d H:i:s'),
            'customer_address_deletestatus' => 0,
        ]);

        return redirect()->to(route('customer.address.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer =  CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        $address = CustomerAddressModel::select('*')->where('customer_address_id', '=', $id)->first();
            return view('backend.customer_address.customer_address_detail',[
                'title' => 'Update Customer Address',
                'customer' => $customer,
                'row' => $address
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
        CustomerAddressModel::where('customer_address_id', '=', $id)->update([
            'customer_number' => $request->customer_number,
            'customer_address_type' => $request->customer_address_type,
            'customer_address_name' => $request->customer_address_name,
            'customer_address_phone' => $request->customer_address_phone,           
            'customer_address_address' => $request->customer_address_address,
            'customer_address_city' => $request->customer_address_city,
            'customer_address_province' => $request->customer_address_province,
            'customer_address_postcode' => $request->customer_address_postcode,
            'customer_address_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('customer.show', $request->customer_number));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        CustomerAddressModel::where('customer_address_id', $id)->update([
            'customer_address_deletestatus' => '1',
            // 'customer_address_deleteby' => '100',
            'customer_address_deletedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back();
    }
}

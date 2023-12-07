<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\CustomerAddressModel;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // {{ auth()->guard('employee')->user()->employee_name }}

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        return view('backend.customer.customer_list',[
            'title' => 'Customer List',
            'rows' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = RoleModel::select('*')->where('role_deletestatus', '=', 0)->get();

        return view('backend.customer.create_customer',[
            'title' => 'Create Customer',
            'role' => $role
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
        $customer_number = "C-".rand(100,999).substr(time(),-3);
        CustomerModel::insert([
            'role_code' => $request->role_code,
            'customer_number' => $customer_number,
            'customer_fullname' => $request->customer_name,
            'customer_username' => $request->customer_username,
            'customer_pin' => $request->customer_pin,
            'customer_gender' => $request->customer_gender,
            'customer_birthday' => $request->customer_birthday,
            'customer_email' => $request->customer_email,
            'customer_handphone1' => $request->customer_handphone1,
            'customer_type' => $request->customer_type,
            'customer_passwd' => Hash::make($request->customer_passwd),
            'customer_emailverified' => '1',
            'customer_verified' => '1',
            'customer_deletestatus' => '0',
            'customer_insertby' => auth()->guard('employee')->user()->employee_id,
            'customer_insertdate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = RoleModel::select('*')->where('role_deletestatus', '=', 0)->get();
        $address = CustomerAddressModel::select('*')->where('customer_number', '=', $id)->where('customer_address_deletestatus', '=', 0)->get();
        $customer = CustomerModel::where('customer_number', '=', $id)->first();
        return view('backend.customer.customer_detail',[
            'title' => 'Detail Customer',
            'category' => 'Asset',
            'row' => $customer,
            'role' => $role,
            'address' => $address
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
        CustomerModel::where('customer_id', '=', $id)->update([
            'role_code' => $request->role_code,
            'customer_fullname' => $request->customer_name,
            'customer_username' => $request->customer_username,
            'customer_pin' => $request->customer_pin,
            'customer_gender' => $request->customer_gender,
            'customer_birthday' => $request->customer_birthday,
            'customer_email' => $request->customer_email,
            'customer_handphone1' => $request->customer_handphone1,
            'customer_type' => $request->customer_type,
            'customer_passwd' => Hash::make($request->customer_passwd),
            'customer_updatedate' => date('Y-m-d H:i:s'),
            'customer_updateby' => auth()->guard('employee')->user()->employee_id,
        ]);

        return redirect()->to(route('customer.index'));
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


    public function customer_delete($id)
    {
        CustomerModel::where('customer_id', $id)->update([
            'customer_deletestatus' => '1',
            // 'customer_deleteby' => '100',
            'customer_deletedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('customer.index'));
    }


    public function reset_password(Request $request,$id)
    {
        CustomerModel::where('id_user', $id)->update([
            'password' =>Hash::make($request->new_password),
            'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
        ]);
        return redirect()->to(route('customer.index'));
    }

    public function change_role(Request $request, $id)
    {
        CustomerModel::where('id_user', $id)->update([
            'role_code' => $request->role_code,
            'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
        ]);
        return redirect()->to(route('customer.index'));
    }
}

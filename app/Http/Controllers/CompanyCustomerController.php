<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\CompanyCustempModel;

class CompanyCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = CompanyCustempModel::leftjoin('customer', 'customer.customer_number', '=', 'company_custemp.customer_number')
        ->leftjoin('company', 'company.company_code', '=', 'company_custemp.company_code')
        ->whereNotNull('company_custemp.customer_number')->where('company_custemp_deletestatus', '=', 0)->get();
        // dd($rows);
        return view('backend.company_customer.company_customer_list',[
            'title' => 'Company Customer List',
            'rows' => $rows
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = CompanyModel::select('*')->where('company_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        // dd($customer);

        return view('backend.company_customer.create_company_customer',[
            'title' => 'Create Company Customer',
            'customer' => $customer,
            'company' => $company
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
        CompanyCustempModel::insert([
            'company_code' => $request->company_code,
            'customer_number' => $request->customer_number,
            'company_custemp_deletestatus' => 0,
            'company_custemp_insertdate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompanyModel::select('*')->where('company_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        $data = CompanyCustempModel::select('*')->where('company_custemp_id', '=', $id)->first();
        // dd($customer);

        return view('backend.company_customer.company_customer_detail',[
            'title' => 'Update Company Customer',
            'customer' => $customer,
            'company' => $company,
            'row' => $data
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
        CompanyCustempModel::where('company_custemp_id', $id)->update([
            'company_code' => $request->company_code,
            'customer_number' => $request->customer_number,
            'company_custemp_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        CompanyCustempModel::where('company_custemp_id', $id)->update([
            'company_custemp_deletestatus' => '1',
            // 'company_deleteby' => '100',
            'company_custemp_deletedate' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->to(route('company.customer.index'));
    }
}

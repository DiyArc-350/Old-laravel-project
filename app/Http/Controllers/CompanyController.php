<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\EmployeeModel;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = CompanyModel::leftjoin('employee', 'employee.employee_number', '=', 'company.employee_number')
        ->leftjoin('customer', 'customer.customer_number', '=', 'company.customer_number')
        ->where('company_deletestatus', '=', 0)->get();
        // dd($rows);
        return view('backend.company.company_list',[
            'title' => 'Company List',
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
        $employee = EmployeeModel::select('*')->where('employee_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();

        return view('backend.company.create_company',[
            'title' => 'Create Company',
            'customer' => $customer,
            'employee' => $employee
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
        CompanyModel::insert([
            'company_code' => date('ydH').rand(100,999),
            'customer_number' => $request->customer_number,
            'employee_number' => $request->employee_number,
            'company_name' => $request->company_name,
            'company_website' => $request->company_website,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_province' => $request->company_province,
            'company_postcode' => $request->company_postcode,
            'company_phone' => $request->company_phone,
            'company_handphone1' => $request->company_handphone1,
            'company_priority' => $request->company_priority,
            'company_category' => $request->company_category,
            'company_industry' => $request->company_industry,
            'company_insertdate' => date('Y-m-d H:i:s'),
            'company_deletestatus' => 0,
        ]);

        return redirect()->to(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = EmployeeModel::select('*')->where('employee_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        $company = CompanyModel::where('company_id', '=', $id)->first();

        // dd($company);
        return view('backend.company.company_detail',[
            'title' => 'Detail Company',
            'row' => $company,
            'customer' => $customer,
            'employee' => $employee
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
        CompanyModel::where('company_id', $id)->update([
            'customer_number' => $request->customer_number,
            'employee_number' => $request->employee_number,
            'company_name' => $request->company_name,
            'company_website' => $request->company_website,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_province' => $request->company_province,
            'company_postcode' => $request->company_postcode,
            'company_phone' => $request->company_phone,
            'company_handphone1' => $request->company_handphone1,
            'company_priority' => $request->company_priority,
            'company_category' => $request->company_category,
            'company_industry' => $request->company_industry,
            'company_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        CompanyModel::where('company_id', $id)->update([
            'company_deletestatus' => '1',
            // 'company_deleteby' => '100',
            'company_deletedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.index'));
    }
}

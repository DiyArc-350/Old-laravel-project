<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\EmployeeModel;
use App\Models\CompanypicModel;

class CompanypicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = CompanypicModel::leftjoin('company', 'company.company_code', '=', 'companypic.company_code')
        ->leftjoin('employee', 'employee.employee_number', '=', 'companypic.employee_number')
        ->leftjoin('customer', 'customer.customer_number', '=', 'companypic.customer_number')
        ->where('companypic_deletestatus', '=', 0)->get();

        return view('backend.companypic.companypic_list',[
            'title' => 'Company PIC List',
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
        $employee = EmployeeModel::select('*')->where('employee_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();

        return view('backend.companypic.create_companypic',[
            'title' => 'Create Companypic',
            'company' => $company,
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

        // dd($request->all());

        CompanypicModel::insert([
            'company_code' => $request->company_code,
            'customer_number' => $request->customer_number,
            'employee_number' => $request->employee_number,
            'companypic_name' => $request->companypic_name,
            'companypic_position' => $request->companypic_position,
            'companypic_departement' => $request->companypic_departement,
            'companypic_division' => $request->companypic_division,
            'companypic_email' => $request->companypic_email,
            'companypic_phone' => $request->companypic_phone,
            'companypic_handphone1' => $request->companypic_handphone1,
            'companypic_insertdate' => date('Y-m-d H:i:s'),
            'companypic_deletestatus' => 0,
            // 'companypic_handphone1'=>$request->companypic_handphone1,
            // 'companypic_handphone2'=>$request->companypic_handphone2,
        ]);

        return redirect()->to(route('companypic.index'));
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
        $employee = EmployeeModel::select('*')->where('employee_deletestatus', '=', 0)->get();
        $customer = CustomerModel::select('*')->where('customer_deletestatus', '=', 0)->get();
        $companypic = CompanypicModel::where('companypic_id', '=', $id)->first();

        return view('backend.companypic.companypic_detail',[
            'title' => 'Detail Companypic',
            'row' => $companypic,
            'company' => $company,
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
        CompanypicModel::where('companypic_id', $id)->update([
            'customer_number' => $request->customer_number,
            'employee_number' => $request->employee_number,
            'companypic_name' => $request->companypic_name,
            'companypic_position' => $request->companypic_position,
            'companypic_departement' => $request->companypic_departement,
            'companypic_division' => $request->companypic_division,
            'companypic_email' => $request->companypic_email,
            'companypic_phone' => $request->companypic_phone,
            'companypic_handphone1' => $request->companypic_handphone1,
            'companypic_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('companypic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        CompanypicModel::where('companypic_id', $id)->update([
            'companypic_deletestatus' => '1',
            // 'companypic_deleteby' => '100',
            'companypic_deletedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('companypic.index'));
    }
}

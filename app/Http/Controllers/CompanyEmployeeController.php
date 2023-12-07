<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\EmployeeModel;
use App\Models\CompanyCustempModel;

class CompanyEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = CompanyCustempModel::leftjoin('employee', 'employee.employee_number', '=', 'company_custemp.employee_number')
        ->leftjoin('company', 'company.company_code', '=', 'company_custemp.company_code')
        ->whereNotNull('company_custemp.employee_number')->where('company_custemp_deletestatus', '=', 0)->get();
        // dd($rows);
        return view('backend.company_employee.company_employee_list',[
            'title' => 'Company Employee List',
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
        // dd($customer);

        return view('backend.company_employee.create_company_employee',[
            'title' => 'Create Company employee',
            'employee' => $employee,
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
            'employee_number' => $request->employee_number,
            'company_custemp_deletestatus' => 0,
            'company_custemp_insertdate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.employee.index'));
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
        $data = CompanyCustempModel::select('*')->where('company_custemp_id', '=', $id)->first();
        // dd($employee);

        return view('backend.company_employee.company_employee_detail',[
            'title' => 'Update Company Employee',
            'employee' => $employee,
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
        CompanyCustempModel::where('company_custemp_id', $id)->update([
            'company_code' => $request->company_code,
            'employee_number' => $request->employee_number,
            'company_custemp_updatedate' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(route('company.employee.index'));
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


        return redirect()->to(route('company.employee.index'));
    }
}

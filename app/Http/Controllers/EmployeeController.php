<?php

namespace App\Http\Controllers;

use Image;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = EmployeeModel::select('*')->where('employee_deletestatus', '=', 0)->get();  

        $data = [
        'title' => 'Employee List',
        'rows' => $employee
        ];

        return view('backend.employee.employee_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = RoleModel::select('*')->where('role_deletestatus', '=', 0)->get();

        return view('backend.employee.create_employee',[
            'title' => 'Create Employee',
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
        EmployeeModel::insert([
            'employee_number' => "E-".rand(100,999).date('y').substr(time(),-3),
            'employee_division' => $request->employee_division,
            'employee_departement' => $request->employee_departement,
            'employee_position' => $request->employee_position,
            'employee_grade' => $request->employee_grade,
            'employee_name' => $request->employee_name,
            'employee_birthday' => $request->employee_birthday,
            'employee_address' => $request->employee_address,
            'employee_email' => $request->employee_email,
            'employee_passwd' => Hash::make($request->employee_passwd),
            'role_code' => $request->role_code,
            'employee_handphone1' => $request->employee_handphone1,
            'employee_handphone2' => $request->employee_handphone2,
            'employee_salary' => $request->employee_salary,
            'employee_gender' => $request->employee_gender,
            'employee_bank_name' => $request->employee_bank_name,
            'employee_bank_accountname' => $request->employee_bank_accountname,
            'employee_bank_accountnumber' => $request->employee_bank_accountnumber,
            'employee_workdate_start' => $request->employee_workdate_start,
            'employee_insertdate' => date('Y-m-d H:i:s'),
            'employee_deletestatus' => 0,
        ]);

        return redirect()->to(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = EmployeeModel::where('employee_number', '=', $id)->first();
        return view('backend.employee.employee_view',[
            'title' => 'Detail employee',
            'category' => 'Asset',
            'row' => $employee,
        ]);
    }

    public function upload($id)
    {
        $employee = EmployeeModel::where('employee_number', '=', $id)->first();
        return view('backend.employee.employee_upload',[
            'title' => 'Upload employee',
            'category' => 'Asset',
            'row' => $employee,
        ]);
    }

    public function contact($id)
    {
        $employee = EmployeeModel::where('employee_number', '=', $id)->first();
        return view('backend.employee.employee_contact',[
            'title' => 'Contact employee',
            'category' => 'Asset',
            'row' => $employee,
        ]);
    }

    public function bank($id)
    {
        $employee = EmployeeModel::where('employee_number', '=', $id)->first();
        return view('backend.employee.employee_bank',[
            'title' => 'Bank employee',
            'category' => 'Asset',
            'row' => $employee,
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
        $role = RoleModel::select('*')->where('role_deletestatus', '=', 0)->get();
        $employee = EmployeeModel::where('employee_id', '=', $id)->first();
        return view('backend.employee.employee_detail',[
            'title' => 'Detail employee',
            'category' => 'Asset',
            'row' => $employee,
            'role' => $role
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
        EmployeeModel::where('employee_id', $id)->update([
            'employee_division' => $request->employee_division,
            'employee_departement' => $request->employee_departement,
            'employee_position' => $request->employee_position,
            'employee_grade' => $request->employee_grade,
            'employee_name' => $request->employee_name,
            'employee_email' => $request->employee_email,
            'employee_birthday' => $request->employee_birthday,
            'employee_address' => $request->employee_address,
            'role_code' => $request->role_code,
            'employee_handphone1' => $request->employee_handphone1,
            'employee_handphone2' => $request->employee_handphone2,
            'employee_salary' => $request->employee_salary,
            'employee_gender' => $request->employee_gender,
            'employee_bank_name' => $request->employee_bank_name,
            'employee_bank_accountname' => $request->employee_bank_accountname,
            'employee_bank_accountnumber' => $request->employee_bank_accountnumber,
            'employee_workdate_start' => $request->employee_workdate_start,
            'employee_updatedate' => date('Y-m-d H:i:s'),

        ]);

        return redirect()->back();
    }


    public function editpassword($id)
    {
        if(auth()->guard('employee')->user()->employee_number != $id){
            return redirect()->back();
        }
        $employee = EmployeeModel::where('employee_id', '=', $id)->first();
        return view('backend.employee.password_employee',[
            'title' => 'Change Password',
            'category' => 'Asset',
            'row' => $employee
        ]);
    }


    public function updatepassword(Request $request, $id)
    {
        if($request->employee_passwd != $request->confirm_passwd){
            return redirect()->back();
        }

        EmployeeModel::where('employee_number', $id)->update([
            'employee_passwd' => Hash::make($request->employee_passwd),
            'employee_updatedate' => date('Y-m-d H:i:s'),

        ]);

        return redirect()->back()->with('msg', 'password updated');
    }


    // public function changepassword(Request $request, $id)
    // {
    //     EmployeeModel::where('employee_id', $id)->update([
    //         'employee_passwd' => Hash::make($request->employee_passwd),
    //         'employee_updatedate' => date('Y-m-d H:i:s'),
    //     ]);

    //     return redirect()->back();
    // }

    public function uploadfoto(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_picture' => 'required|mimes:jpeg,png,jpg'
          ]);
        $file = $request->file('employee_picture');
        $fileName = $file->getClientOriginalName().'_'.time().'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        //save file 
        $employeeimg = $file->storeAs('public/images/employee_temp', $fileName);

        // file path in prj folder
        $picture = public_path('storage/images/employee_temp/' . $fileName);
        
        //compress image
        $employee_picture = Image::make($picture)->resize('300', null, function($constraint) {
            $constraint->aspectRatio();
        }); 
        $employee_picture->save($picture);

        EmployeeModel::where('employee_number', $id)->update([
            'employee_picture' => file_get_contents($picture),
            'employee_picture_name' => $fileName,
            'employee_picture_size' => Storage::size('public/images/employee_temp/' . $fileName),
            'employee_picture_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'employee_picture_ext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeModel::where('employee_id', $id)->update([
            // 'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
            // 'delete_by' => Auth()->user()->employee_id,
            'employee_deletestatus' => '1',
            'employee_deletedate' => date('Y-m-d H:i:s'),
        ]);
    
        return redirect()->to(route('employee.index'));
    }
}
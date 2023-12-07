<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = RoleModel::select('*')->where('role_deletestatus', '=','0')->get();
        return view('backend.role.role_list', [
            'title' => 'Role List',
            'category' => 'Assets',
            'rows' => $role
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create_role',[
            'title' => 'Create Role',
            'category' => 'Assets',
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
        RoleModel::insert([
            'role_code' => $request->role_code,
            'role_category' => $request->role_category,
            'role_access' => $request->role_access,
            'role_level' => $request->role_level,
            'role_information' => $request->role_information,
            // 'insert_by' => $request->insert_by,
            'role_deletestatus' => '0',
            'role_insertby' => '100',
            'role_insertdate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = RoleModel::select('*')->where('role_id', '=', $id)->first();
        // dd($role);
        return view('backend.role.role_detail',[
            'title' => 'Detail Role',
            'category' => 'Assets',
            'row' => $role,
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
        RoleModel::where('role_id', '=', $id)->update([
            'role_code' => $request->role_code,
            'role_category' => $request->role_category,
            'role_access' => $request->role_access,
            'role_level' => $request->role_level,
            'role_information' => $request->role_information,
            'role_updatedate' => date('Y-m-d H:i:s'),
            // 'insert_by' => $request->insert_by,
        ]);
        return redirect()->to(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        RoleModel::where('role_id', $id)->update([
            // 'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
            'role_deletedate' => date('Y-m-d H:i:s'),
            // 'delete_by' => Auth()->user()->employee_id,
            'role_deletestatus' => 1
        ]);

        return redirect()->to(route('role.index'));
    }
}

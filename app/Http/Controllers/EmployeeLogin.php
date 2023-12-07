<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeLogin extends Controller
{
    public function showLoginForm(){
        return view('auth.employee.login',[
            'title' => 'Login'
        ]);
    }


    public function loginAttempt(Request $request){
        $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required']
        ]);


        $model = Employee::query()->where('employee_email', $request->get('email'))->firstOrFail();

        
        // dd($model);
        
        // dd(Hash::check($request->get('password'), $model->employee_passwd));

        if(!Hash::check($request->get('password'), $model->employee_passwd)){
            return back()->with('error', 'Email or Password is Incorect');
        }


        Auth::guard('employee')->login($model);

        return redirect()->to(route('dashboard'));
    }

    public function logout(){
        Auth::guard('employee')->logout();
        return redirect(route('employee.login'));
    }

}

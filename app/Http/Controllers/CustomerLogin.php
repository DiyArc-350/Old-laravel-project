<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerLogin extends Controller
{
    public function showLoginForm(){
        return view('auth.customer.login',[
            'title' => 'Login'
        ]);
    }


    public function loginAttempt(Request $request){
        $request->validate([
            'customer_email'=> ['required', 'email'],
            'password' => ['required']
        ]);


        $model = Customer::query()->where('customer_email', $request->get('customer_email'))->firstOrFail();

        // dd($model);

        if(!Hash::check($request->get('password'), $model->customer_passwd)){
            return redirect()->to(route('login'))->with('error', 'Email or Password is Incorect');
        }elseif($model->customer_verified == 0){
            return redirect()->to(route('register.otp'))->withInput();
        }

        Auth::guard('customer')->login($model);

        return redirect(route('fe.dashboard'));
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect(route('login'));
    }
}
 
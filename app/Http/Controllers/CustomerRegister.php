<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CustomerRegister extends Controller
{
    public function showRegisterForm(){
        return view('auth.customer.register',[
            'title' => 'Register'
        ]);
    }

    public function registerAttempt(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            // 'username' => 'required|unique:tb_customer',
            'customer_email' => 'required|email|unique:customer',
            // 'handphone' => 'required|max:13|unique:tb_customer',
            'password' => 'required|min:8',
            // 'confirmpass' => 'required|same:password|min:8',
        ]);

        $customerNumber = "CUS-".substr(time(),-6).date("Y");

        Customer::insert([
            'customer_number' => $customerNumber,
            'role_code' => 200,
            'customer_fullname' => $validatedData['fullname'],
            // 'username' => $validatedData['username'],
            'customer_email' => $validatedData['customer_email'],
            // 'handphone' => $validatedData['handphone'],
            'customer_passwd' => Hash::make($validatedData['password']),
            'customer_insertdate' => date('Y-m-d H:i:s'),
            'customer_verified' => 0,
            'customer_blocked' => 0,
            'customer_trialpaid' => 0,
            'customer_deletestatus' => 0
        ]);

        return redirect()->to(route('register.otp'))->withInput();
    }

    public function otpRegister()
    {
        return view('auth.customer.register-otp', [
            'title' => 'OTP Registration',
        ]);
    }

    public function sendOtpProcess(Request $request)
    {
        // $model = Customer::query()->where('customer_email', $request->get('customer_email'))->firstOrFail();
        // $validatedData = $request->validate([
        //     'customer_handphone1' => [
        //         'required',
        //         'max:13',
        //         Rule::unique('customer', 'customer_handphone1')
        //         ->where('customer_id',$model->customer_id)
        //     ] 
        // ]);
        $otpcode = random_int(10000, 99999);

        $otp = 'OTP Code anda adalah : ' . $otpcode; 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,"https://textwa.com/api/send.php");
        curl_setopt($curl, CURLOPT_POST, 1); 
        $no_wa = $request->customer_handphone1;
        $pesan = $otp;
        curl_setopt($curl, CURLOPT_POSTFIELDS, "phone=".$no_wa."&message=".$pesan."");
        curl_exec ($curl);
        curl_close ($curl);

        Customer::where('customer_email', $request->customer_email)->update([
            'customer_handphone1' => $request->customer_handphone1,
            'customer_otpcode' => $otpcode
        ]);

        return redirect(route('input.otp'))->withInput();
    }

    public function inputOtp()
    {
        return view('auth.customer.confirm-otp', [
            'title' => 'Input OTP Registration'
        ]);
    }

    public function inputOtpProcess(Request $request) {
        $otp = implode('', $request->otp_code);
        $otpCodeDB = Customer::where('customer_handphone1', $request->customer_handphone1)->pluck('customer_otpcode')->first();
        // dd($otpCodeDB);
        if ($otpCodeDB == $otp) {
            Customer::where('customer_handphone1', $request->customer_handphone1)->update([
                'customer_verified' => 1
            ]);
            return redirect(route('login'))->withInput();
        } else {
            return redirect()->to(route('register.otp'))->withInput()->with('error', 'Kode Salah, Inputlah yang benar');
        }
    }
}

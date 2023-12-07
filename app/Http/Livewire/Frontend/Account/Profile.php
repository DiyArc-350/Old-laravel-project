<?php

namespace App\Http\Livewire\Frontend\Account;

use Livewire\Component;
use App\Models\OrdersModel;
use App\Models\CustomerModel;
use App\Models\CustomerAddressModel;

class Profile extends Component
{

    public $customer_fullname,$customer_email,$customer_handphone1,$customer_id;
    public $custnum,$custid;

    public function mount($custnum){
        $this->custnum = $custnum;
        $this->custid = auth()->guard('customer')->user()->customer_id;

        $customer = CustomerModel::find($this->custid);

        if($customer){
            $this->customer_id = $customer->customer_id;
            $this->customer_fullname = $customer->customer_fullname;
            $this->customer_email = $customer->customer_email;
            $this->customer_handphone1 = $customer->customer_handphone1;
            $this->customer_updatedate = $customer->customer_updatedate;
            $this->customer_updateby = $customer->customer_updateby;
        }
    }

    public function render()
    {
        $address = CustomerAddressModel::where('customer_number', '=', $this->custnum)->where('customer_address_deletestatus', '=', 0)->orderBy('customer_address_id', 'ASC')->get();
        $default_address = CustomerAddressModel::where('customer_number', '=', $this->custnum)->where('customer_address_deletestatus', '=', 0)->orderBy('customer_address_id', 'ASC')->first();
        $default = $default_address['customer_address_id'];

        $orders = OrdersModel::where('customer_number', '=', $this->custnum)->where('orders_deletestatus', '=', 0)->get();

        return view('livewire.frontend.account.profile', [
            'address' => $address,
            'orders' => $orders,
            'default_address' => $default_address,
            'default' => $default,
        ]);
    }


    public function updateProfile(){
        $customer = CustomerModel::find($this->custid);

        if($customer){
            $customer->update([
                'customer_fullname' => $this->customer_fullname,
                'customer_email' => $this->customer_email,
                'customer_handphone1' => $this->customer_handphone1,
                'customer_updatedate' => date('Y-m-d H:i:s'),
                'customer_updateby' => auth()->guard('customer')->user()->customer_id,
            ]);
        }
        return redirect()->back();
        
    }
}

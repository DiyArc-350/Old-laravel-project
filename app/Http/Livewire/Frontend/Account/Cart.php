<?php

namespace App\Http\Livewire\Frontend\Account;

use App\Models\CartModel;
use Livewire\Component;

class Cart extends Component
{
    public $custnum;

    public function mount($custnum){
        $this->custnum = $custnum;
    }

    public function render()
    {
        $cart = CartModel::leftjoin('product', 'product.product_code', '=', 'cart.product_code')
                ->where('cart_deletestatus', '=', 0)
                ->where('customer_number', '=', auth()->guard('customer')->user()->customer_number)
                ->get();

        return view('livewire.frontend.account.cart', [
            'cart' => $cart,
        ]);
    }
}

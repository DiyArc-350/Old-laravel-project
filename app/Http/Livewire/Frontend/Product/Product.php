<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\ProductInfoModel;
use App\Models\ProductImageModel;

class Product extends Component
{
    public $code,$cart_quantity;

    public function mount($code){
        $this->code = $code;
    }

    public function render()
    {
        $product = ProductModel::select('*')->where('product_code', '=', $this->code)->where('product_deletestatus', '=', 0)->first();
        $image = ProductImageModel::select('*')->where('product_code', '=', $this->code)->where('product_image_deletestatus', '=', 0)->get();
        $info = ProductInfoModel::select('*')->where('product_code', '=', $this->code)->where('product_info_deletestatus', '=', 0)->get();
        $productlist = ProductModel::leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
        ->where('product_deletestatus', '=', 0)
        ->get();
        // dd($product);
        return view('livewire.frontend.product.product', [
            'product' => $product,
            'productlist' => $productlist,
            'image' => $image,
            'info' => $info,
        ]);
    }


    public function addCart()
    {
        $product = ProductModel::where('product_code', '=', $this->code)->first();
        
        $subtotal = $this->cart_quantity * $product['product_price_purchase'];
        $custnum = auth()->guard('customer')->user()->customer_number;

        CartModel::create([
            'cart_code' => rand(100,999).date('Hisymd'),
            'customer_number' => $custnum,
            'product_code' => $this->code,
            'cart_quantity' => $this->cart_quantity,
            'cart_price_item' => $product['product_price_purchase'],
            'cart_price_subtotal' => $subtotal,
            // 'cart_note' => $this->cart_note,
            'cart_insertdate' => date('Y-m-d H:i:s'),
            'cart_insertby' => auth()->guard('customer')->user()->customer_number,
            'cart_deletestatus' => 0,
        ]);

        return redirect()->back();
    }
}

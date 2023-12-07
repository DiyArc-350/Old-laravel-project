<?php

namespace App\Http\Livewire\Frontend\Dashboard\Content;

use Livewire\Component;
use App\Models\ProductModel;

class SecondRow extends Component
{
    public function render()
    {
        $product = ProductModel::leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
        ->where('product_deletestatus', '=', 0)
        ->get();

        return view('livewire.frontend.dashboard.content.second-row', 
        [
            "product" => $product
        ]
        );
    }
    
}

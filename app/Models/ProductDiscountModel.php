<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscountModel extends Model
{
    use HasFactory;
    protected $table = "product_discount";
    protected $primaryKey = "product_discount_id";
    public $timestamps = false;
    protected $guarded = ['product_discount_id'];
}

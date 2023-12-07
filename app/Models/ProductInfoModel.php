<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfoModel extends Model
{
    use HasFactory;
    protected $table = "product_info";
    protected $primaryKey = "product_info_id";
    public $timestamps = false;
    protected $guarded = ['product_info_id'];
}

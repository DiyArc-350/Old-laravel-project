<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    use HasFactory;
    protected $table = "product_category";
    protected $primaryKey = "product_category_id";
    public $timestamps = false;
    protected $guarded = ['product_category_id'];
}

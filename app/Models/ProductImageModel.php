<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;
    protected $table = "product_image";
    protected $primaryKey = "product_image_id";
    public $timestamps = false;
    protected $guarded = ['product_image_id'];
}

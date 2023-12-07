<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    use HasFactory;
    protected $table = "discount";
    protected $primaryKey = "discount_id";
    public $timestamps = false;
    protected $guarded = ['discount_id'];
}

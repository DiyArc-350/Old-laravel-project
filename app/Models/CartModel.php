<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $primaryKey = "cart_id";
    public $timestamps = false;
    protected $guarded = ['cart_id'];
}

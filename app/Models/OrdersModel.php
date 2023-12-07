<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "orders_id";
    public $timestamps = false;
    protected $guarded = ['orders_id'];
}

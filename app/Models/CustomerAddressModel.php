<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddressModel extends Model
{
    use HasFactory;
    protected $table = "customer_address";
    protected $primaryKey = "customer_address_id";
    public $timestamps = false;
    protected $guarded = ['customer_address_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerModel extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $guarded = ['customer_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'customer_passwd',
    ];

}

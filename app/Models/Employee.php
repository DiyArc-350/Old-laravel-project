<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $guarded = ['employee_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'employee_passwd',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanypicModel extends Model
{
    use HasFactory;
    protected $table = 'companypic';
    protected $primaryKey = 'companypic_id';
    public $timestamps = false;

    protected $fillable = ['companypic_id', 'company_code', 'customer_number', 'companypic_name', 'companypic_position', 'companypic_departement', 
    'companypic_division', 'companypic_email', 'companypic_phone', 'companypic_handphone1', 'companypic_insertdate', 'companypic_insertby',
    'companypic_updatedate', 'companypic_updateby', 'companypic_deletedate', 'companypic_deleteby', 'companypic_deletestatus'];
}
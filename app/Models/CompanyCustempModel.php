<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCustempModel extends Model
{
    use HasFactory;

    protected $table = "company_custemp";
    protected $primaryKey = "company_custemp_id";
    public $timestamps = false;
    protected $guarded = ['company_custemp_id'];
}

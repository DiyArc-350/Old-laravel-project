<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;

    protected $table = "company";
    protected $primaryKey = "company_id";
    public $timestamps = false;
    protected $guarded = ['company_id'];
    // protected $fillable = [
    //     'company_code','customer_number','company_name','company_website','company_address','company_province','company_postcode','company_phone','company_handphone1','company_priority','company_category','company_industry','company_insertby'
    // ];
}
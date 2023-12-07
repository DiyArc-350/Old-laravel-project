<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $guarded = ['role_id'];

    // protected $fillable = ['role_code, role_category, role_access,
    // role_level, insert_date, insert_by, update_date, update_by, delete_date,
    // delete_by, delete_status'];
}

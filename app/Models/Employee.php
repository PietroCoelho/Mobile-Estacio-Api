<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['person_id', 'status', 'user', 'password', 'registration_user_at', 'status_user', 'deleted_at'];
}

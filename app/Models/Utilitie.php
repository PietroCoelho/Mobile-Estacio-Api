<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utilitie extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'utilities';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'amount', 'time_service', 'status', 'deleted_at'];
}

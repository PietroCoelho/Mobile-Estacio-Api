<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePersons extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'type_persons';
    protected $primaryKey = 'id';
}

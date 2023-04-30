<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'type_person_id', 'surname', 'gender', 'date_birth', 'cpf', 'rg', 'deleted_at'];

}

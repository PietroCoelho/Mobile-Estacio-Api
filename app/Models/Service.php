<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['empolyee_id', 'person_id', 'utilitie_id', 'opening_hours', 'form_payment', 'observation', 'amount', 'amount_paid', 'status', 'deleted_at'];
}

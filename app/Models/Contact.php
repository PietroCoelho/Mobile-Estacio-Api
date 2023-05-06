<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['type_contact_id', 'description', 'person_id', 'deleted_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

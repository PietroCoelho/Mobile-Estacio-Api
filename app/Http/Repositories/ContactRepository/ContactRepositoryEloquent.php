<?php

declare(strict_types=1);

namespace App\Http\Repositories\ContactRepository;

use App\Models\Contact;
use App\Models\Person;

class ContactRepositoryEloquent extends Contact implements ContactRepositoryInterface
{
    public function saveContactForPerson(array $params): void
    {
        $this->create($params);
    }

    public function updateContactForPerson(array $data): void
    {
        $this->find($data['id'])->update($data);
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Repositories\ContactRepository;

use App\Models\Contact;

class ContactRepositoryEloquent extends Contact implements ContactRepositoryInterface
{
    public function saveContactForPerson(array $params): void
    {
        
    }
}

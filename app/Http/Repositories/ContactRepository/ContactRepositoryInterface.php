<?php

declare(strict_types=1);

namespace App\Http\Repositories\ContactRepository;

interface ContactRepositoryInterface
{
    public function saveContactForPerson(array $params): void;
    public function updateContactForPerson(array $data): void;
}

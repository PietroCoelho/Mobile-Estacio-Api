<?php

declare(strict_types=1);

namespace App\Http\Repositories\ContactRepository;

interface ContactRepositoryInterface
{
    public function saveContactForPerson(int $personId, array $params): void;
}

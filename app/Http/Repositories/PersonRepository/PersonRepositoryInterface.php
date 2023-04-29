<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

interface PersonRepositoryInterface
{
    public function getList(array $params);
}

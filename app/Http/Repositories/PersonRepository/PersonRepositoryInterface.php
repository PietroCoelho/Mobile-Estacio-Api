<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use stdClass;

interface PersonRepositoryInterface
{
    public function getList(array $params): array;
    public function store(array $params): stdClass;
}
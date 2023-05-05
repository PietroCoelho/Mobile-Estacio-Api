<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use stdClass;

interface PersonRepositoryInterface
{
    public function getList(array $params): array;
    public function findById($id);
    public function store(array $params): stdClass;
    public function edit(array $data, $id): stdClass;
    public function exclude($id);
}

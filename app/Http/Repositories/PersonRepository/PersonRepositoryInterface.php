<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use Illuminate\Pagination\LengthAwarePaginator;

interface PersonRepositoryInterface
{
    public function getList(array $params): LengthAwarePaginator;
    public function findById($id);
    public function store(array $params);
    public function edit(array $data, $id);
    public function exclude($id);
}

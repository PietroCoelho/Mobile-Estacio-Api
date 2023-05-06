<?php

declare(strict_types=1);

namespace App\Http\Repositories\UtilitieRepository;

use Illuminate\Pagination\LengthAwarePaginator;

interface UtilitieRepositoryInterface
{
    public function getList(array $params): LengthAwarePaginator;
    public function findById($id);
    public function store(array $data);
    public function edit(array $data, $id);
    public function exclude($id);
}

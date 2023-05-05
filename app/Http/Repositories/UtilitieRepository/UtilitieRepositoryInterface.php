<?php

declare(strict_types=1);

namespace App\Http\Repositories\UtilitieRepository;

use stdClass;

interface UtilitieRepositoryInterface
{
    public function getList(array $params);
    public function findById($id);
    public function store(array $data): stdClass;
    public function edit(array $data, $id): stdClass;
    public function exclude($id);
}

<?php

declare(strict_types=1);

namespace App\Http\Repositories\UtilitieRepository;

use stdClass;

interface UtilitieRepositoryInterface
{
    public function getList(array $params);
    // public function findOne($id);
    public function store(array $data): stdClass;
    // public function update(array $data, $id);
    // public function destroy($id);
}

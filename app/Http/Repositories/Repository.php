<?php

declare(strict_types=1);

namespace App\Http\Repositories;

interface Repository
{
    public function getList(array $params);
    // public function findById($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}

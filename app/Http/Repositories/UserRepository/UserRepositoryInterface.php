<?php

declare(strict_types=1);

namespace App\Http\Repositories;

interface UserRepositoryInterface
{
    public function getList(array $params);
    public function findOne($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}

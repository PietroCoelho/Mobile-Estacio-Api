<?php

declare(strict_types=1);

namespace App\Http\Repositories\EmployeeRepository;

use App\Models\Employee;
use stdClass;

class EmployeeRepositoryEloquent extends Employee implements EmployeeRepositoryInterface
{

    public function getList(array $params): array
    {
        return $this->paginate($params['per_page'])->toArray();
    }

    public function store(array $params): stdClass
    {
        return (object) $this->create($params)->toArray();
    }
}

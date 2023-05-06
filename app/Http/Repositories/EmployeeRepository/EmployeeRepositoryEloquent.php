<?php

declare(strict_types=1);

namespace App\Http\Repositories\EmployeeRepository;

use App\Models\Employee;
use App\Models\Person;

class EmployeeRepositoryEloquent extends Employee implements EmployeeRepositoryInterface
{

    public function getList(array $params): array
    {
        return $this->paginate($params['per_page'])->toArray();
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}

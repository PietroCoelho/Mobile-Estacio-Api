<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\EmployeeRepository\{EmployeeRepositoryEloquent, EmployeeRepositoryInterface};

class EmployeeService extends Service
{

    protected EmployeeRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new EmployeeRepositoryEloquent();
        parent::__construct();
    }
}

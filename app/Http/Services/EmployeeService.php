<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\EmployeeRepository\{EmployeeRepositoryEloquent, EmployeeRepositoryInterface};
use Symfony\Component\HttpKernel\Exception\HttpException;

class EmployeeService extends Service
{

    protected EmployeeRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new EmployeeRepositoryEloquent();
        parent::__construct();
    }

    public function saveEmployeeForPerson(array $employee): void
    {
        if (!$this->repository instanceof EmployeeRepositoryInterface) throw new HttpException(405, 'Operacao nao permitida');

        $this->repository->saveEmployeeForPerson($employee);
    }
}

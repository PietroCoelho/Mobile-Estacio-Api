<?php

declare(strict_types=1);

namespace App\Http\Repositories\EmployeeRepository;

use stdClass;

interface EmployeeRepositoryInterface
{
    public function getList(array $params): array;
}

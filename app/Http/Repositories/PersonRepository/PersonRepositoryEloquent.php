<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use App\Models\Person;
use stdClass;

class PersonRepositoryEloquent extends Person implements PersonRepositoryInterface
{

    public function getList(array $params): array
    {

        return $this->paginate($params['per_page'])->toArray();
    }

    public function store(array $params): stdClass
    {
        return  (object) $this->create($params)->toArray();
    }
}

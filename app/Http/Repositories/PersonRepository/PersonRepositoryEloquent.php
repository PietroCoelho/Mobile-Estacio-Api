<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use App\Models\Person;

class PersonRepositoryEloquent extends Person implements PersonRepositoryInterface
{

    public function getList(array $params)
    {
        
        return $this->paginate($params['per_page'])->toArray();
    }

}

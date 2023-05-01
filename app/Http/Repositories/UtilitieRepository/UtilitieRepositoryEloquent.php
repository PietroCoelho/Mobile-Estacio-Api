<?php

declare(strict_types=1);

namespace App\Http\Repositories\UtilitieRepository;

use App\Models\Utilitie;
use stdClass;

class UtilitieRepositoryEloquent extends Utilitie implements UtilitieRepositoryInterface
{

    public function getList(array $params): array
    {
        return $this->paginate($params['per_page'])->toArray();
    }

    public function store(array $data): stdClass
    {

        return (object) $this->create($data)->toArray();
    }
}

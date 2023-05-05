<?php

declare(strict_types=1);

namespace App\Http\Repositories\ServiceRepository;

use App\Models\Service as ModelsService;
use stdClass;

class ServiceRepositoryEloquent extends ModelsService implements ServiceRepositoryInterface
{

    public function getList(array $params): array
    {
        return $this->paginate($params['per_page'])->toArray();
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function store(array $data): stdClass
    {
        return (object) $this->create($data)->toArray();
    }

    public function edit(array $data, $id): stdClass
    {
        return (object) $this->find($id)->update($data);
    }

    public function exclude($id)
    {
        return $this->destroy($id);
    }
}

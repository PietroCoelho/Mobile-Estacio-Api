<?php

declare(strict_types=1);

namespace App\Http\Repositories\UtilitieRepository;

use App\Models\Utilitie;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class UtilitieRepositoryEloquent extends Utilitie implements UtilitieRepositoryInterface
{

    public function getList(array $params): LengthAwarePaginator
    {
        return $this->paginate($params['per_page']);
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function edit(array $data, $id)
    {
        return $this->find($id)->update($data);
    }

    public function exclude($id)
    {
        return $this->destroy($id);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class PersonRepositoryEloquent implements Repository
{
    protected Model $classModel;

    public function __construct(Model $model)
    {
        $this->classModel = $model;
    }

    public function all()
    {
        return $this->classModel->all();
    }

    public function getList(array $params)
    {
        return $this->classModel->getList($params);
    }

    // public function findById($id)
    // {
    //     return $this->classModel->findList($id);
    // }

    public function store(array $data)
    {
        $rsPerson = $this->classModel->create($data);
        return ['id' => $rsPerson->id];
    }

    public function update(array $data, $id)
    {
        $this->classModel->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->classModel->destroy($id);
    }
}

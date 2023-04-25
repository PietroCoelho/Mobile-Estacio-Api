<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UserRepositoryEloquent implements Repository
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

    public function findById($id)
    {
        return $this->classModel->find($id);
    }

    public function store(array $data)
    {
        $rsUser = $this->classModel->create(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password'])]);

        return ['id' => $rsUser->id];
    }

    public function update(array $data, $id)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $this->classModel->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->classModel->destroy($id);
    }
}

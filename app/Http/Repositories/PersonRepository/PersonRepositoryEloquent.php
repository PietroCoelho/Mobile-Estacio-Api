<?php

declare(strict_types=1);

namespace App\Http\Repositories\PersonRepository;

use App\Models\{Contact, Employee, Person};
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class PersonRepositoryEloquent extends Person implements PersonRepositoryInterface
{

    public function getList(array $params): LengthAwarePaginator
    {
        return $this->with(['employee', 'contacts'])->paginate($params['per_page']);
    }

    public function findById($id)
    {
        return $this->with(['employee', 'contacts'])->find($id);
    }

    public function store(array $params)
    {
        try {
            $rsPerson = $this->create($params);
            if ($rsPerson->type_person_id == 2) {
                $rsPerson->employee()->create(['person_id' => $rsPerson->id]);
            }

            if ($params['contacts']) {
                foreach ($params['contacts'] as $contac) {
                    $contac['person_id'] = $rsPerson->id;
                    $rsPerson->contacts()->create($contac);
                }
            }

            return $rsPerson;
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function edit(array $data, $id)
    {
        try {

            $rsPerson = $this->find($id);
            $rsPerson->update($data);
            if ($data['contacts']) {
                foreach ($data['contacts'] as $contac) {
                    $rsPerson->contacts->find($contac['id'])->update($contac);
                }
            }
            return $rsPerson;
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function exclude($id)
    {
        return $this->destroy($id);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'person_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Enums\TypePersonEnum;
use App\Http\Repositories\EmployeeRepository\EmployeeRepositoryEloquent;
use App\Http\Repositories\PersonRepository\{PersonRepositoryEloquent, PersonRepositoryInterface};
use App\Http\Requests\PersonRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
use Illuminate\Http\JsonResponse;

class PersonsService extends Service
{

    protected PersonRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new PersonRepositoryEloquent();
        $this->classRequest = new PersonRequest();
        parent::__construct();
    }

    public function index(): JsonResponse
    {
        try {

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesGet')) throw new HttpException(405, 'Operacao nao permitida');

                $this->validate(new Request(), $this->classRequest->rulesGet(), $this->classRequest->messages());
            }

            if (!isset($this->params['per_page'])) $this->params['per_page'] = 15;

            $rsPersons = $this->repository->getList($this->params);

            return response()->json($rsPersons, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(): JsonResponse
    {
        try {
            if (!$this->repository instanceof PersonRepositoryInterface) throw new HttpException(405, 'Operacao nao permitida');

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPost')) throw new HttpException(405, 'Operacao nao permitida');
                $this->validate(new Request, $this->classRequest->rulesPost(), $this->classRequest->messages());
            }

            $rsPerson = $this->repository->store($this->params);

            if ($rsPerson->type_person_id == TypePersonEnum::Employee) {
                $employeeModel = new EmployeeService();
                $employeeData = [];
                $employeeData['person_id'] = $rsPerson->id;
                $employeeData['status'] = 1;
                $employeeModel->saveEmployeeForPerson($employeeData);
            }

            if ($this->params['contacts']) {
                $contacService = new ContactService();
                foreach ($this->params['contacts'] as $contac) {
                    $contac['person_id'] = $rsPerson->id;

                    $contacService->saveContactForPerson($contac);
                }
            }

            return response()->json(['data' => $rsPerson, 'message' => 'Acao realizada com sucesso']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\ServiceRepository\{ServiceRepositoryEloquent, ServiceRepositoryInterface};
use App\Http\Requests\ServiceRequest;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ServicesService extends Service
{

    protected ServiceRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new ServiceRepositoryEloquent();
        $this->classRequest = new ServiceRequest();
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

            $rsUtilitie = $this->repository->getList($this->params);

            return response()->json($rsUtilitie, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function store(): JsonResponse
    {
        try {
            if (!$this->repository instanceof ServiceRepositoryInterface) throw new HttpException(405, 'Operacao nao permitida');

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPost')) throw new HttpException(405, 'Operacao nao permitida');
                $this->validate(new Request, $this->classRequest->rulesPost(), $this->classRequest->messages());
            }

            $rsUtilitie = $this->repository->store($this->params);

            return response()->json(['data' => $rsUtilitie, 'message' => 'Acao realizada com sucesso']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function update($id)
    {
        try {
            if (!isset($id)) throw new Exception('Requisicao invalida!');

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPut')) throw new HttpException(405, 'Operacao nao permitida');

                $this->validate(new Request, $this->classRequest->rulesPut(), $this->classRequest->messages());
            }

            $this->repository->edit($this->params, $id);

            return response()->json(['message' => 'Acao realizada com sucesso']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {

            if (!isset($id)) throw new Exception('Requisicao invalida!');

            $rs = $this->repository->exclude($id);

            if ($rs != 1) throw new Exception("Nenhum registro deletado!");

            return response()->json(['data' => $id, 'message' => 'Acao efetuada com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}

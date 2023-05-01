<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\UtilitieRepository\{UtilitieRepositoryEloquent, UtilitieRepositoryInterface};
use App\Http\Requests\UtilitieRequest;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request ;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UtilitieService extends Service
{

    protected UtilitieRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new UtilitieRepositoryEloquent();
        $this->classRequest = new UtilitieRequest();
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
            if (!$this->repository instanceof UtilitieRepositoryInterface) throw new HttpException(405, 'Operacao nao permitida');

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
    
}

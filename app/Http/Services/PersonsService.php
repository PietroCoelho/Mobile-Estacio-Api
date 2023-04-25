<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Http\Repositories\PersonRepositoryEloquent;
use App\Http\Repositories\Repository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
use Illuminate\Http\JsonResponse;

class PersonsService extends Service
{

    public function __construct()
    {
        $this->repo = new PersonRepositoryEloquent(new Person());
        $this->classRequest = new PersonRequest();
        parent::__construct();
    }

    public function store(): JsonResponse
    {
        try {
            if (!$this->repo instanceof Repository) throw new HttpException(405, 'Operacao nao permitida');

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPost')) throw new HttpException(405, 'Operacao nao permitida');
                $this->validate(new Request, $this->classRequest->rulesPost(), $this->classRequest->messages());
            }

            $rs = $this->repo->store($this->params);

            return response()->json(['data' => $rs, 'message' => 'Acao realizada com sucesso']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

}

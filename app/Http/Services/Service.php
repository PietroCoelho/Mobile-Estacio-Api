<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\Repository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
use Illuminate\Http\JsonResponse;

class Service
{
    protected $repo;

    protected FormRequest $classRequest;

    protected array $params = [];


    public function __construct()
    {
        $this->params = request()->all();
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try {

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesGet')) throw new HttpException(405, 'Operacao nao permitida');

                $this->validate(new Request(), $this->classRequest->rulesGet(), $this->classRequest->messages());
            }

            if (!isset($this->params['per_page'])) $this->params['per_page'] = 15;

            $rsPersons = $this->repo->getList($this->params);

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

    public function show($id)
    {
        try {
            if (!$this->repo instanceof Repository) throw new HttpException(405, 'Operacao nao permitida');
            $result = $this->repo->findById($id);
            return response()->json(['data' => $result]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Update the specified resource in storage
     * 
     * @param $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id)
    {
        try {
            if (!$this->repo instanceof Repository) throw new HttpException(405, 'Operacao nao permitida');

            if (!isset($id)) throw new Exception('Requisicao invalida!');

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPut')) throw new HttpException(405, 'Operacao nao permitida');

                $this->validate(new Request, $this->classRequest->rulesPut(), $this->classRequest->messages());
            }

            $this->repo->update($this->params, $id);

            return response()->json(['message' => 'Acao realizada com sucesso']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Delete the specified resource in storage
     * 
     * @param $params
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy($id)
    {
        try {
            if (!$this->repo instanceof Repository) throw new HttpException(405, 'Operacao nao permitida');

            if (!isset($id)) throw new Exception('Requisicao invalida!');

            $rs = $this->repo->destroy($id);

            if ($rs != 1) throw new Exception("Nenhum registro deletado!");

            return response()->json(['data' => $id, 'message' => 'Acao efetuada com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Validação dos campos que vem na requisição.
     * 
     * @param Request $request          Class request com os parametros
     * @param array   $rules            regras
     * @param array   $messages         mensagem a ser exibida
     * @param array   $customAttributes customização
     * 
     * @return void
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = []): void
    {
        $validator = Validator::make(request()->all(), $rules, $messages);
        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $item) {
                if (is_array($item)) {
                    foreach ($item as $i) {
                        throw new HttpException(400, $i);
                    }
                }
            }
        }
    }
}

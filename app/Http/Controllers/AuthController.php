<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    protected Model $class;
    protected FormRequest $classRequest;
    protected array $params;

    public function __construct()
    {
        $this->class = new User();
        $this->classRequest = new AuthRequest();
        $this->params = request()->all();
        parent::__construct();
    }

    public function login(Request $request)
    {

        try {
            if ($this->classRequest instanceof FormRequest) {
                $this->validate($request, $this->classRequest->rulesPostLogin(), $this->classRequest->messages());
            }

            $credentials = $request->only('email', 'password');

            $token = Auth::attempt($credentials);
            if (!$token) return response()->json(['status' => 'error', 'message' => 'Email ou senha invalidos!'], 400);


            return $this->respondWithToken($token);
        } catch (Exception $e) {
            return response()->json(['message' => __($e->getMessage())], 400);
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function register()
    {
        try {

            if ($this->classRequest instanceof FormRequest) {
                if (!method_exists($this->classRequest, 'rulesPostRegister')) throw new HttpException(405, 'Operacao nao permitida');
                $this->validate(new Request, $this->classRequest->rulesPostRegister(), $this->classRequest->messages());
            }

            $user = User::create([
                'name' => $this->params['name'],
                'email' => $this->params['email'],
                'password' => Hash::make($this->params['password']),
            ]);

            $token = Auth::login($user);
            return response()->json(['status' => 'success', 'message' => 'User created successfully', 'user' => $user, 'authorisation' => ['token' => $token, 'type' => 'bearer',]]);
        } catch (Exception $e) {
            return response()->json(['message' => __($e->getMessage())], 400);
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 'success', 'message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json(['data' => ['status' => 'success', 'user' => Auth::user(), 'authorization' => ['token' => $token, 'expiredAt' => auth('api')->factory()->getTTL() * 60, 'type' => 'bearer']]]);
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

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Services\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Service $service;

    public function __construct()
    {
        $this->middleware('auth.jwt', ['except' => ['login', 'register','refresh']]);
    }

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

    public function store(): JsonResponse
    {
        return $this->service->store();
    }

    public function show($id): JsonResponse
    {
        return $this->service->show($id);
    }

    public function update($id): JsonResponse
    {
        return $this->service->update($id);
    }

    public function destroy($id): JsonResponse
    {
        return $this->service->destroy($id);
    }
}

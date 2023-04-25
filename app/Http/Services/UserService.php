<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\UserRepositoryEloquent;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserService extends Service
{

    public function __construct()
    {
        $this->repo = new UserRepositoryEloquent(new User());
        $this->classRequest = new UserRequest();
        parent::__construct();
    }
}

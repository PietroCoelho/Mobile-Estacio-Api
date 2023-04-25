<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;

class UserController extends Controller
{
    public function __construct()
    {
        $this->service = new UserService();
        parent::__construct();
    }
}

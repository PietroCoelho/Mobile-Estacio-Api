<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Services\PersonsService;

class PersonsController extends Controller
{
    public function __construct()
    {
        $this->service = new PersonsService();
        parent::__construct();
    }
}

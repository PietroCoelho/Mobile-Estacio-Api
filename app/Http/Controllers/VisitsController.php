<?php

namespace App\Http\Controllers;

use App\Http\Services\VisitsService;

class VisitsController extends Controller
{
    public function __construct()
    {
        $this->service = new VisitsService();
        parent::__construct();
    }
}

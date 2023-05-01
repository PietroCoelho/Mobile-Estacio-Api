<?php

namespace App\Http\Controllers;

use App\Http\Services\UtilitieService;

class UtilitieController extends Controller
{
    public function __construct()
    {
        $this->service = new UtilitieService();
        parent::__construct();
    }
}

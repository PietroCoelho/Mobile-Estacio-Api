<?php

namespace App\Http\Controllers;

use App\Http\Services\ServicesService;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->service = new ServicesService();
        parent::__construct();
    }
}

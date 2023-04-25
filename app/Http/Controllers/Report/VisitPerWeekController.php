<?php

declare(strict_types=1);

namespace App\Http\Controllers\Report;

use App\Models\Visits;
use Illuminate\Routing\Controller;

class VisitPerWeekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt', ['except' => ['login', 'register', 'refresh']]);
    }

    public function handle()
    {
        $visit = new Visits();
        return response()->json(['data' => $visit->visitPerWeek()]);
    }
}

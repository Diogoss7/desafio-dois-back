<?php

namespace App\Http\Controllers;

use App\Models\DeputyExpense;

class DeputyExpenseController extends Controller
{
    public function getTopFiveExpenses()
    {
        $deputies = DeputyExpense::selectRaw('SUM(value) as total, deputy_id' )
        ->groupBy('deputy_id')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

        return response()->json($deputies);
    }
}

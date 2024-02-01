<?php

namespace App\Http\Controllers\Admin;

// ============================================================================>> Core Library
use Illuminate\Http\Response; // For Responsing data back to Client

// ============================================================================>> Custom Library
// Controller
use App\Http\Controllers\MainController;

// Model


class DashboardController extends MainController
{
    public function getDashboardInfo()
    {
        $totalSaleToday = 0;


        return response()->json($data, Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;

class DashboardController extends Controller
{
    public function getInfo()
    {
        $totalSaleToday = Order::sum('total_price');
        $data = [
            'total_sale_today'           => $totalSaleToday
        ];
        return $data;
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\StartEndTime;
use App\Models\Trip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_breadcrumbs = [
            ['page' => '#', 'title' => 'home', 'active' => false],
        ];

        return view('dashboard.dashboard', [
            'page_title' => 'home',
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }
}

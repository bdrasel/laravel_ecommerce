<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\User;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
    	$today_orders = Order::whereDate('created_at', today())->count();
		$yesterday_orders = Order::whereDate('created_at', today()->subDays(1))->count();
		$orders_2_days_ago = Order::whereDate('created_at', today()->subDays(2))->count();

		$chart = new OrderChart;
		$chart->labels(['2 days ago Orders', 'Yesterday Orders', 'Today Orders']);
		$chart->dataset('Orders Chart', 'pie', [$orders_2_days_ago, $yesterday_orders, $today_orders]);
        return view('admin.dashboard.index', compact('chart'));
      
    }
}

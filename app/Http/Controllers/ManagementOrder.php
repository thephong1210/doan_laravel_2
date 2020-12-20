<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;

class ManagementOrder extends Controller
{
    public function index()
    {

        $order_detail = OrderDetail::select('u.id', 'u.name', 'u.address', 'u.phone', 'u.status')
            ->leftJoin('users as u', 'u.id', '=', 'order_detail.users_id')
            ->groupBy('u.id')
            ->get();

        return view('admin.management_order', compact('order_detail'));
    }
    public function OrderProducts($user_id)
    {
        $order_products = OrderDetail::select('p.id', 'p.name', 'p.price','p.image', 'order_detail.qty')
            ->leftJoin('products as p', 'p.id', '=', 'order_detail.products_id')
            ->where('order_detail.users_id', $user_id)
            ->get();

        return view('admin.order_products', compact('order_products'));
    }
}

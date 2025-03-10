<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Order::all();
        return $orderitems = DB::table('order_items')
            ->join('users', 'users.id', '=', 'order_items.user_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'users.name', 'users.email', 'orders.*')
            // ->where('order_items.order_id',$id)
            ->orderBy('orders.id', 'desc')
            ->get();
    }
}

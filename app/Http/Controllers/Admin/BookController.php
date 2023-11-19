<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function adminDashBoard()
    {
        $orders = Cart::where('status', 'confirm')->where('progress', 'wait')->with('user')->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function adminDashBoardDeliveringOrder()
    {
        $orders = Cart::where('status', 'confirm')->where('progress', 'delivering')->with('user')->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function adminDashBoardDeliveredOrder()
    {
        $orders = Cart::where('status', 'confirm')->where('progress', 'delivered')->with('user')->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function updateStatusOrder($id, $status){
        $update = Cart::where('id', $id)->update(['progress' => $status]);

        return redirect('/admin');
    }
}

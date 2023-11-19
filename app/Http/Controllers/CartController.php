<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showMyCart()
    {
        $user_id = auth()->user()->id;
        $products = Cart::get()->where('user_id', "$user_id")->where('progress', 'wait');
        $count_product = count($products);
        $categories = Category::all();
        $all_name_books = Book::select('book_name')->get();

        return view('shop.cart', compact('products', 'count_product','categories','all_name_books'));
    }

    public function showDeliveRingOrder()
    {
        $user_id = auth()->user()->id;
        $products = Cart::get()->where('user_id', "$user_id")->where('progress', 'delivering');
        $count_product = count($products);
        $categories = Category::all();
        $all_name_books = Book::select('book_name')->get();

        return view('shop.cart', compact('products', 'count_product','categories','all_name_books'));
    }

    public function showOrderHistory()
    {
        $user_id = auth()->user()->id;
        $products = Cart::get()->where('user_id', "$user_id")->where('progress', 'delivered');
        $count_product = count($products);
        $categories = Category::all();
        $all_name_books = Book::select('book_name')->get();

        return view('shop.cart', compact('products', 'count_product','categories','all_name_books'));
    }

    public function removeFromCart($id)
    {

        $cart = Cart::find($id);

        $cart->delete();

        if ($cart->delete()) {
            Session::flash('success', "Đã Xóa $cart->book_name khỏi Giỏ Hàng");
            return redirect('/my-cart');
        } else {
            Session::flash('error', 'Thất Bại');
        }
    }

    public function addToOrder($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->status = 'confirm';
            $cart->save();

            if ($cart->save()) {
                Session::flash('success', "Đã Xác Nhận Đặt Đơn Hàng $cart->book_name");
                return redirect('/my-cart');
            } else {
                Session::flash('error', 'Thất Bại');
            }
        }
    }

    public function unConfirmOrder($id){
        $cart = Cart::find($id);
        if ($cart) {
            $cart->status = 'unconfirm';
            $cart->save();

            if ($cart->save()) {
                Session::flash('success', "Đã Hủy Đặt Đơn Hàng $cart->book_name");
                return redirect('/my-cart');
            } else {
                Session::flash('error', 'Thất Bại');
            }
        }
    }
}

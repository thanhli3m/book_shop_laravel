<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function showHomePage()
    {
        $books = Book::paginate(15);
        $categories = Category::all();
        // $user_id = auth()->user()->id;
        // $products = Cart::get()->where('user_id', "$user_id");
        $count_product = count(Book::all());
        $all_name_books = Book::select('book_name')->get();

        return view('shop.shop', compact('books', 'categories', 'count_product', 'all_name_books'));
    }

    public function getBookDetail($id)
    {
        if ($id) {
            $book = Book::find($id);
            $suggest_products = Book::inRandomOrder()->limit(2)->get();
            $comments =  Comment::where('book_id', $id)->paginate(3);
            $count_comment = count(Comment::where('book_id', $id)->get());
            $categories = Category::all();
            $all_name_books = Book::select('book_name')->get();

            // return response()->json($comments);
        }
        return view('shop.detail', compact('book', 'comments', 'count_comment', 'suggest_products', 'categories','all_name_books'));
    }

    public function showProfile()
    {
        $categories = Category::all();
        $all_name_books = Book::select('book_name')->get();

        return view('shop.profile', compact('categories','all_name_books'));
    }



    public function addToCart(Request $request, $id)
    {
        if (auth()->user()->has_address == 'yes') {

            $book = Book::find($id);
            $user_id = auth()->user()->id;
            $quantity  = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->book_name = $book->book_name;
            $cart->book_description = $book->book_description;
            $cart->book_list = $book->book_list;
            $cart->book_author = $book->book_author;
            $cart->book_page_number = $book->book_page_number;
            $cart->publish_year = $book->publish_year;
            $cart->publishing_company = $book->publishing_company;
            $cart->book_price = $book->book_price;
            $cart->book_image = $book->book_image;
            $cart->quantity = $quantity;

            $cart->save();
            if ($cart->save()) {
                Session::flash('success', "Đã Thêm $book->book_name Vào Giỏ Hàng");
                return redirect('/');
            } else {
                Session::flash('error', 'Thất Bại');
            }
        } else {
            Session::flash('error', 'Vui Lòng Cập Nhật Thông Tin Liên Hệ Trước Đi Mua Sắm');
            return redirect('/my-profile');
        }
    }

    public function findProductByCategory($id)
    {
        $books = Book::where('book_list', $id)->paginate(15);
        $categories = Category::all();
        $all_name_books = Book::select('book_name')->get();

        return view('shop.shop', compact('books', 'categories', 'all_name_books'));
    }

    public function findProductByName(Request $request)
    {
        $book_name = $request->book_name;

        $categories = Category::all();
        $books = Book::where('book_name', "like", "%$book_name%")->paginate(15);
        $all_name_books = Book::select('book_name')->get();

        return view('shop.shop', compact('books', 'categories', 'all_name_books'));
    }
}

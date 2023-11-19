<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postMyComment(Request $request, string $id){

        $params = $request->except('_token');

        $myComment = $params['comment'];

        Comment::create([
            'book_id' => $id,
            'user_name' => auth()->user()->name,
            'comment' => $myComment
        ]);

        if ($id) {
            $book = Book::find($id);
            $suggest_products = Book::inRandomOrder()->limit(2)->get();
            $comments =  Comment::where('book_id', $id)->paginate(3);
            $count_comment = count($comments);
        }
        return redirect("product-detail/$id");

    }   
}

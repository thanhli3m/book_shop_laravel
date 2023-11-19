<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'comments';

    protected $fillable = [
        'book_id',
        'user_name',
        'comment'
    ];
}

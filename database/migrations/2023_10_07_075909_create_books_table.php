<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name'); // Tên sách
            $table->longText('book_description'); // Mô tả, tóm tắt sách
            $table->integer('book_list'); // Danh mục sách ( Khóa ngoại bảng category ) 
            $table->string('book_author'); // Tác giả cuốn sách
            $table->bigInteger('book_page_number'); // Số trang sách
            $table->year('publish_year'); // Năm suất bản
            $table->string('publishing_company'); // Nhà xuất bản
            $table->bigInteger('book_price'); // Giá 
            $table->string('book_image'); // Ảnh sách
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

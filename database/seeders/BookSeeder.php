<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = 1920;
        $booklist = 1;
        $nameList = ['John', 'Jane', 'Michael', 'Emily', 'David'];
        $sachNoiTieng = [
            "Dế Mèn Phiêu Lưu Ký",
            "Số Đỏ",
            "Nhật Ký Trong Tù",
            "Tắt Đèn",
            "Dòng Sông Không Trở Lại",
            "Bến Đò Đông Hồ",
            "Bến Tre Một Thời",
            "Chi Pheo",
            "Đất Rừng Phương Nam",
            "Đời Là Thế Thôi",
            "Truyện Kiều",
            "Cánh Đồng Bất Tận",
            "Kính Vạn Hoa",
            "Nỗi Buồn Chiến Tranh",
            "Hoàng Tử Bé",
            "Hồi Ký Lục Tỉnh Thất",
            "Dế Mèn Tình Yêu",
            "Làm Bạn Với Bầu Trời",
            "Người Trong Bến Cũ",
            "Còn Chút Gì Để Nhớ"
        ];

        
        $randomName = $nameList[array_rand($nameList)];
        $randomNameBook = $sachNoiTieng[array_rand($sachNoiTieng)];

        for ($i = 1; $i < 100; $i++) {
            DB::table('books')->insert([
                'book_name' => $randomNameBook,
                'book_description' => 'Mô tả sách Tưởng nhớ thi sĩ Bùi Giáng ',
                'book_list' => $booklist++,
                'book_author' => $randomName,
                'book_page_number' => 251,
                'publish_year' => $year++,
                'publishing_company' => 'NXB Trẻ',
                'book_price' => 250000,
                'book_image' => ''
            ]);
        }
    }
}

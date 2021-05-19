<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['id'=>1, 'name' => 'Điện thoại', 'created_at' => new DateTime()],
            ['id'=>2, 'name' => 'Máy tính bảng', 'created_at' => new DateTime()],
            ['id'=>3, 'name' => 'Laptop', 'created_at' => new DateTime()],
            ['id'=>4, 'name' => 'PC Gaming', 'created_at' => new DateTime()],
            ['id'=>5, 'name' => 'Đồng hồ', 'created_at' => new DateTime()],
            ['id'=>6, 'name' => 'Phụ kiện', 'created_dat' => new DateTime()]
        ];
        DB::table('categories')->insert($data);
    }
}

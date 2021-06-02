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
            ['id'=>1, 'name' => 'affogato', 'created_at' => new DateTime()],
            ['id'=>2, 'name' => 'Caffè Americano', 'created_at' => new DateTime()],
            ['id'=>3, 'name' => 'Caffè latte', 'created_at' => new DateTime()],
            ['id'=>4, 'name' => 'Coffee milk', 'created_at' => new DateTime()],
            ['id'=>5, 'name' => 'Café mocha', 'created_at' => new DateTime()],
            ['id'=>6, 'name' => 'Cappuccino', 'created_dat' => new DateTime()],
            ['id'=>7, 'name' => 'Espresso', 'created_dat' => new DateTime()],
            ['id'=>8, 'name' => 'Iced coffee', 'created_dat' => new DateTime()],
            ['id'=>9, 'name' => 'Instant coffee', 'created_dat' => new DateTime()],
            ['id'=>10, 'name' => 'Mocha', 'created_dat' => new DateTime()],
            ['id'=>11, 'name' => 'black coffee', 'created_dat' => new DateTime()],
        ];
        DB::table('categories')->insert($data);
    }
}

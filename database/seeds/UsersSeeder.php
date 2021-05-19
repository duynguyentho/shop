<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
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
            'name'=>'duy',
            'email' => 'duy@gmail.com',
            'password' => bcrypt('123'),
        ];
        DB::table('users')->insert($data);
    }
}

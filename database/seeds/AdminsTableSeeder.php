<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'role' => \App\Admin::SYSTEM_ADMIN,
                'name' => 'admin',
                'password' => bcrypt('aaaaaaaa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'role' => \App\Admin::OWNER,
                'name' => 'hanako',
                'password' => bcrypt('aaaaaaaa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'role' => \App\Admin::OPERATOR,
                'name' => 'taro',
                'password' => bcrypt('aaaaaaaa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}

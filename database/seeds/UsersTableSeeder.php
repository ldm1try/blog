<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор неизвестен',
                'email' => 'author_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'dimm4eg',
                'email' => 'dimm4eg@gmail.com',
                'password' => bcrypt('Qw456753369'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}

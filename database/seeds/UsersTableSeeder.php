<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reader = Reader::createFromPath(base_path() .'/database/seeds/csvs/students.csv');

        $results = $reader->fetch();
        foreach ($results as $row) {
            $password = str_random(8);

            DB::table('users')->insert([
                'username' => utf8_decode($row[1]),
                'name' => utf8_decode(title_case($row[0])),
                'admin' => false,
                'password' => bcrypt($password),
                'password_plain' => $password
            ]);
        }

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Administrator',
            'admin' => true,
            'password' => bcrypt($password),
            'password_plain' => $password
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\Log;
use App\User;

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

            $name       = utf8_decode(title_case($row[0]));
            $username   = utf8_decode($row[1]);
            $campus_id  = $row[2];

            User::create([
                'campus_id' => $campus_id,
                'username' => $username,
                'name' => $name,
                'admin' => false,
                'password' => bcrypt($password),
                'password_plain' => $password
            ]);
        }
		
		$password = str_random(8);
		
        User::create([
            'campus_id' => 0,
            'username' => 'admin',
            'name' => 'Administrator',
            'admin' => true,
            'password' => bcrypt($password),
            'password_plain' => $password
        ]);
    }
}

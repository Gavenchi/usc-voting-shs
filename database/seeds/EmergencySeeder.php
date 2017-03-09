<?php

use Illuminate\Database\Seeder;
use App\User;

class EmergencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = str_random(8);

        $name       = utf8_decode(title_case('Camallere, Shania'));
        $username   = utf8_decode('16101119');

        User::create([
            'campus_id' => 1,
            'username' => $username,
            'name' => $name,
            'admin' => false,
            'password' => bcrypt($password),
            'password_plain' => $password
        ]);

        $password = str_random(8);

        $name       = utf8_decode(title_case('Maurin, Mary Nichole'));
        $username   = utf8_decode('16101128');

        User::create([
            'campus_id' => 1,
            'username' => $username,
            'name' => $name,
            'admin' => false,
            'password' => bcrypt($password),
            'password_plain' => $password
        ]);
    }
}

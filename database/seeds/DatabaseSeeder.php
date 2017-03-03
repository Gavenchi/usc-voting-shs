<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // register all students
        $this->call(UsersTableSeeder::class);

        // parties
        DB::table('parties')->insert([
            ['id' => 1, 'name' => 'Independent'], 
            ['id' => 2, 'name' => 'ISOG'], 
            ['id' => 3, 'name' => 'NATO'],
        ]);

        // positions
        DB::table('positions')->insert([
            ['id' => 1, 'name' => 'President', 'max' => 1],
            ['id' => 2, 'name' => 'Vice President', 'max' => 1],
            ['id' => 3, 'name' => 'Executive Secretary', 'max' => 1],
            ['id' => 4, 'name' => 'Executive Treasurer', 'max' => 1],
            ['id' => 5, 'name' => 'Auditor', 'max' => 1],
            ['id' => 6, 'name' => 'Executive PRO', 'max' => 1],
            ['id' => 7, 'name' => 'DC Representative', 'max' => 1],
            ['id' => 8, 'name' => 'TC Representative', 'max' => 1],
            ['id' => 9, 'name' => 'NC Representative', 'max' => 1],
            ['id' => 10, 'name' => 'SC Representative', 'max' => 1]
        ]);

        // candidates
        DB::table('candidates')->insert([
            // ISOG
            [
                'party_id' => 2, 
                'position_id' => 1, 
                'name' => 'Ryan Fernando', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 2, 
                'name' => 'Maria Erna Cabarrubias', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 3, 
                'name' => 'Corinthia Marie Empe', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 4, 
                'name' => 'Febie Claire Pacheco', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 5, 
                'name' => 'Rec Gwen Zaragoza', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 6, 
                'name' => 'Jovan Valiente', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 7, 
                'name' => 'Marianne Suerte', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 8, 
                'name' => 'Krysta Eloise Sanchez', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 9, 
                'name' => 'Sam Joselle Parcon', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 2, 
                'position_id' => 10, 
                'name' => 'Kristine Villamor Lusoc', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            // NATO
            [
                'party_id' => 3, 
                'position_id' => 2, 
                'name' => 'Peter Niño Golo', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 3, 
                'position_id' => 3, 
                'name' => 'Bennette Reducto', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 3, 
                'position_id' => 6, 
                'name' => 'Charlotte Yvonne Reyes', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            [
                'party_id' => 3, 
                'position_id' => 10, 
                'name' => 'Jann Andrieh Licayan', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ],
            // Independent
            [
                'party_id' => 1, 
                'position_id' => 6, 
                'name' => 'Cristjan Dave Bael', 
                'image' => '', 
                'color' => '#' . substr(md5(rand()), 0, 6)
            ]
        ]);

    }
}

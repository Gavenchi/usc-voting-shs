<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Campus;
use App\Candidate;
use App\Party;
use App\Position;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // initialize campuses
        Log::info('Seeding campuses...');

        Campus::create(['id' => 0, 'name' => 'All']);
        Campus::create(['id' => 1, 'name' => 'Talamban']);
        Campus::create(['id' => 2, 'name' => 'North']);
        Campus::create(['id' => 3, 'name' => 'South']);
        Campus::create(['id' => 4, 'name' => 'Downtown']);

        // register all students
        Log::info('Beginning seeding students...');
        $this->call(UsersTableSeeder::class);

        // parties
        Log::info('Seeding parties...');
        Party::create(['id' => 1, 'name' => 'Independent', 'color' => '#153A29', 'color_anon' => '#' . substr(md5(rand()), 0, 6)]);
        Party::create(['id' => 2, 'name' => 'ISOG', 'color' => '#072549', 'color_anon' => '#' . substr(md5(rand()), 0, 6)]);
        Party::create(['id' => 3, 'name' => 'NATO', 'color' => '#451312', 'color_anon' => '#' . substr(md5(rand()), 0, 6)]);

        // positions
        Log::info('Seeding positions...');
        Position::create(['id' => 1, 'name' => 'President', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 2, 'name' => 'Vice President', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 3, 'name' => 'Executive Secretary', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 4, 'name' => 'Executive Treasurer', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 5, 'name' => 'Auditor', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 6, 'name' => 'Executive PRO', 'max' => 1, 'campus_id' => 0]);
        Position::create(['id' => 7, 'name' => 'DC Representative', 'max' => 1, 'campus_id' => 4]);
        Position::create(['id' => 8, 'name' => 'TC Representative', 'max' => 1, 'campus_id' => 1]);
        Position::create(['id' => 9, 'name' => 'NC Representative', 'max' => 1, 'campus_id' => 2]);
        Position::create(['id' => 10, 'name' => 'SC Representative', 'max' => 1, 'campus_id' => 3]);

        // candidates
        Log::info('Seeding candidates...');
        // ISOG
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 1, 
            'name' => 'Ryan Fernando', 
            'image' => 'img/candidates/ISOG_FERNANDO_PRES.JPG', 
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 2, 
            'name' => 'Maria Erna Cabarrubias', 
            'image' => 'img/candidates/ISOG_CABARRUBIAS_VP.jpeg',                 
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 3, 
            'name' => 'Corinthia Marie Empe', 
            'image' => 'img/candidates/ISOG_EMPE_SEC.JPG',                
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 4, 
            'name' => 'Febie Claire Pacheco', 
            'image' => 'img/candidates/ISOG_PACHECO_TREASURER.jpg',               
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 5, 
            'name' => 'Rec Gwen Zaragoza', 
            'image' => 'img/candidates/ISOG_ZARAGOZA_AUDIT.JPG',             
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 6, 
            'name' => 'Jovan Valiente', 
            'image' => 'img/candidates/ISOG_VALIENTE_PRO.JPG',              
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 7, 
            'name' => 'Marianne Suerte', 
            'image' => 'img/candidates/ISOG_SUERTE_DC REP.JPG',            
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 8, 
            'name' => 'Krysta Eloise Sanchez', 
            'image' => 'img/candidates/ISOG_SANCHEZ_TC REP.JPG',            
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 9, 
            'name' => 'Sam Joselle Parcon', 
            'image' => 'img/candidates/ISOG_PARCON_NC REP.jpg',            
        ]);
        Candidate::create([
            'party_id' => 2, 
            'position_id' => 10, 
            'name' => 'Kristine Villamor Lusoc', 
            'image' => 'img/candidates/ISOG_LUSOC_SC REP.jpg', 
            
        ]);
        // NATO
        Candidate::create([
            'party_id' => 3, 
            'position_id' => 2, 
            'name' => 'Peter Niño Golo', 
            'image' => 'img/candidates/NATO_GOLO_VP.JPG',         
        ]);
        Candidate::create([
            'party_id' => 3, 
            'position_id' => 3, 
            'name' => 'Bennette Reducto', 
            'image' => 'img/candidates/NATO_REDUCTO_SEC.jpg',        
        ]);
        Candidate::create([
            'party_id' => 3, 
            'position_id' => 6, 
            'name' => 'Charlotte Yvonne Reyes', 
            'image' => 'img/candidates/NATO_REYES_PRO.jpg',        
        ]);
        Candidate::create([
            'party_id' => 3, 
            'position_id' => 10, 
            'name' => 'Jann Andrieh Licayan', 
            'image' => 'img/candidates/NATO_LICAYAN_SC REP.jpg',    
        ]);
        // Independent
        Candidate::create([
            'party_id' => 1, 
            'position_id' => 6, 
            'name' => 'Cristjan Dave Bael', 
            'image' => 'img/candidates/INDEPENDENT_BAEL_PRO.jpg', 
        ]);

    }
}

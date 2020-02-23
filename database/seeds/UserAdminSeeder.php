<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'noraalejandracosta@gmail.com',  
            'password' => bcrypt('noraCosta'),
            'name' => 'Nora Costa'
        ]);

        DB::table('users_roles')->insert([
            'role_id' => 1,  
            'user_id' => 1,
            'state' => 1
        ]);
        
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'roles',
            'permissions',
            'users',
            'users_roles'
        ]);
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('UserAdminSeeder');
    }

    protected function truncateTable(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

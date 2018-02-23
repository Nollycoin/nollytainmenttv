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
        $sql = file_get_contents(database_path().'/seeds/nollytainment.sql');
        \Illuminate\Support\Facades\DB::statement($sql);
    }
}

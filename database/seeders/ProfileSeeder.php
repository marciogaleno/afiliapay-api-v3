<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("profiles")->truncate();
        DB::table('profiles')->insert(['name' => 'Administrator']);
        DB::table('profiles')->insert(['name' => 'Client']);
    }
}

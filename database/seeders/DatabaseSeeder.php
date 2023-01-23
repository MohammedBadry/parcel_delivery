<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++) {
            DB::table('users')->insert([
                'name' => 'sender'.$i,
                'email' => 'sender'.$i.'@parcels.com',
                'type' => 'sender',
                'password' => bcrypt('12345678'),
            ]);
        }
        for($i=1; $i<=10; $i++) {
            DB::table('users')->insert([
                'name' => 'biker'.$i,
                'email' => 'biker'.$i.'@parcels.com',
                'type' => 'biker',
                'password' => bcrypt('12345678'),
            ]);
        }
    }
}

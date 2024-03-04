<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        // Seed new data
        $data = [
            ['id'=>1,'name' => 'Music'],
            ['id'=>2,'name' => 'Singing'],
            ['id'=>3,'name' => 'Cricket'],
            ['id'=>4,'name' => 'Drawing'],
            ['id'=>5,'name' => 'Writing']
        ];
       
        DB::table('hobbies')->insert($data);

    }
}

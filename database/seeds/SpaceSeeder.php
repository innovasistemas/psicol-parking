<?php

use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-101', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-102', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-103', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-104', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-105', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-106', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-107', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-108', 'created_at' => now()]);
        DB::insert('INSERT INTO spaces (description, created_at) 
                    VALUES (:description, :created_at)',
                    ['description' => '1-109', 'created_at' => now()]);
        
    }
}

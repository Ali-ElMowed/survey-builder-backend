<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            DB::table('question_types')->insert([
                'type'=>'muliple choice',
            ]);
            DB::table('question_types')->insert([
                'type'=>'check boxes',
            ]);
            DB::table('question_types')->insert([
                'type'=>'drop down',
            ]);
            DB::table('question_types')->insert([
                'type'=>'date',
            ]);


    }
}

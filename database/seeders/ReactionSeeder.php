<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactions')->insert([

            [
                'reaction_type' => 'fas fa-thumbs-up fa-color1'
            ],
            [
                'reaction_type' => 'fas fa-heart fa-color2'
            ],
            [
                'reaction_type' => 'fas fa-laugh-squint fa-color3'
            ],
            [
                'reaction_type' => 'fas fa-angry fa-color4'
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert(
            [
                [
                    'name' => "Information de base",
                ],
                [
                    'name' => "Experience",
                ],
                [
                    'name' => "Diplome",
                ]
                ,
                [
                    'name' => "Atout",
                ]
                ,
                [
                    'name' => "Competence Generale",
                ]
                ,
                [
                    'name' => "Centre d'interet",
                ]
                ,
                [
                    'name' => "Competence Informatique",
                ]
                ,
                [
                    'name' => "Langue",
                ]
                ,




                [
                    'name' => "Contenus libre",
                ]
                ,
                [
                    'name' => "Reseaux Sociaux",
                ]
                ,
                [
                    'name' => "Experience Associative",
                ]
                ,
                [
                    'name' => "Voyage",
                ]
            ]

        );


    }
}

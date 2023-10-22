<?php

namespace Database\Seeders;

use App\Models\Modules;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modules::create([
            'libelle' => 'C',
        ]);

        Modules::create([
            'libelle' => 'Algorithme',
        ]);

        Modules::create([
            'libelle' => 'Html & CSS',
        ]);

        Modules::create([
            'libelle' => 'Javascript',
        ]);

        Modules::create([
            'libelle' => 'Php',
        ]);

        Modules::create([
            'libelle' => 'Laravel',
        ]);

        Modules::create([
            'libelle' => 'Angular',
        ]);

        Modules::create([
            'libelle' => 'Gestion de Projet',
        ]);
    }
}

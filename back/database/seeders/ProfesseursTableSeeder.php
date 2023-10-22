<?php

namespace Database\Seeders;

use App\Models\Professeurs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesseursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Professeurs::create([
            'name' => 'Birane Bailla Wane',
            'grade' => 'Professor',
            'specialite' => 'Develloppeur',
        ]);

        Professeurs::create([
            'name' => 'Aly tall Niang',
            'grade' => 'Associate Professor',
            'specialite' => 'Develloppeur',
        ]);

        Professeurs::create([
            'name' => 'Djibril',
            'grade' => 'Professor',
            'specialite' => 'Reference Digital',
        ]);

        Professeurs::create([
            'name' => 'Professeur 4',
            'grade' => 'Grade 4',
            'specialite' => 'Spécialité 4',
        ]);

        Professeurs::create([
            'name' => 'Professeur 5',
            'grade' => 'Grade 5',
            'specialite' => 'Spécialité 5',
        ]);

        Professeurs::create([
            'name' => 'Professeur 6',
            'grade' => 'Grade 6',
            'specialite' => 'Spécialité 6',
        ]);

        Professeurs::create([
            'name' => 'Professeur 7',
            'grade' => 'Grade 7',
            'specialite' => 'Spécialité 7',
        ]);

    }
}

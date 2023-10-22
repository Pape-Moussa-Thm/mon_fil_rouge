<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->truncate();

        // Créez au moins 7 classes différentes
        $classes = [
            ['libelle' => 'Classe A', 'filieres_id' => 1, 'niveau_id' => 1],
            ['libelle' => 'Classe B', 'filieres_id' => 2, 'niveau_id' => 2],
            ['libelle' => 'Classe C', 'filieres_id' => 3, 'niveau_id' => 3],
            ['libelle' => 'Classe D', 'filieres_id' => 1, 'niveau_id' => 2],
            ['libelle' => 'Classe E', 'filieres_id' => 2, 'niveau_id' => 1],
            ['libelle' => 'Classe F', 'filieres_id' => 3, 'niveau_id' => 1],
            ['libelle' => 'Classe G', 'filieres_id' => 1, 'niveau_id' => 3],
        ];

        // Insérez les classes dans la base de données
        foreach ($classes as $classeData) {
            Classes::create($classeData);
        }
    }
}

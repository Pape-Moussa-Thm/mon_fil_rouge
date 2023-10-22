<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Pape Moussa Thiam',
            'login' => 'thiampapemoussa9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 1, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Awa Fagou katt',
            'login' => 'EvaFagou9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 2, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Birane Bailla Wane',
            'login' => 'Douv9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 1, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Aly Tall Niang',
            'login' => 'Niang9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 2, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Djibril',
            'login' => 'Djibril9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 1, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Silmane Sarr',
            'login' => 'Sarr9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 2, // Remplacez par l'ID du rôle approprié
        ]);

        User::create([
            'nom' => 'Babacar Diop',
            'login' => 'Diop9@gmail.com',
            'password' => bcrypt('Nordfoire1@'),
            'role_id' => 1, // Remplacez par l'ID du rôle approprié
        ]);

    }
}

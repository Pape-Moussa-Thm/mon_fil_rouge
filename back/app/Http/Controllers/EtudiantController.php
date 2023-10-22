<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\CourClasses;
use App\Models\Cours;
use App\Models\Etudiants;
use App\Models\Inscriptions;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
    public function getEtudiantCour($coursId) {
        $cours = Cours::findOrFail($coursId);
        $classesAssociees = $cours->classes; // Assurez-vous que votre modèle Cours a une relation avec les classes
        $classesAssocieesId=$classesAssociees;
    // dd($classesAssociees);
        $etudiants = collect();
    //  dd($etudiants);
        foreach ($classesAssociees as $classe) {
            $etudiantsDeCetteClasse = $classe->etudiants;
            $etudiants = $etudiants->merge($etudiantsDeCetteClasse);
            // dd($etudiants);
        }

        return response()->json($etudiants);
    }

    public function getEtudiantsByCours($coursId)
{
    $cours = Cours::findOrFail($coursId);
    $etudiants = $cours->classes->flatMap(function($classe) {
        return $classe->etudiants;
    });

    return response()->json($etudiants);
}
public function getEtudiantsByClasse($classeId)
{
    $etudiants = Inscriptions::where('classes_id', $classeId)->get();

    return response()->json(['etudiants' => $etudiants]);
}

public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'classes_id' => 'required|exists:classes,id', // Assurez-vous que la classe existe
    ]);

    // Créez un nouvel étudiant
    $etudiant = Etudiants::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'date_naissance' => $request->input('date_naissance'),
    ]);

    // Enregistrez l'inscription de l'étudiant dans une classe
    Inscriptions::create([
        'etudiants_id' => $etudiant->id,
        'classes_id' => $request->input('classes_id'),
    ]);

    return response()->json(['message' => 'Étudiant inséré avec succès', 'etudiant' => $etudiant], 201);
}

}

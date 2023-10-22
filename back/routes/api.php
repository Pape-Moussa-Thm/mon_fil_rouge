<?php

use App\Http\Controllers\AnneeController;
use App\Http\Controllers\AttacheController;
use Illuminate\Http\Request;
use App\Http\Resources\UserRessource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Sessions;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/cours', [CourController::class, 'store']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::get('users', [UserController::class, 'allUsers']);

    Route::post('logout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out'], 200);
    });
    Route::get('sessionprof', [SessionController::class, 'getSessionProf']);

    Route::get('/encours', [CourController::class, 'getCoursNonTermines']);
    Route::get('/terminer', [CourController::class, 'getCoursTermines']);

    Route::post('/classes', [ClasseController::class, 'store']);
    Route::get('/classes', [ClasseController::class, 'index']);
    Route::get('/planifier', [ClasseController::class, 'getClassesPlanifiees']);
    Route::post('/classeplanifier ', [ClasseController::class, 'planifierClasses']);
    Route::get('/filiere', [ClasseController::class, 'getFiliere']);


    Route::post('/annees', [AnneeController::class, 'creeAnnes']);
    Route::get('/annees', [AnneeController::class, 'index']);
    Route::post('/inscription', [InscriptionController::class, 'store']);
    Route::get('/etudiant', [InscriptionController::class, 'index']);


    Route::post('/professeurs', [ProfesseurController::class, 'store']);
    Route::get('/professeurs', [ProfesseurController::class, 'index']);

    Route::post('/salles', [SalleController::class, 'store']);
    Route::get('/salles', [SalleController::class, 'index']);

    Route::post('/semestres', [SemestreController::class, 'store']);
    Route::get('/semestres', [SemestreController::class, 'index']);


    Route::get('/modules', [ModuleController::class, 'index']);
    Route::get('cours/classe', [CourController::class, 'getCourclasse']);
    Route::get('courprof', [CourController::class, 'getCourprof']);
    Route::get('/classes/{classeId}/etudiants', [EtudiantController::class, 'getEtudiantsByClasse']);
    Route::get('/etudiants/{coursId}', [CourController::class, 'show']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('cours/classe', [CourController::class, 'getCourclasse']);



    Route::get('user', function (Request $request) {
        return new UserRessource($request->user());
    });
    Route::get('/nonplanifier', [ClasseController::class, 'getClassesNonPlanifiees']);

    Route::get('user', [UserController::class, 'allUsers']);

    Route::post('logout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out'], 200);
    });
});
Route::post('user', [UserController::class, 'store']);

    Route::get('/cours', [CourController::class, 'index']);

// Route::match(['get', 'post'], 'api/inscription', [InscriptionController::class,'store']);
// {
//   "password":"nordfoire1@",
//   "login":"Moisa"

//   }




Route::post('/modules', [ModuleController::class, 'store']);



Route::get('/sessions', [SessionController::class, 'index']);
Route::delete('/session/{sessionId}/annuler', [SessionController::class, 'annulerSession']);
Route::middleware(['auth:api', 'role:responsable'])->group(function () {
    Route::get('user', function (Request $request) {
        return new UserRessource($request->user());
    });
});
Route::get('cours/{id}/classes', [CourController::class, 'getClassesByCours']);



Route::middleware(['auth:api', ])->group(function () {
    Route::get('user', function (Request $request) {
        return new UserRessource($request->user());
    });

    Route::get('users', [UserController::class, 'allUsers']);


    Route::post('logout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out'], 200);
    });
    Route::get('courprof', [CourController::class, 'getCourprof']);
    Route::post('/demandes', [ProfesseurController::class, 'demandeAnnulation']);
    Route::get('/sessions/professeur/mois', [ProfesseurController::class, 'NbrHeure']);
    Route::get('nbrHeure/module', [ProfesseurController::class, 'NbrHeureModule']);
});
Route::get('demandes', [AttacheController::class, 'getDemandesEnAttente']);
Route::middleware(['auth:api', 'role:attacher'])->group(function () {
});

Route::middleware(['auth:api', 'role:etudiant'])->group(function () {
});


Route::get('/session/{id}/annuler', [SessionController::class, 'annulerSession']);

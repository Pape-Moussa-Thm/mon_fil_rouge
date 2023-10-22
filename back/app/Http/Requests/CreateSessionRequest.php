<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSessionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'etat' => 'nullable|in:attente,confirmer',
            'cours_id' => 'required|exists:cours,id',
            'attache_id' => 'nullable|exists:attaches,id',
            'responsables_id' => 'nullable|exists:responsables,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
             'heure_fin' => 'required',
            'salles_id' => 'nullable|exists:salles,id',
            'classes_id' => 'required|exists:cours,id',

        ];
    }
}

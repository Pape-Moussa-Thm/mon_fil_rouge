<?php

namespace App\Http\Resources;
use App\Http\Resources\CoursclasseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'mode' => $this->mode,
            'date' => $this->date,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'duree' => $this->duree,
            'etat' => $this->etat,
            'attache_id' => $this->attache_id,
            'responsables_id' => $this->responsables_id,
            'salle' => $this->salle ? [
                'id' => $this->salle->id,
                'nom' => $this->salle->nom,
                // Autres propriétés de la salle que vous voulez inclure
            ] : null,
            'cours' => new CoursclasseResource($this->cours)            // Ajoutez d'autres champs si nécessaire
        ];
    }
}

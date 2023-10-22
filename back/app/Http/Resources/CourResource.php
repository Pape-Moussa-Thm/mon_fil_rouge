<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourResource extends JsonResource
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
            'modules_id' => $this->modules_id,
            'semestres_id' => $this->semestres_id,
            'professeurs_id' => $this->professeurs,
            'nbr_heure' => $this->nbr_heure,
            'semestre' => $this->semestre,
            'module' => $this->module,
            'classes' => $this->classes
        ];
    }
}

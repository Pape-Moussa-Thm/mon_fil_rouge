<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sessions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [
    ];
    public function cours()
    {
    return $this->belongsTo(CourClasses::class,'cour_classes_id');
    }
    public function classe()
    {
    return $this->belongsTo(Classes::class,'classes_id');
    }
    public function salle()
    {
        return $this->belongsTo(Salles::class, 'salles_id'); // Assurez-vous d'ajuster le nom de la clé étrangère si nécessaire
    }
    public function demande()
    {
        return $this->hasOne(Demandes::class, 'sessions_id');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'password',
        'login',
        'role_id',
        'etudiant_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function findForPassport($login)
    {
        return $this->where('login', $login)->first();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function professeur()
    {
        return $this->belongsTo(Professeurs::class, 'professeur_id');
    }

    public function etudiant()
    {
        return $this->hasOne(Etudiants::class, 'user_id');
    }

    // Autres relations...

    public function responsable()
    {
        return $this->hasOne(Responsables::class, 'user_id');
    }

    public function attacher()
    {
        return $this->hasOne(Attaches::class, 'user_id');
    }
    
}

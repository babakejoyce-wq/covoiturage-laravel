<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ville_depart',
        'lieu_depart',
        'ville_arrivee',
        'lieu_arrivee',
        'date_trajet',
        'places',
    ];

    protected $casts = [
        'date_trajet' => 'datetime',
    ];

    // Relation avec l'utilisateur (conducteur)
    public function user() 
    {
     return $this->belongsTo(User::class);
    }

    // Relation avec le véhicule (via l'utilisateur)
    public function vehicle()
    {
        return $this->hasOneThrough(Vehicle::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    // Scope pour les trajets futurs
    public function scopeFutur($query)
    {
        return $query->where('date_trajet', '>=', now());
    }

    // Scope pour les trajets passés
    public function scopePasse($query)
    {
        return $query->where('date_trajet', '<', now());
    }
    // Vérifier s'il reste des places
    public function hasAvailableSeats()
    {
        return $this->places > 0;
    }
}

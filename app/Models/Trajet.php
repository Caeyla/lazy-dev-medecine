<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ViewModeling\admin\trajet\TrajetModeling;
class Trajet extends SimpleModel
{
    use HasFactory;
    protected $table = 'trajet';

    protected $fillable=[
        'vehicule_id',
        'lieudepart_id',
        'datedepart',
        'motif',
        'kilometragedebut',
        'quantitecarburant',
        'montantcarburant',
        'lieuarrivee_id',
        'datearrivee',
        'kilometragefin',
    ];

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function getNomVehicule(){
        return $this->vehicule->matricule;
    }

    public function getNomLieuDepart(){
        return $this->lieudepart->designation;
    }
    public function lieudepart(){
        return $this->belongsTo(Lieu::class);
    }

    public function lieuarrivee(){
        return $this->belongsTo(Lieu::class);
    }
}

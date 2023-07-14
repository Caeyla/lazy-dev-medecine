<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ViewModeling\admin\vehicule\VehiculeModeling;

class Vehicule extends SimpleModel
{
    use HasFactory;
    protected $table = 'vehicule';
    protected $fillable = [
        'marque_id',
        'modele',
        'matricule',
        'type_id',
        'chauffeur_id',
    ];


    public function __construct()
    {
        $this->createModeling = VehiculeModeling::getCreateModelingCrud();
        $this->listModeling = VehiculeModeling::getListModelingCrud();
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }


    public function echeance()
    {
        return $this->belongsToMany(Echeance::class, 'echeancevehicule', 'vehicule_id', 'echeance_id');
    }

    public function getNomMarque()
    {
        return $this->marque->designation;
    }

    public function getNomType()
    {
        return $this->type->designation;
    }

    public function getNomChauffeur()
    {
        return $this->chauffeur->nom;
    }
}

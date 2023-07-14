<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcheanceVehicule extends HasNoId
{
    use HasFactory;
    protected $table = 'echeancevehicule';
    protected $fillable = ['echeance_id', 'vehicule_id','montant','datedebut','datefin','status'];

    protected $dates = ['datedebut', 'datefin'];
    public function echeance()
    {
        return $this->belongsTo(Echeance::class);
    }

    public function getDayLeft(){
        $now=now();
        $datefin=$this->datefin;
        $diff=$now->diffInDays($datefin);
        return $diff;
    }

    public function getStyleForDayLeft(){
        $dayLeft=$this->getDayLeft();
        if($dayLeft<15){
            return 'red';
        }else if($dayLeft<30){
            return 'yellow';
        }
        return 'green';
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function getNomVehicule()
    {
        return $this->vehicule->matricule;
    }

    public function getNomEcheance()
    {
        return $this->echeance->designation;
    }

    public function getNomChauffeur()
    {
        return $this->vehicule->chauffeur->nom;
    }

}

<?php

namespace App\Models;

use App\ViewModeling\admin\echeance\EcheanceModeling;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Echeance extends SimpleModel
{
    use HasFactory;
    protected $table = 'echeance';
    public $timestamps = false;

    public function __construct() {
        $this->createModeling = EcheanceModeling::getCreateModelingCrud();
        $this->listModeling = EcheanceModeling::getListModelingCrud();
    }

    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'echeancevehicule', 'echeance_id', 'vehicule_id');
    }
}

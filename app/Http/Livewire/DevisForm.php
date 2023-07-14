<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DevisForm extends Component
{
    public $artistes;
    public $autreDepenses;
    public $logistiques;
    public $sonorisations;
    public $lieux;
    public $artistesSelected=[];

    public function mount(){
        $this->artistes = \App\Models\Artiste::all();
        $this->autreDepenses = \App\Models\AutreDepense::all();
        $this->logistiques = \App\Models\Logistique::all();
        $this->sonorisations = \App\Models\Sonorisation::all();
        $this->lieux = \App\Models\Lieu::all();
    }

    public function addArtiste($id){
        $this->artistesSelected[] = $id;
    }

    public function render()
    {
        return view('livewire.devis-form');
    }
}

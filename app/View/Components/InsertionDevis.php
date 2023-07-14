<?php

namespace App\View\Components\devis;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InsertionDevis extends Component
{
    public $artistes;
    public $autreDepenses;
    public $logistiques;
    public $sonorisations;
    public $lieux;
    public function __construct()
    {
        $this->artistes = \App\Models\Artiste::all();
        $this->autreDepenses = \App\Models\AutreDepense::all();
        $this->logistiques = \App\Models\Logistique::all();
        $this->sonorisations = \App\Models\Sonorisation::all();
        $this->lieux = \App\Models\Lieu::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.insertion-devis');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Devis;
class ListDevis extends Component
{
    /**
     * Create a new component instance.
     */
    public $devis=[];
    public $autreDepenses;
    public $logistiques;
    public $sonorisations;
    public $lieux;

    public function __construct()
    {
        $id_emp=4; //id de l'employé connecté
        $this->devis = Devis::where('emp_id',$id_emp)->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-devis');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Echeance;
use App\Models\EcheanceVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcheanceController extends Controller
{
    public function initAdd()
    {
        $data = $this->provideAddEcheanceData();
        $vehicules = Vehicule::all();
        $echeances = Echeance::all();
        return view('echeance.addEcheance', ['data' => $data, 'vehicules' => $vehicules, 'echeances' => $echeances]);
    }
    public function initList()
    {
        $data = EcheanceVehicule::where('status', 1)->paginate(10);
        $metaData = [
            'listHeader' => ['Vehicule', 'Chauffeur', 'montant', 'date debut', 'date fin', 'echeance'],
            'listCall' => ['getNomVehicule', 'getNomChauffeur', 'montant', 'datedebut', 'datefin', 'getNomEcheance']
        ];
        return view('echeance.list', ['data' => $data, 'metaData' => $metaData]);
    }

    public function performAdd(Request $request)
    {
        DB::transaction(function () use ($request) {
            $echeanceVehicule = new EcheanceVehicule();
            $echeanceVehicule->vehicule_id = $request->vehicule_id;
            $echeanceVehicule->echeance_id = $request->echeance_id;
            $echeanceVehicule->datedebut = $request->datedebut;
            $echeanceVehicule->datefin = $request->datefin;
            $echeanceVehicule->montant = $request->montant;
            EcheanceVehicule::where('vehicule_id', $request->vehicule_id)
                ->where('echeance_id', $request->echeance_id)
                ->where('status', 1)
                ->update(['status' => 0]);
            $echeanceVehicule->status = 1;
            $echeanceVehicule->save();
        });
        return redirect('/echeance/list');
    }
    function provideAddEcheanceData()
    {
        $link = '/echeance/performAdd';
        $fields = ['datedebut', 'datefin', 'montant'];
        $date = ['datedebut', 'datefin'];
        $data = [
            'link' => $link,
            'fields' => $fields,
            'date' => $date,
            'buttonLabel' => 'Ajouter'
        ];
        return $data;
    }
}

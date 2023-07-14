<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Trajet;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function initAddDepart()
    {
        $data = $this->provideAddDepartData();
        $vehicules = Vehicule::all();
        $lieux = Lieu::all();
        return view('trajet.addDepart', ['data' => $data, 'lieux' => $lieux, 'vehicules' => $vehicules]);
    }

    public function initAddArrive(Request $request)
    {
        $trajet_id = $request['trajet_id'];
        $data = $this->provideAddArriveData($trajet_id);
        $lieux = Lieu::all();
        return view('trajet.arrivee', ['data' => $data, 'lieux' => $lieux]);
    }

    public function performAddDepart(Request $request)
    {
        // return back()->withErrors(['message' => 'Veuillez remplir tous les champs'])->withInput();
        $trajet = new Trajet();
        $trajet->vehicule_id = $request->vehicule_id;
        $trajet->lieudepart_id = $request->lieudepart_id;
        $trajet->datedepart = $request->datedepart;
        $trajet->motif = $request->motif;
        $trajet->kilometragedebut = $request->kilometrage;
        $trajet->save();
        return redirect('/trajet/list');
    }

    public function performAddArrive(Request $request, $trajet_id)
    {
        $trajet = Trajet::find($trajet_id);
        $trajet->lieuarrive_id = $request->lieuarrive_id;
        $trajet->datearrive = $request->datearrive;
        $trajet->kilometragefin = $request->kilometragefin;
        $trajet->montantcarburant = $request->montantcarburant;
        $trajet->quantitecarburant = $request->quantitecarburant;
        $trajet->save();
        return redirect('/trajet/list');
    }
    public function list()
    {
        $trajets = Trajet::paginate(10);
        $metaData = [
            'listHeader' => ['Vehicule', 'Lieu De depart', 'Date Heure Depart', 'Motif', 'Kilometrage debut'],
            'listCall' => ['getNomVehicule', 'getNomLieuDepart', 'datedepart', 'motif', 'kilometragedebut']
        ];
        return view('trajet.list', ['data' => $trajets, 'metaData' => $metaData]);
    }


    function provideAddArriveData($trajet_id)
    {
        $link = '/trajet/performAddArrive/' . $trajet_id;
        $fields = ['datearrive', 'kilometragefin', 'montantcarburant', 'quantitecarburant'];
        $datetime = ['datearrive'];
        $data = [
            'link' => $link,
            'fields' => $fields,
            'datetime' => $datetime,
            'buttonLabel' => 'Ajouter'
        ];
        return $data;
    }

    function provideAddDepartData()
    {
        $link = '/trajet/performAddDepart';
        $fields = ['datedepart', 'motif', 'kilometrage'];
        $datetime = ['datedepart'];
        $data = [
            'link' => $link,
            'fields' => $fields,
            'datetime' => $datetime,
            'buttonLabel' => 'Ajouter'
        ];
        return $data;
    }
}

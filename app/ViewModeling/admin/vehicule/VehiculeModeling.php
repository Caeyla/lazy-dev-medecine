<?php
    namespace App\ViewModeling\admin\vehicule;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
    use App\Models\Marque;
    use App\Models\Chauffeur;
    use App\Models\Type;
class VehiculeModeling{
    public static function getListModelingCrud(){
        $listVehicule = new ListModeling();
        $listVehicule->listHeader=[
            'id',
            'modele',
            'marque',
            'immatriculation',
            'chauffeur',
            'type'
        ];
        $listVehicule->listCall=[
            'id',
            'modele',
            'getNomMarque',
            'matricule',
            'getNomChauffeur',
            'getNomType',
        ];
        $listVehicule->searchable=[
            'marque',
            'modele',
            'type',
        ];


        return $listVehicule;
    }

    public static function getCreateModelingCrud(){
        $formvec = new FormModeling();
        $formvec->fields=[
            'marque_id',
            'modele',
            'matricule',
            'type_id',
            'chauffeur_id',
        ];
        $formvec->select=[
            'marque_id',
            'type_id',
            'chauffeur_id',
        ];

        $formvec->callableMethod['selectMarque_id'] =
            function (){
            $marques=Marque::all();
            return $data=[
                'data' => $marques,
                'name' => 'marque_id',
                'intitule' => 'designation' ,
                'label' => 'marque'
            ];
        };

        $formvec->callableMethod['selectChauffeur_id'] = function (){
            $chauffeurs=Chauffeur::all();
            return $data=[
                'data' => $chauffeurs,
                'name' => 'chauffeur_id',
                'intitule' => 'nom' ,
                'label' => 'chauffeur'
            ];
        };


        $formvec->callableMethod['selectType_id'] = function(){
            $types=Type::all();
            return $data=[
                'data' => $types,
                'name' => 'type_id',
                'intitule' => 'designation' ,
                'label' => 'Type'
            ];
        };

        $formvec->actionModel="Vehicule";

        $formvec->intituleBtn="Ajouter";
        return $formvec;
    }
}

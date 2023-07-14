<?php
    namespace App\ViewModeling\admin\chauffeur;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
    use App\Models\Marque;
    use App\Models\Chauffeur;
    use App\Models\Type;
class ChauffeurModeling{
    public static function getListModelingCrud(){
        $listVehicule = new ListModeling();
        $listVehicule->listHeader=[
            'id',
            'date de naissance',
            'nom'
        ];
        $listVehicule->listCall=[
            'id',
            'datenaissance',
            'nom',

        ];
        $listVehicule->searchable=[
            'nom',
            'datenaissance',
        ];


        return $listVehicule;
    }

    public static function getCreateModelingCrud(){
        $formvec = new FormModeling();
        $formvec->fields=[
            'nom',
            'datenaissance'
        ];
        $formvec->date=['datenaissance'];
        $formvec->actionModel="Chauffeur";
        $formvec->intituleBtn="Ajouter";

        return $formvec;
    }
}

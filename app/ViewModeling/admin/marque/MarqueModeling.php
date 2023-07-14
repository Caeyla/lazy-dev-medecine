<?php
    namespace App\ViewModeling\admin\marque;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
    use App\Models\Marque;
    use App\Models\Chauffeur;
    use App\Models\Type;
class MarqueModeling{
    public static function getListModelingCrud(){
        $listVehicule = new ListModeling();
        $listVehicule->listHeader=[
            'id',
            'designation',
        ];
        $listVehicule->listCall=[
            'id',
            'designation',
        ];

        $listVehicule->searchable=[
            'designation',
        ];
        return $listVehicule;
    }

    public static function getCreateModelingCrud(){
        $formvec = new FormModeling();
        $formvec->fields=[
            'designation',
        ];
        $formvec->actionModel="Marque";
        $formvec->intituleBtn="Ajouter";

        return $formvec;
    }
}

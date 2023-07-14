<?php
    namespace App\ViewModeling\admin\type;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
    use App\Models\Marque;
    use App\Models\Chauffeur;
    use App\Models\Type;
class TypeModeling{
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
        $formvec->actionModel="Type";
        $formvec->intituleBtn="Ajouter";

        return $formvec;
    }
}

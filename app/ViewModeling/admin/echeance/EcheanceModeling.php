<?php
    namespace App\ViewModeling\admin\echeance;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
class EcheanceModeling{
    public static function getListModelingCrud(){
        $listEcheance = new ListModeling();
        $listEcheance->listHeader=[
            'id',
            'designation',
        ];
        $listEcheance->listCall=[
            'id',
            'designation',
        ];

        $listEcheance->searchable=[
            'designation',
        ];
        return $listEcheance;
    }

    public static function getCreateModelingCrud(){
        $formvec = new FormModeling();
        $formvec->fields=[
            'designation',
        ];
        $formvec->actionModel="Echeance";
        $formvec->intituleBtn="Ajouter";

        return $formvec;
    }
}

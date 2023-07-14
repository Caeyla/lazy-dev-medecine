<?php
    namespace App\ViewModeling\admin\maintenance;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
class MaintenanceModeling{
    public static function getListModelingCrud(){
        $list = new ListModeling();
        $list->listHeader=[
            'id',
            'designation',
        ];
        $list->listCall=[
            'id',
            'designation',
        ];

        $list->searchable=[
            'designation',
        ];
        return $list;
    }

    public static function getCreateModelingCrud(){
        $formvec = new FormModeling();
        $formvec->fields=[
            'designation',
        ];
        $formvec->actionModel="Maintenance";
        $formvec->intituleBtn="Ajouter";

        return $formvec;
    }
}

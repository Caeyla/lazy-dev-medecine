<?php
    namespace App\ViewModeling\admin\lieu;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
class LieuModeling{
    public static function getListModelingCrud(){
        $listLieu = new ListModeling();
        $listLieu->listHeader=[
            'id',
            'designation',
        ];
        $listLieu->listCall=[
            'id',
            'designation',
        ];
        $listLieu->searchable=[
            'designation'
        ];

        return $listLieu;
    }

    public static function getCreateModelingCrud(){
        $formLieu = new FormModeling();
        $formLieu->fields=[
            'designation',
        ];
        $formLieu->actionModel="Lieu";

        $formLieu->intituleBtn="Lieu";
        return $formLieu;
    }
}

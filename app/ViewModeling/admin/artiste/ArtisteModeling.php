<?php
    namespace App\ViewModeling\admin\artiste;
    use App\ViewModeling\baseClass\FormModeling;
    use App\ViewModeling\baseClass\ListModeling;
class ArtisteModeling{
    public static function getListModelingCrud(){
        $listArtiste = new ListModeling();
        $listArtiste->listHeader=[
            'idArtiste',
            'nom',
            'email',
            'prenom',
            'tarif',
            'photo_artiste',
            'statut'
        ];
        $listArtiste->listCall=[
            'id',
            'nom',
            'prenom',
            'email',
            'tarif',
            'photo_artiste',
            'statut'
        ];
        $listArtiste->searchable=[
            'nom',
            'prenom',
            'tarif',
            'statut'
        ];
        $listArtiste->between=[
            'tarif'
        ];

        $listArtiste->img=[
            'photo_artiste'
        ];

        return $listArtiste;
    }

    public static function getCreateModelingCrud(){
        $formartiste = new FormModeling();
        $formartiste->fields=[
            'nom',
            'prenom',
            'datenaissance',
            'email',
            'tarif',
            'statut',
            'photo_artiste'
        ];

        $formartiste->date=[
            'datenaissance'
        ];

        $formartiste->img=[
            'photo_artiste'
        ];

        $formartiste->actionModel="Artiste";

        $formartiste->intituleBtn="Ajouter";
        return $formartiste;
    }
}

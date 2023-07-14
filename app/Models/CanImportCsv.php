<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CanImportCsv extends SimpleModel
{
    use HasFactory;
    public function hydrateFromCsv($csvFile){
        $csvData = $this->getContents($csvFile);
        $data=$this->getData($csvData);
        $headers=$this->getTitle($csvData);
        foreach ($data as $row) {
            $model = $this->newInstance([], true);
            foreach ($headers as $key => $header) {
                $model->$header = $row[$key];
            }
            $model->save();
        }
    }
    function getTitle($lines){
        // renvoie le titre du fichier csv [0]
        $title = array_shift($lines);
        return $title;
    }
    function getData($lines){
        // renvoie les données du fichier csv [1:]
        $data = array_slice($lines, 1);
        return $data;
    }
}

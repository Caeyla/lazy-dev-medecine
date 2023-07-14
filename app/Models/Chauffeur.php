<?php

namespace App\Models;
use App\ViewModeling\admin\chauffeur\ChauffeurModeling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends SimpleModel
{
    use HasFactory;
    protected $table = 'chauffeur';
    public function __construct() {
        parent::__construct($this->fillable, $this->table);
        $this->createModeling = ChauffeurModeling::getCreateModelingCrud();
        $this->listModeling = ChauffeurModeling::getListModelingCrud();
    }

}

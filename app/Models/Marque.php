<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ViewModeling\admin\marque\MarqueModeling;
class Marque extends SimpleModel
{
    use HasFactory;
    public $table='marque';
    public function __construct() {
        parent::__construct($this->fillable, $this->table);
        $this->createModeling = MarqueModeling::getCreateModelingCrud();
        $this->listModeling = MarqueModeling::getListModelingCrud();
    }

}

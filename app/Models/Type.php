<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\ViewModeling\admin\type\TypeModeling;
class Type extends CanImportCsv
{
    use HasFactory;
    protected $table='type';
    public function __construct() {
        $this->createModeling = TypeModeling::getCreateModelingCrud();
        $this->listModeling = TypeModeling::getListModelingCrud();
    }
}

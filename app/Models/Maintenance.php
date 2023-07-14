<?php

namespace App\Models;

use App\ViewModeling\admin\maintenance\MaintenanceModeling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Maintenance extends SimpleModel
{
    use HasFactory;
    protected $table = 'maintenance';
    public $timestamps = false;

    public function __construct() {
        $this->createModeling = MaintenanceModeling::getCreateModelingCrud();
        $this->listModeling = MaintenanceModeling::getListModelingCrud();
    }
}

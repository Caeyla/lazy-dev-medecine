<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ViewModeling\admin\lieu\LieuModeling;

class Lieu extends SimpleModel
{
    use HasFactory;
    protected $table = 'lieu';
    protected $fillable=[
        'designation',
    ];
    public function __construct() {
        $this->createModeling = LieuModeling::getCreateModelingCrud();
        $this->listModeling = LieuModeling::getListModelingCrud();
    }
}

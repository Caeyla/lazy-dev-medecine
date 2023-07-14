<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasNoId extends SimpleModel
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $keyType = null;
}

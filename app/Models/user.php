<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class user extends Model
{
    use HasFactory;
    protected $table='users';
    public $timestamps=true;
    use SoftDeletes;

    
}

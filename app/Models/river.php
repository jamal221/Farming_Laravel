<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class river extends Model
{
    use HasFactory;
    protected $table='river';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'sensor_depth',
        'pip_size',
        'height',
        ];
}

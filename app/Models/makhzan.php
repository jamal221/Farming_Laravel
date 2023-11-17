<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class makhzan extends Model
{
    use HasFactory;
    protected $table='makhzan';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'type_tank',
        'length',
        'width',
        'height',
        'buildTime',
        'applyTime',
        'water_height',
        'inside_water'
        ];
}

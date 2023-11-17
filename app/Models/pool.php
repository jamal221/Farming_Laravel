<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pool extends Model
{
    use HasFactory;
    protected $table='pool';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'type_pool',
        'lenght',
        'width',
        'depth',
        'buildTime',
        'applyTime',
        'water_height',
        'inside_water'
        ];
}

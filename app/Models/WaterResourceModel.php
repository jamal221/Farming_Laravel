<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaterResourceModel extends Model
{
    use HasFactory;
    protected $table='water_analyze';
    /*
    ResourceID=1;  shows chah
    ResourceID=2;  shows channel
    ResourceID=3;  shows makhzan
    ResourceID=4;  shows netpipe
    ResourceID=5;  shows river
    ResourceID=6;  shows pool
    */
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        // Please add all of the fields here
        ];
}

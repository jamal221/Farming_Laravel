<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class channel extends Model
{
    use HasFactory;
    protected $table='channel';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'width',
        'valveSize',
        'heightWaterSensor'
        ];
}

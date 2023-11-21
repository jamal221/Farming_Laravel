<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class electro_pump extends Model
{
    use HasFactory;
    protected $table='electro_pomp';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'model',
        'Voltage',
        'Frequency',
        'Phase',
        'Current',
        'Power_factor',
        'kw',
        'HP',
        'Duty',
        'SN'
        ];
}

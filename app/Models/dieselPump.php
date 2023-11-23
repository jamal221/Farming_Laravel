<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dieselPump extends Model
{
    use HasFactory;
    protected $table='diesel_pump';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'model',
        'Q_debby',
        'H_Head',
        'H_min',
        'H_max',
        'kw',
        'HP',
        'RPM',
        'SN'
        ];
}

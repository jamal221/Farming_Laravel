<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fertilize_tank extends Model
{
    use HasFactory;
    protected $table='fertilize_tank';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'InjectionSystem',
        'type',
        'fertilizers',
        'tank_amount',
        'input_pip_num',
        'out_pip_num',
        'control_debby_pip_num',
        'check_tank_num',
        'farmID'
        ];
}

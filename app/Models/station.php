<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class station extends Model
{
    use HasFactory;
    protected $table='station';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'out_BAR',
        'present_BAR'
        ];
}

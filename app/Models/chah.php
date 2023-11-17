<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class chah extends Model
{
    use HasFactory;
    protected $table='chah';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'type',
        'bodyType',
        'waterHeight',
        'chahHeight',
        'wateramount',
        'year',
        'useYear'
        ];
}

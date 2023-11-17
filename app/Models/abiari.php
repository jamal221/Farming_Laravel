<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class abiari extends Model
{
    use HasFactory;
    protected $table='abiari';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'duration',
        'time'
        ];
}

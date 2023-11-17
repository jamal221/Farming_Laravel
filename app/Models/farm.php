<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class farm extends Model
{
    use HasFactory;
    protected $table='farm';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farm_size',
        'farm_unit'
        ];
}

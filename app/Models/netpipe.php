<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class netpipe extends Model
{
    use HasFactory;
    protected $table='netpipe';
    public $timestamps=true;
    use SoftDeletes;
    protected $fillable=[
        'farmID',
        'type',
        'netpipD',
        'pipwaterD'
        ];
}

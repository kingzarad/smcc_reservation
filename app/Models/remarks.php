<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class remarks extends Model
{
    use HasFactory;
    protected $table = 'remarks';


    protected $fillable = [
        'remarks_msg',
        'reservation_id'
    ];
}



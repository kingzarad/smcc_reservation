<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelOrder extends Model
{
    use HasFactory;

    protected $table = 'travelers';

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'image',
        'status'
    ];


}

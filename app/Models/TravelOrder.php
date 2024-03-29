<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelOrder extends Model
{
    use HasFactory;

    protected $table = 'travelers';

    protected $fillable = [
        'user_id',
        'note',
        'image',
    ];

    public function usersDetails(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}

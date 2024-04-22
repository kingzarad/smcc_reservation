<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationItem extends Model
{
    use HasFactory;

    protected $table = 'reservation_item';


    protected $fillable = [
        'reservation_id',
        'product_id',
        'quantity'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

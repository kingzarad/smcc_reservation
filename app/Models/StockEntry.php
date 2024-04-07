<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    protected $table = 'stock_entry';

    protected $fillable = [
        'quantity',
        'product_id',
        'entry_date',
        'stock_by',
        'status',
        'stockref'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

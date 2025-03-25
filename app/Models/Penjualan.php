<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable = ['date', 'price_id', 'quantity', 'sold', 'price', 'subtotal', 'total'. 'paid', 'paidoff', 'notes'];

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_item_id',
        'payment_id',
        'shipment_id',
        'quantity',
        'total_price',
    ];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}

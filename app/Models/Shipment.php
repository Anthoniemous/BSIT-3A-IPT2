<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'status',
        'delivery_date',
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}

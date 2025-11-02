<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    // ✅ Make sure this matches the table name in your database
    protected $table = 'menu_items';

    protected $fillable = [
        'name',
        'description',
        'price',
        'available',
        'image_url',
    ];
}

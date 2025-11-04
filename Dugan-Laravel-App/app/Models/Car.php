<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey ='car_id';
    public $timestamps = false;
    protected $fillable = [
    'brand',
    'model',
    'year',
    'transmission',
    'fuel_type',
    'price',
    'quantity',
    'description',
    'image',
];
}

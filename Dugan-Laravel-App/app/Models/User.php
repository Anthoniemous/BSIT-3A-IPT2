<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;   // <-- add this
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail  // <-- implement the interface
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;
}

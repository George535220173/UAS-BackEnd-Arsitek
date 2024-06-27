<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender'
    ];

    // Field yang disembunyikan dari array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting field ke tipe data tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Menggunakan hashing untuk password
    ];
}

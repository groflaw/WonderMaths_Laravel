<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table    = 'users';
    protected $fillable = [
        'id',
        'lead_id',
        'product_code_id',
        'name',
        'contact_number',
        'email',
        'location',
        'status',
        'role_id',
        'bank',
        'password',
        'email_verified_at',
    ];
    protected $hidden   = [
        'profile',
        'password',
        'otp',
        'created_at',
        'updated_at',
        'pivot'
    ];
    protected $casts    = [];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

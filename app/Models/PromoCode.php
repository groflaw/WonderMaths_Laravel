<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $table = 'promo_codes';
    protected $fillable = [
        'id',
        'name',
        'discout',
        'role',
        'commission',
        'created_at'
    ];
    protected $hidden = [
        'registered_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    protected $table    = 'product_codes';
    protected $fillable = ['id', 'sales_rep', 'product_code', 'validity', 'valid_from', 'valid_to', 'status', 'created_at'];
    protected $hidden   = ['registered_at', 'updated_at'];
    protected $casts    = [];
}

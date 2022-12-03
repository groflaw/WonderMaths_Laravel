<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Order extends Model {
        public $incrementing = true;

        protected $table    = 'orders';
        protected $fillable = [
            'id',
            'user_id',
            'price',
            'order_status',
            'order_id',
            'receipt',
            'status',
            'payment_id',
            'error',
            'error_desc',
            'created_at'
        ];
        protected $hidden   = [ 'signature', 'updated_at' ];
    }
?>

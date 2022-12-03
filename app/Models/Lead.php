<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Lead extends Model {
        protected $table    = 'leads';
        protected $fillable = [ 'id', 'source', 'name', 'mobile_no', 'email', 'location', 'status', 'created_at' ];
        protected $hidden   = [ 'updated_at' ];
        protected $casts    = [ ];
    }
?>

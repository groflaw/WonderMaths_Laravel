<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Course extends Model {
        protected $table    = 'courses';
        protected $fillable = [ 'id', 'name', 'status' ];
        protected $hidden   = [ 'created_at', 'updated_at' ];
        protected $casts    = [ ];
    }
?>

<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CourseSection extends Model {
        protected $table    = 'course_sections';
        protected $fillable = [ 'id', 'course_id', 'name', 'status' ];
        protected $hidden   = [ 'created_at', 'updated_at' ];
        protected $casts    = [ ];
    }
?>

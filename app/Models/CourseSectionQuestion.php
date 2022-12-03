<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CourseSectionQuestion extends Model {
        protected $table    = 'course_section_questions';
        protected $fillable = [ 'id', 'course_id', 'section_id', 'question', 'answer', 'explanation', 'status' ];
        protected $hidden   = [ 'created_at', 'updated_at' ];
        protected $casts    = [ ];
    }
?>

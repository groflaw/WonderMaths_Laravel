<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table    = 'question_options';
    protected $fillable = ['id', 'question_id', 'opt_number', 'option'];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $casts    = [];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';

    protected $fillable = [
        'student_id',
        'course_id',
        'grade'
    ];

    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}

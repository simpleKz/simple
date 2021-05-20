<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class CourseLessonPassing extends Model
{
    protected $fillable = ['user_id', 'lesson_id'];

}

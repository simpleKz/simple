<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursePassing extends Model
{
    public $timestamps = true;

    protected $fillable = ['user_id', 'course_id', 'is_passed','passed_lessons_count','overall_lessons_count'];

    public function course(){
        return $this->belongsTo( Course::class, 'course_id', 'id')->with('author');
    }

}

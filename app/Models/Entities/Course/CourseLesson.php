<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLesson extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    public const DEFAULT_DOCUMENT_RESOURCE_DIRECTORY = 'documents/lessons';


    protected $fillable = ['name','duration_in_minutes','description','video_path','course_id'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id')->select(['id','name']);

    }

    public function docs(){
       return  $this->hasMany(CourseLessonMaterial::class,'lesson_id','id');
    }

}

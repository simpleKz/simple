<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLessonMaterial extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = ['type', 'lesson_id', 'material_path'];

    public function lesson(){
        return $this->belongsTo( CourseLesson::class, 'lesson_id', 'id');
    }

}

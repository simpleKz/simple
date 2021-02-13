<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAuthor extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = ['first_name','last_name', 'description', 'image_path'];
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/authors';

    public function course_categories()
    {
        $courses = $this->hasMany(Course::class,'author_id','id')
            ->with('category')->get();
        $courses = $courses->unique('category')->pluck('category');
//        $courses = array_unique($courses);

        return $courses;
    }

    public function fullName() {
        return $this->last_name .' '. $this->first_name;
    }
}

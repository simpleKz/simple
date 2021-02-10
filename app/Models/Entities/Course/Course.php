<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/courses';

    protected $fillable = ['name','description','price','image_path','video_path','category_id','author_id','rating'];

    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function author()
    {
        return $this->belongsTo(CourseAuthor::class, 'author_id', 'id')->select(['id','first_name','last_name']);
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id')->select(['id','name']);
    }

    public function lessons(){
        return  $this->hasMany(CourseLesson::class,'course_id','id')->with('docs');
    }


}

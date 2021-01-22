<?php


namespace App\Models\Entities\Course;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = ['name'];

    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function courses(){
        return $this->hasMany(Course::class,'category_id','id');
    }
}

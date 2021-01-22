<?php


namespace App\Models\Entities\Course;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAuthor extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = ['first_name','last_name'];

}

<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class PacketCourse extends Model
{
    protected $fillable = [
        'packet_id',
        'course_id',
    ];

    public function packet()
    {
        return $this->belongsTo(Packet::class, 'packet_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->select(['id', 'name']);
    }

    public function courses()
    {
        return Course::where('courses.is_parent', false)->select('courses.*')->join('packet_courses', 'courses.id', 'packet_courses.course_id')
            ->where('packet_courses.packet_id', $this->id)->get();
    }
}

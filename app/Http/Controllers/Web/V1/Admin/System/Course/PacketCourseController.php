<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketCourse;

class PacketCourseController extends WebBaseController
{
    public function index($packet_id)
    {
        $packet = Packet::with('course')->findOrFail($packet_id);
        $course = $packet->course;
        $courses = Course::where('courses.is_parent', false)->select('courses.*')->join('packet_courses', 'courses.id', 'packet_courses.course_id')
            ->where('packet_courses.packet_id', $packet_id)->get();
        $courseIds = $courses->pluck('id')->toArray();
        $otherCourses = Course::whereNotIn('id', $courseIds)->where('is_parent', false)->get();
        return $this->adminView('pages.course.packet.connection', compact('otherCourses', 'courses', 'packet', 'course'));
    }

    public function connect($packet_id, $course_id)
    {
        $courses = PacketCourse::where('packet_id', $packet_id)->where('course_id', $course_id)->get();
        if($courses->isEmpty()){
            PacketCourse::create([
                'packet_id' => $packet_id,
                'course_id' => $course_id
            ]);
        }
        return redirect()->back();
    }

    public function disconnect($packet_id, $course_id)
    {
        PacketCourse::where('packet_id', $packet_id)->where('course_id', $course_id)->delete();
        return redirect()->back();
    }
}

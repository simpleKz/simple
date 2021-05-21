<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Exceptions\WebServiceErroredException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketCourse;
use App\Models\Entities\Course\UserPacket;

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
        $packet = Packet::with('course')->findOrFail($packet_id);

        if ($packet->course && !$packet->course->is_parent) {
            throw new WebServiceErroredException("Это курс не является пакетным");
        }

        $courses = PacketCourse::where('packet_id', $packet_id)->where('course_id', $course_id)->get();
        if ($courses->isEmpty()) {
            PacketCourse::create([
                'packet_id' => $packet_id,
                'course_id' => $course_id
            ]);

            $user_packets = UserPacket::where('packet_id',$packet->id)->get();
            foreach ($user_packets as $user_packet){

                $course  = Course::where('id',$course_id)->first();
                $passing = CoursePassing::where('course_id',$course->id)->where('user_id',$user_packet->user_id)->first();
                if(!$passing){
                    CoursePassing::create([
                        'course_id' => $course_id,
                        'user_id' => $user_packet->user_id,
                        'passed_lessons_count' => 0,
                        'overall_lessons_count' => $course->lessons()->count(),
                        'is_passed' => false

                    ]);
                }

            }
        }


        return redirect()->back();

    }

    public function disconnect($packet_id, $course_id)
    {
        $packet = Packet::with('course')->findOrFail($packet_id);

        if ($packet->course && !$packet->course->is_parent) {
            throw new WebServiceErroredException("Это курс не является пакетным");
        }
        PacketCourse::where('packet_id', $packet_id)->where('course_id', $course_id)->delete();
        return redirect()->back();
    }
}

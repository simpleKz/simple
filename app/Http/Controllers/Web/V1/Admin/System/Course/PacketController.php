<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\PacketWebForm;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\Packet;

class PacketController extends WebBaseController
{
    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        $form = PacketWebForm::inputGroups();
        return $this->adminView('pages.course.packet.create', compact('form', 'course'));
    }

    public function index($course_id)
    {
        $course = Course::with('packets')->findOrFail($course_id);
        return $this->adminView('pages.course.packet.index', compact('course'));
    }
}

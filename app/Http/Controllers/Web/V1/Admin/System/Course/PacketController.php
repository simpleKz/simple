<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\PacketPriceWebForm;
use App\Http\Forms\Web\V1\PacketWebForm;
use App\Http\Requests\Web\V1\PacketWebRequest;
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

    public function edit($packet_id)
    {
        $packet = Packet::with(['course', 'prices'])->findOrFail($packet_id);
        $course = $packet->course;
        $form = PacketWebForm::inputGroups($packet);
        $priceForm = PacketPriceWebForm::inputGroups();
        return $this->adminView('pages.course.packet.edit', compact('form', 'packet', 'course', 'priceForm'));
    }

    public function index($course_id)
    {
        $course = Course::with('packets')->findOrFail($course_id);
        return $this->adminView('pages.course.packet.index', compact('course'));
    }

    public function store($course_id, PacketWebRequest $r)
    {
        Packet::create([
            'course_id' => $course_id,
            'name' => $r->name,
            'expiration_month' => $r->expiration_month,
            'color' => $r->color
        ]);
        $this->successOperation();
        return redirect()->route('packet.index', ['course_id' => $course_id]);
    }

    public function update($packet_id, PacketWebRequest $r)
    {
        $packet = Packet::findOrFail($packet_id);
        $packet->update([
            'name' => $r->name,
            'expiration_month' => $r->expiration_month,
            'color' => $r->color
        ]);
        $this->successOperation();
        return redirect()->route('packet.index', ['course_id' => $packet->course_id]);
    }
}

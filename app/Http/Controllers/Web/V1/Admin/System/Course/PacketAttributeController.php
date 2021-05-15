<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\PacketAttributeWebRequest;
use App\Models\Entities\Course\PacketAttribute;

class PacketAttributeController extends WebBaseController
{

    public function store($packet_id, PacketAttributeWebRequest $r)
    {
        PacketAttribute::create([
            'packet_id' => $packet_id,
            'attribute' => $r->attribute,
        ]);
        $this->successOperation();
        return redirect()->back();
    }

    public function delete($attribute_id)
    {
        PacketAttribute::findOrFail($attribute_id)->delete();
        $this->successOperation();
        return redirect()->back();
    }
}

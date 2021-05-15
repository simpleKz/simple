<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\PacketPriceWebForm;
use App\Http\Requests\Web\V1\PacketPriceWebRequest;
use App\Models\Entities\Course\PacketPrice;

class PacketPriceController extends WebBaseController
{

    public function edit($packet_price_id)
    {
        $price = PacketPrice::with('packet.course')->findOrFail($packet_price_id);
        $packet = $price->packet;
        $course = $price->packet->course;
        $form = PacketPriceWebForm::inputGroups($price);
        return $this->adminView('pages.course.packet-price.edit', compact('form', 'packet', 'price', 'course'));
    }

    public function store($packet_id, PacketPriceWebRequest $r)
    {
        PacketPrice::create([
            'packet_id' => $packet_id,
            'currency' => $r->currency,
            'price' => $r->price,
            'old_price' => $r->old_price
        ]);
        $this->successOperation();
        return redirect()->back();
    }

    public function update($packet_price_id, PacketPriceWebRequest $r)
    {
        $price = PacketPrice::findOrFail($packet_price_id);
        $price->update([
            'currency' => $r->currency,
            'price' => $r->price,
            'old_price' => $r->old_price
        ]);
        $this->successOperation();
        return redirect()->route('packet.edit', ['packet_id' => $price->packet_id]);
    }
}

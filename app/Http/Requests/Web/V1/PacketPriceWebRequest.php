<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class PacketPriceWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'price' => ['required', 'string'],
            'old_price' => ['required', 'string'],
            'currency' => ['required', 'string'],
        ];
    }
}

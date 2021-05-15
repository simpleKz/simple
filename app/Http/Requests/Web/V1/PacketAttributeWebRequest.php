<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class PacketAttributeWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'attribute' => ['required', 'string'],
        ];
    }

}

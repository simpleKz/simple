<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class PacketWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['required', 'string'],
            'color' => ['required', 'string'],
            'expiration_month' => ['required', 'string'],
        ];
    }

}

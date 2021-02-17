<?php


namespace App\Http\Requests\Web\V1\Auth;


use App\Http\Requests\Web\WebBaseRequest;

class SendPhoneAndCodeRequest extends WebBaseRequest
{
    public function injectedRules()
    {

        return [
            'phone' => ['required', 'numeric'],
            'code' => [str_contains(request()->route()->uri, 'code')?'required':'', 'numeric'],
        ];

    }
}

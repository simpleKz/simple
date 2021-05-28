<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;
use App\Rules\CheckUserExistanceByPhone;

class UserWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'phone' => ['string',new CheckUserExistanceByPhone()],
            'email' => ['nullable','string', 'email', 'max:255'],
            'id' => ['numeric', 'exists:users,id', 'nullable'],
            'packet_id' => ['numeric', 'exists:packets,id']

        ];
    }

}

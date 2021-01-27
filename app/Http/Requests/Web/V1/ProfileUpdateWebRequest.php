<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;

class ProfileUpdateWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'new_password' => ['required_with:new_password_confirmation', 'nullable:true','same:new_password_confirmation','string','min:8'],
            'new_password_confirmation' => ['required_with:new_password', 'nullable:true', 'string' , 'min:8']
        ];

    }
}

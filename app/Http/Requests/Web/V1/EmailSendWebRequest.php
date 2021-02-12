<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class EmailSendWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'email' => ['required', 'email','unique:bulk_mailings,email'],

        ];

    }
}

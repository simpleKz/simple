<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class BulkMailingWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'topic' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];

    }
}

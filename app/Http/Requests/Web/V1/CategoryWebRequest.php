<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CategoryWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['string',!$this->isDelete() ? 'required' : ''],
            'id' => ['numeric', 'exists:course_categories,id', !$this->isStore() ? 'required' : '']
        ];
    }

}

<?php

namespace App\Http\Requests\Web\V1\Setting;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SliderWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'title' => ['string', 'required', 'max:50'],
            'description' => ['string', 'required', 'max:50'],
            'redirect_url' => ['string', 'required'],
            'image' => ['image', request()->get('id') ? 'nullable' : 'required'],
            'id' => ['numeric', 'exists:sliders,id', 'nullable']
        ];
    }
}

<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseAuthorWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'first_name' => ['string',!$this->isDelete() ? 'required' : ''],
            'last_name' => ['string',!$this->isDelete() ? 'required' : ''],
            'id' => ['numeric', 'exists:course_authors,id', !$this->isStore() ? 'required' : '']
        ];
    }

}

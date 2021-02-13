<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseAuthorWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'image' => ['image', request()->get('id') ? 'nullable' : 'required'],
            'id' => ['numeric', 'exists:course_authors,id', 'nullable']
        ];
    }

}

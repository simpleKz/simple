<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseDetailWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'detail_page_content' => ['required', 'string']
        ];
    }

}

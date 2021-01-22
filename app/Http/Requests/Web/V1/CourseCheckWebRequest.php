<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseCheckWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'course_id' => ['numeric', 'exists:courses,id','required']
        ];
    }

}

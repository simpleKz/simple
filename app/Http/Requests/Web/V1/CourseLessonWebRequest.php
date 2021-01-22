<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseLessonWebRequest  extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => [$this->isStore() ?'required' :'', 'string'],
            'description' => [$this->isStore() ?'required' :'', 'string'],
            'video_path' => [$this->isStore() ?'required' :'', 'string'],
            'course_id' => ['exists:courses,id', $this->isStore() ? 'required' :''],
            'docs' => ['array'],
            'id' => ['numeric', 'exists:course_lessons,id', !$this->isStore() ? 'required' : '']
        ];
    }

}

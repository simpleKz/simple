<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class CourseWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => [$this->isStore() ? 'required' : '', 'string'],
            'description' => [$this->isStore() ? 'required' : '', 'string'],
            'image' => [$this->isStore() ? 'required' : '', 'image'],
            'video_path' => [$this->isStore() ? 'required' : '', 'string'],
            'author_id' => ['exists:course_authors,id', $this->isStore() ? 'required' : ''],
            'category_id' => ['exists:course_categories,id', $this->isStore() ? 'required' : ''],
            'id' => ['numeric', 'exists:courses,id', !$this->isStore() ? 'required' : ''],
            'is_parent' => ['boolean'],
            'is_visible' => ['boolean'],
        ];
    }

}

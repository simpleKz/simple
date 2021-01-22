<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CourseCategory;

class CourseLessonWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Введение в маркетинг', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::textArea('description', 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать 
несколько абзацев более менее осмысленного текста рыбы на русском языке, 
а начинающему оратору отточить навык публичных выступлений 
в домашних условиях.', 'Описание',
                true, $value ? $value->description : ''),
            FormUtil::input('video_path', 'https://www.youtube.com/watch?v=Jk7Ff9s2nkw', 'Ссылка на видео урок',
                'text', true, $value ? $value->video_path : ''),
            FormUtil::input('duration_in_minutes', '15', 'Время в минутах',
                'number', true, $value ? $value->duration_in_minutes : ''),
            FormUtil::input('docs[]', 'Выберите документы к уроку', 'Выберите документы к уроку',
                'file',  false ,null,true)
        );
    }
}

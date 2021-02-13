<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class CourseAuthorWebForm implements WithForm
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
            FormUtil::input('first_name', 'Кайрат', 'Имя',
                'text', true, $value ? $value->first_name : null),
            FormUtil::input('last_name', 'Аскаров', 'Фамилия',
                'text', true, $value ? $value->last_name : null),
            FormUtil::textArea('description', 'Положительный маг из Хогвартса', 'Описание',
                true, $value ? $value->description : null),
            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false, '')
        );
    }
}

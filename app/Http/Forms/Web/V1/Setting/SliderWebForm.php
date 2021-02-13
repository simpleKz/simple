<?php


namespace App\Http\Forms\Web\V1\Setting;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class SliderWebForm implements WithForm
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
            FormUtil::input('title', 'Учимся готовить стейк', 'Заголовок',
                'text', true, $value ? $value->title : null, false, 50),
            FormUtil::input('redirect_url', 'https://www.simple.kz', 'Url адрес',
                'url', true, $value ? $value->redirect_url : null),
            FormUtil::input('description', 'Готовим вкусные стейки', 'Описание',
                'text', true, $value ? $value->description : null, false, 50),
            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false, '')
        );
    }

}

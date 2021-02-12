<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class BulkMailingWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(

            FormUtil::input('topic', 'Заголовок', 'Заголовок',
                'text', true,  ''),
            FormUtil::textArea('description', 'Текст', 'Описание',
                true, '')
        );
    }
}

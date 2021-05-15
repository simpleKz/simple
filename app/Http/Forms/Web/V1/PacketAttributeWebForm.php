<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class PacketAttributeWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('attribute', 'Текст', 'Атрибут',
                'text', true, $value ? $value->name : '')
        );
    }

}

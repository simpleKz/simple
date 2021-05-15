<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class PacketWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Standard', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('name', 'Standard', 'Название',
                'text', true, $value ? $value->name : '')
        );
    }

}

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
            FormUtil::input('color', '#123123', 'Выбрите цвет',
                'color', true, $value ? $value->color : '#808080'),
            FormUtil::input('expiration_month', '0', 'Выбрите количество месяцев для доступа (0 если доступ вечный)',
                'number', true, $value ? $value->expiration_month : '0')
        );
    }

}

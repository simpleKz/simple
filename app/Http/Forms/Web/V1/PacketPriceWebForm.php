<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Enums\Currency;

class PacketPriceWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('price', '1000', 'Цена',
                'number', true, $value ? $value->price : 0),
            FormUtil::input('old_price', '1000', 'Старая цена',
                'number', true, $value ? $value->price : 0),
            FormUtil::select('currency', 'KZT', 'Валюта',
                true, [
                    FormUtil::option(Currency::KZT, $value && $value->currency == Currency::KZT ? 'selected' : '', 'Тенге'),
                    FormUtil::option(Currency::RUR, $value && $value->currency == Currency::RUR ? 'selected' : '', 'Рубли')
                ])
        );
    }
}

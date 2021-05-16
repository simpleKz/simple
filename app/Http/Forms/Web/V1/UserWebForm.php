<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CourseCategory;
use App\Models\Entities\Course\Packet;

class UserWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];


        $packets_array = [];
        $packets = Packet::all();
        foreach ($packets as $packet) {
            $selected = $value ? $value->packet_id == $packet->id ? 'selected' : '' : '';
            $packets_array[] = array('title' =>  $packet->course->name . ' | '.$packet->name, 'value' => $packet->id, 'selected' => $selected);
        }




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
            FormUtil::input('phone', '', 'Телефон',
                'text', true, $value ? $value->phone : null),
            FormUtil::select('packet_id', '', 'Курс/Пакет',
                true, $packets_array)
        );
    }
}

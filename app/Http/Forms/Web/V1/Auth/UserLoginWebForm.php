<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 17:31
 */

namespace App\Http\Forms\Web\V1\Auth;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class UserLoginWebForm implements WithForm
{

    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('email', ' ЖСН немесе электронды пошта жазу
:', 'Логин', 'text', true),
            FormUtil::input('password', '', 'Құпия сөз', 'password', true)
        );
    }

}

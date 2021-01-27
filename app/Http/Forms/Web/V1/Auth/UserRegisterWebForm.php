<?php


namespace App\Http\Forms\Web\V1\Auth;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class UserRegisterWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Введите ваше имя:', 'Имя', 'text', true),
            FormUtil::input('email', 'Введите ваш email:', 'Email', 'text', true),
            FormUtil::input('password', 'Введите пароль:', 'Пароль', 'password', true),
            FormUtil::input('password_confirmation', 'Подтвердите пароль:', 'Подтвердите пароль:', 'password', true)
        );
    }
}

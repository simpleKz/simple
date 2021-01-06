<?php

namespace App\Http\Controllers\Web;

use App\Core\Interfaces\WithUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebBaseController extends Controller implements WithUser
{
    public function warning()
    {
        request()
            ->session()
            ->flash('warning', 'Ошибка!');

    }

    public function added()
    {
        request()
            ->session()
            ->flash('success', 'Добавлено!');
    }

    public function inModeration()
    {
        request()
            ->session()
            ->flash('warning', "Отправлено на мoдерацию администратору сайта");
    }

    public function deleted()
    {
        request()
            ->session()
            ->flash('error', 'Удалено!');
    }

    public function successOperation()
    {
        request()
            ->session()
            ->flash('success', 'Операция успешна!');
    }

    public function edited()
    {
        request()
            ->session()
            ->flash('success', 'Обновлено!');
    }

    public function notFound()
    {
        request()
            ->session()
            ->flash('warning', 'Не найдено!');
    }


    public function error()
    {
        request()
            ->session()
            ->flash('error', 'Ошибка!');
    }

    public function makeToast($type, $message)
    {
        request()
            ->session()
            ->flash($type, $message);
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function getCurrentUserId()
    {
        return Auth::id();
    }

    public function frontView($name, $compact = [])
    {
        return view('modules.front.' . $name, $compact);
    }

    public function adminView($viewPath, $compact = [])
    {
        return view("modules.admin.$viewPath", $compact);
    }
}

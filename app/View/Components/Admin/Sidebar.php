<?php

namespace App\View\Components\Admin;

use App\View\BaseComponent;
use Illuminate\Support\Facades\Route;

class Sidebar extends BaseComponent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return $this->coreAdminView('parts.sidebar');
    }

    public function navList()
    {
        if ($this->user->isAdmin()) {
            return [
                $this->navItem(route('home'), 'ti-arrow-left', 'Главная'),
                $this->navItem(route('user.index'), 'ti-user', 'Пользователи'),
                $this->navItem(route('course.index'), 'ti-book', 'Курсы'),
                $this->navItem(route('home'), 'ti-settings', 'Настройки', [
                    $this->navItem(route('category.index'), 'ti-layers-alt', 'Категории'),
                    $this->navItem(route('author.index'), 'ti-user', 'Авторы'),
                    $this->navItem(route('slider.index'), 'ti-image', 'Слайдер'),

                ]),
                $this->navItem(route('bulk_mailing.index'), 'ti-email', 'Массовая рассылка'),

            ];
        } else {
            return [
                $this->navItem(route('home'), 'ti-arrow-left', 'Главная')
            ];
        }
    }

    private function navItem($url, $icon, $name, $items = [])
    {
        return [
            'url' => $url,
            'icon' => $icon,
            'title' => $name,
            'items' => $items,
            'current' => request()->getUri() == $url
        ];
    }

    private function divider()
    {
        return [
            'divider' => true
        ];
    }
}

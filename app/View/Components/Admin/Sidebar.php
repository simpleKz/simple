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
                $this->navItem(route('category.index'), 'ti-arrow-left', 'Категории'),
//                $this->navItem(route('jastar.home'), 'ti-home', 'Главная', [
////                    $this->navItem(route('jastar.about_us.index'), 'ti-info-alt', 'Про нас'),
////                    $this->navItem(route('jastar.slider.index'), 'ti-layout-media-right-alt', 'Слайдер'),
//                    $this->navItem(route('jastar.event.index'), 'ti-calendar', 'Мероприятия'),
//                    $this->navItem(route('jastar.about_project.index'), 'ti-clipboard', 'О проекте'),
//                    $this->navItem(route('jastar.map.region.index'), 'ti-map', 'Регионы карты'),
//                ])
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

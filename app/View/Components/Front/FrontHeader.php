<?php

namespace App\View\Components\Front;

use App\Models\Entities\Jastar\AboutProject;
use App\View\BaseComponent;

class FrontHeader extends BaseComponent
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $navItems = [
            [
                'title' => trans('front.news'),
                'href' => $_SERVER['REQUEST_URI'] . '#news'
            ],
            [
                'title' => trans('front.about.project'),
                'href' => $_SERVER['REQUEST_URI'] . '#about_section'
            ],
            [
                'title' => trans('front.events.calendar'),
                'href' => $_SERVER['REQUEST_URI'] . '#event'
            ]
        ];
//        $about_project = AboutProject::first();
        return $this->coreFrontView('parts.front-header', compact('navItems'));
    }
}

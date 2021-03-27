<?php

namespace App\View\Components\Front;

use App\View\BaseComponent;

class FrontFooter extends BaseComponent
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
//        $about_project = AboutProject::first();
        return $this->coreFrontView('parts.front-footer');
    }
}

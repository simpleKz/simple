<?php

namespace App\View\Components\Front;

use App\View\BaseComponent;

class SmallHeader extends BaseComponent
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
        return $this->coreFrontView('parts.small-header');
    }
}

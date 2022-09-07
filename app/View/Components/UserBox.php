<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserBox extends Component
{

    public $reservationTotal;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($reservationTotal)
    {
        $this->reservationTotal = $reservationTotal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-box');
    }
}

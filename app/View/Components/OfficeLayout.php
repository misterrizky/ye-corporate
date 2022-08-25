<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OfficeLayout extends Component
{
    public function __construct()
    {
        //
    }
    public function render()
    {
        return view('themes.office.main');
    }
}

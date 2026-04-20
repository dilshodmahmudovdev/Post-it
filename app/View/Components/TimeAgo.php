<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimeAgo extends Component
{
    public $timestamp;

    public function __construct($timestamp)
    {
        $this->timestamp = $timestamp;
        //
    }

    public function render()
    {
        return view('components.time-ago');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileCard extends Component
{

    public $post;
    public $isOwner;

    public function __construct($post, $isOwner)
    {
        $this->post = $post;
        $this->isOwner = $isOwner;
        //
    }


    public function render()
    {
        return view('components.profile-card');
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PostService {

    public function create ($user, $data)
    {
        if(isset($data['image'])){
            $data['img_url'] = Storage::disk('public')->put('images', $data['image']);
            unset($data['image']);
        }

        return $user->posts()->create($data);
    }
}

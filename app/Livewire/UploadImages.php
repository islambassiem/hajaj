<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UploadImages extends Component
{

    public $post_id;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.upload-images');
    }
}

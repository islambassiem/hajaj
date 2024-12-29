<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditPost extends Component
{

	public Post $post;

	public function mount(Post $post)
	{
		$this->post = $post;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.edit-post');
    }
}

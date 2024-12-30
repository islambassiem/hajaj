<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPost extends Component
{

    #[Locked]
    public int $post_id;

    #[Validate('required|max:255')]
    public string $title;

    #[Validate('required')]
    public int $price;

    #[Validate('required|max:65000')]
    public string $description;

    public $patentId;

    #[Validate('required')]
    public $childId;

    public function mount(Post $post)
    {
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->price = $post->price;
        $this->description = $post->description;
        $this->childId = $post->category_id;
    }

    #[Computed()]
    public function parents()
    {
        return Category::whereNull('parent_id')->get(['id', 'name_en', 'name_ar']);
    }
    #[Computed()]
    public function children()
    {
        if (!is_null($this->patentId)) {
            return Category::where('parent_id', $this->patentId)->get(['id', 'name_en', 'name_ar']);
        }
        return collect();
    }

    public function save()
    {
        $this->validate();
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' => $this->childId,
            'description' => $this->description
        ]);
        return redirect()->route('dashboard');
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.edit-post');
    }
}

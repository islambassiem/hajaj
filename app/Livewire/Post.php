<?php

namespace App\Livewire;

use App\Models\Post as PostModel;
use App\Traits\Load;
use Livewire\Component;

class Post extends Component
{
    use Load;

    public PostModel $post;

    public function mount(PostModel $post)
    {
        $this->post = $post;
    }
    public function render()
    {
        $similar = PostModel::query()
            ->where('category_id', $this->post->category_id)
            ->whereNot('id', $this->post->id)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();
        return view('livewire.post')
            ->with('posts', PostModel::find($this->post->id))
            ->with('similar', $similar);
    }
}

<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Post;
use App\Traits\Load;
use Livewire\Component;

class Category extends Component
{

    use Load;

    public $slug;

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->slug, function ($query) {
                $category = CategoryModel::where('slug', $this->slug)->first();
                return $query->where('category_id', $category->id);
            })
            ->with(['media', 'category'])
            ->take($this->limit)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.category')
            ->with('posts', $posts);
    }

}

<?php

namespace App\Livewire;

use App\Models\Post;
use App\Traits\Load;
use Livewire\Component;
use Livewire\Attributes\Session;
use App\Models\Category as CategoryModel;

class Category extends Component
{

    use Load;

    public $slug;

    #[Session]
    public string $search = '';
    public string $queryParam  = '';

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function query()
    {
        $this->queryParam = $this->search;
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->slug, function ($query) {
                $category = CategoryModel::where('slug', $this->slug)->first();
                return $query->where('category_id', $category->id);
            })
            ->when($this->search, function ($query){
                return $query
                    ->where('title', 'like', '%' . $this->queryParam . '%')
                    ->orWhere('description', 'like', '%' . $this->queryParam . '%');
            })
            ->with(['media', 'category'])
            ->take($this->limit)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.category')
            ->with('posts', $posts);
    }

}

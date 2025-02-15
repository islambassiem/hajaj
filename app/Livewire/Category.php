<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Post;
use App\Traits\Load;
use Livewire\Component;
use Livewire\Attributes\Session;
use Livewire\Attributes\Computed;
use App\Models\Category as CategoryModel;

class Category extends Component
{

    use Load;

    public $slug;

    #[Session]
    public string $search = '';
    public string $queryParam  = '';

    public $provinceId;

    public $cityId;

    public $minPrice;

    public $maxPrice;

    public $subCategories;

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function query()
    {
        $this->queryParam = $this->search;
    }

    #[Computed()]
    public function provinces()
    {
        return City::whereNull('province_id')->get(['id', 'city_en', 'city_ar']);
    }

    #[Computed()]
    public function cities()
    {
        if (!is_null($this->provinceId)) {
            return City::where('province_id', $this->provinceId)->get(['id', 'city_en', 'city_ar']);
        }
        return collect();
    }

    public function category($category)
    {
        $subCategories = CategoryModel::where('parent_id', $category)->get();
        $this->subCategories = $subCategories;
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
            ->when($this->provinceId, function($query){
                if(!is_null(City::find($this->provinceId)))
                {
                    $cities = City::find($this->provinceId)->cities();
                    return $query->whereIn('city_id', $cities);
                }
                return $query;
            })
            ->when($this->cityId, function($query){
                $query->where('city_id', $this->cityId);
            })
            ->when($this->minPrice, function($query){
                return $query->where('price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function($query){
                return $query->where('price', '<=', $this->maxPrice);
            })
            ->with(['media', 'category'])
            ->take($this->limit)
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('livewire.category')
            ->with('posts', $posts);
    }

}

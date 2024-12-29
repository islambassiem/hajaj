<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function delete($id)
    {
        $post = Post::findorFail($id);
        $this->authorize('delete', $post);
        $post->delete();
    }
    public function render()
    {
        return view('livewire.dashboard')
            ->with('posts', Post::with('category')->where('user_id', Auth::user()->id)->get());
    }
}

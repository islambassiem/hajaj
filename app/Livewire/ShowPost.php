<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ShowPost extends Component
{

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function message($userId)
    {
        $authenticatedUserId = Auth::id();
        if (!$authenticatedUserId) {
            return redirect()->route('login');
        }
        $existingConversation = Conversation::query()
        ->where(function ($query) use ($authenticatedUserId, $userId) {
            $query->where('sender_id', $authenticatedUserId)
                ->where('receiver_id', $userId);
        })
        ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $authenticatedUserId);
        })->first();

        if ($existingConversation) {
            return redirect()->route('chat', ['query' => $existingConversation->id]);
        }

        $createdConversation = Conversation::create([
            'sender_id' => $authenticatedUserId,
            'receiver_id' => $userId,
        ]);
        return redirect()->route('chat', ['query' => $createdConversation->id]);
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}

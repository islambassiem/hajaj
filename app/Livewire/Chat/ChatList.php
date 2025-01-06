<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    public $selectedConversation;
    public $query;


    #[Computed()]
    protected function user(): User
    {
        return Auth::user();
    }

    public function render()
    {
        $user = $this->user();
        return view('livewire.chat.chat-list', [
            'conversations' => $user->conversations()->latest('created_at')->get()
        ]);
    }
}

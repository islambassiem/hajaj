<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class ChatList extends Component
{
    public $selectedConversation;
    public $query;

    protected $listeners = ['refresh' => '$refresh'];
    #[Computed()]
    protected function user(): User
    {
        return Auth::user();
    }

    #[On('refresh')]
    public function render()
    {
        $user = $this->user();
        return view('livewire.chat.chat-list', [
            'conversations' => $user->conversations()->latest('updated_at')->get()
        ]);
    }
}

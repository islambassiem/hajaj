<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{

    public $query;
    public $selectedConversation;

    public function mount()
    {
        $this->selectedConversation = Conversation::findOrFail($this->query);
        Message::query()
            ->where('conversation_id', $this->selectedConversation->id)
            ->where('receiver_id', Auth::id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.chat');
    }
}

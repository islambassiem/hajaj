<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use Livewire\Attributes\Layout;

class Chat extends Component
{

    public $query;
    public $selectedConversation;

    public function mount()
    {
        $this->selectedConversation = Conversation::findOrFail($this->query);
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.chat');
    }
}

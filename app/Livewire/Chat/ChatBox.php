<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class ChatBox extends Component
{

    public $selectedConversation;
    public $body;
    public $loadedMessages;
    public $paginate_var = 10;



    public function loadMessages()
    {
        $userId = Auth::id();
        #get count
        $count = Message::query()
            ->where('conversation_id', $this->selectedConversation->id)
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->count();

        #skip and query
        $this->loadedMessages = Message::query()
            ->where('conversation_id', $this->selectedConversation->id)
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->skip($count - $this->paginate_var)
            ->take($this->paginate_var)
            ->get();
        return $this->loadedMessages;
    }

    public function sendMessage()
    {
        $this->validate([
            'body' => 'required|string|max:255'
        ]);

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => Auth::id(),
            'receiver_id' =>  $this->selectedConversation->getReceiver()->id,
            'body' => $this->body,
        ]);

        $this->reset('body');

        $this->dispatch('scroll-bottom');

        $this->loadedMessages->push($createdMessage);
    }

    public function mount()
    {
        $this->loadMessages();
    }



    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.chat-box', [
            'selectedConversation' => collect([])
        ]);
    }
}

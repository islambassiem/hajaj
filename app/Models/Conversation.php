<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable=[
        'receiver_id',
        'sender_id'
    ];


    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function getReceiver()
    {
        return $this->sender_id === Auth::id()
        ? User::firstWhere('id',$this->receiver_id)
        : User::firstWhere('id',$this->sender_id);
    }

    public function unreadMessagesCount() : int {
        return Message::query()
            ->where('conversation_id', $this->id)
            ->where('receiver_id',Auth::user()->id)
            ->whereNull('read_at')
            ->count();
    }

    public function isLastMessageReadByUser():bool
    {
        $lastMessage= $this->messages()->latest()->first();
        if($lastMessage){
            return  $lastMessage->read_at !==null && $lastMessage->sender_id == Auth::user()->id;
        }
    }


}

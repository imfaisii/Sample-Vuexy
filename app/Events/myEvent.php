<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Member;
class myEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

     //public $member; 
     public $username;
     public $message;
     public $receiver;
     public $room_id;
     /**
      * Create a new event instance.
      *
      * @return void
      */
     public function __construct($username,$message,$receiver,$room_id)
     {
        // $this->member=$member;
        $this->username = $username;
        $this->message = $message;
        $this->receiver = $receiver;
        $this->room_id = $room_id;
     }
 
     /**
      * Get the channels the event should broadcast on.
      *
      * @return \Illuminate\Broadcasting\Channel|array
      */
     public function broadcastOn()
     {
       //  $test = Member::where('user_id','=',auth()->user()->id)->latest()->value('room_id');
         
        // return new PrivateChannel('socekt');    //listening at his user id
 
        return new PrivateChannel('socket.'.$this->room_id); 
     }
     public function broadcastAs()
     {
         return 'notify_socket';
     }
     public function broadcastWith () {
         return [
          
             'Sender'     => $this->username,
             'message'     => $this->message,
             'receiver'   => $this->receiver,
             'room'=>$this->room_id,
             
         ];
     }
}

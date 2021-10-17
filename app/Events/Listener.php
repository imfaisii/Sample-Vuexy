<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use App\Models\Member;

class Listener implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $window_name;
    public $username;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        //
        $this->username = $username;        //to agent
        $this->window_name=Member::where('user_id',auth()->user()->id)->latest()->value('room_id');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        
        
       // return new PrivateChannel('socekt');    //listening at his user id

       return new PrivateChannel('listener.'.$this->username,); 
    }
    public function broadcastAs()
    {
        return 'notify_listener';
    }
    public function broadcastWith () {
        return [
             'type'=>"agent_listen",
            'Sender'     => $this->username,
            'window_name'=>$this->window_name,
           
            
        ];
    }
}

<?php

namespace App\View\Components\support;

use App\Models\Member;
use Illuminate\View\Component;

class chat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user_type= auth()->user()->user_type;
        $room=Member::where('user_id',auth()->user()->id)->latest()->value('room_id');
        $receiver=Member::where('room_id',$room)->where('user_id','!=',auth()->user()->id)->value('user_id'); 
        return view('components.support.chat',compact('user_type','receiver','room'));
    }
}

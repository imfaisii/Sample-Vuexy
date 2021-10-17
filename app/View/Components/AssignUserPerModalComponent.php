<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AssignUserPerModalComponent extends Component
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
        $permission = DB::table('permissions')->get();  
        $users = DB::table('users')->get();
        return view('components.assign-user-per-modal-component',compact('users','permission'));
    }
}

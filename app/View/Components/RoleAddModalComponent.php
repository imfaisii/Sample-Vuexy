<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class RoleAddModalComponent extends Component
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
        $all_permissions=Permission::all();
        return view('components.role-add-modal-component',compact('all_permissions'));
    }
}

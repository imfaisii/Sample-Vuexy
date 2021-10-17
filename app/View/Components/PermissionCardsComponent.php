<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class PermissionCardsComponent extends Component
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
        $Permission_with_user = Permission::with(['users.UserAttributes'])->get();
        return view('components.permission-cards-component',compact('Permission_with_user'));
    }
}

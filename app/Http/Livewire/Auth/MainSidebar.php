<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class MainSidebar extends Component
{
    public $appName;
    public $menu;

    public function mount($menu=null)
    {
        $this->appName = config('app.name');
        $this->menu = $menu;
    }

    public function render()
    {
        return view('livewire.auth.main-sidebar');
    }
}

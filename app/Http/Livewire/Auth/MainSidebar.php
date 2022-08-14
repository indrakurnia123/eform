<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Menu;

class MainSidebar extends Component
{
    public $appName;
    public $appShortName;
    public $menu;

    public function mount($menu=null)
    {
        $this->appName = config('app.name');
        $this->appShortName = config('app.shortname');
        $this->menu = $menu;
    }

    public function render()
    {
        return view('livewire.auth.main-sidebar');
    }
}

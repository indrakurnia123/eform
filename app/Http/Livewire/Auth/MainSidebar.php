<?php

namespace App\Http\Livewire\Auth;

use Auth;
use Livewire\Component;
use App\Models\User;
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

        // $user = User::find(Auth::user()->id);
        $user = User::find(1);
        dd($user->role);
        $this->menu = $menu;
    }

    public function render()
    {
        return view('livewire.auth.main-sidebar');
    }
}

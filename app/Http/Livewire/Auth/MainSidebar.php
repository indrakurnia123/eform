<?php

namespace App\Http\Livewire\Auth;

use Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Menu;
use App\Models\GroupMenu;
use App\Models\RoleMenu;

class MainSidebar extends Component
{
    public $appName;
    public $appShortName;
    public $menus;
    public $groupMenus=array();

    public function mount()
    {
        $this->appName = config('app.name');
        $this->appShortName = config('app.shortname');

        $user = User::find(Auth::user()->id);
        $groupMenuIndex=0;
        foreach($user->role->roleMenu as $key=>$menu)
        {
            if(!in_array($menu->menu->groupMenu,$this->groupMenus))
            {
                $this->groupMenus[$groupMenuIndex]=$menu->menu->groupMenu;
                $groupMenuIndex++;
            };
            if($menu->menu->is_active==1)
            {
                $this->menus[$key]=$menu->menu;
            }
        }
        // dd($this->groupMenus);
    }

    public function render()
    {
        return view('livewire.auth.main-sidebar');
    }
}

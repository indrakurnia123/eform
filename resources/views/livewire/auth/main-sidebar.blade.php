<div> 
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
            <a href="#">{{$appName}}</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{$appShortName}}</a>
            </div>
            <ul class="sidebar-menu">
                @foreach($groupMenus as $groupMenu)
                <li class="menu-header">{{$groupMenu->name}}</li>
                    @foreach($menus as $menu)
                        @if($groupMenu->name==$menu->groupMenu->name and $menu->parent_id==0)
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="{{$menu->icon}}"></i><span>{{$menu->name}}</span></a>
                                <ul class="dropdown-menu">
                                    @foreach($menus as $submenu)
                                        @if($submenu->parent_id==$menu->id)
                                            <li><a class="nav-link" href="@if($submenu->path!='#') {{route($submenu->path)}} @else # @endif">{{$submenu->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </aside>
    </div>
</div>

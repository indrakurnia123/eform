                                  
<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item has-icon" href="/user/detail/{{$user->id}}"><i class="fas fa-info-circle"></i>Detail</a>
        <a class="dropdown-item has-icon" href="#" wire:click.prevent="resetPassword"><i class="fas fa-key"></i>Reset Password</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item has-icon text-danger" href="#" wire:click.prevent="delete({{$user->id}})"><i class="fas fa-trash"></i>Delete</a>
    </div>
</div>
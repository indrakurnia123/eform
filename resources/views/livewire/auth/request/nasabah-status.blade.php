
<div class="media mt-1">
    <div class="media-body">
        @if($req->nasabah_status->id!=1)
            <div class="media-right" wire:model="req"><small class="{{$req->nasabah_status->badge}}">{{$req->nasabah_status->name}}</small></div>
        @else
            <div class="media-right" wire:model="req"><a class="text-secondary" wire:loading.remove wire:target='updateDataCij' wire:click.prevent="updateDataCij({{$req->id}})" href="#"><i class="fas fa-sync-alt"></i></a></div>
            <div class="media-right" wire:model="req"><a class="text-secondary" wire:loading wire:target='updateDataCij' href="#"><i class="fas fa-sync-alt loader"></i></a></div>
        @endif
        <div class="media-title">Nasabah bank CiJ</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="#" wire:click.prevent="selectFilter(1)">{{$request_statuses[0]->name}}
                            <livewire:auth.request.request-count :request_status_id='$request_statuses[0]->id' />
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" wire:click.prevent="selectFilter(2)">{{$request_statuses[1]->name}}
                            <livewire:auth.request.request-count :request_status_id='$request_statuses[1]->id' />
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" wire:click.prevent="selectFilter(3)">{{$request_statuses[2]->name}}
                            <livewire:auth.request.request-count :request_status_id='$request_statuses[2]->id' />
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" wire:click.prevent="selectFilter(4)">{{$request_statuses[3]->name}}
                            <livewire:auth.request.request-count :request_status_id='$request_statuses[3]->id' />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
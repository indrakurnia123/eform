@section('title','eForm | Requests')
<div>
    @push('css_libraries')
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/chocolat/dist/css/chocolat.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/prismjs/themes/prism.css')}}">
    @endpush
    @section('section-header','Requests')

    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#" wire:click.prevent="changeFilter()">All <span
                                    class="badge badge-primary">{{$filtersAll[0]->jml}}</span></a>
                        </li>
                        @foreach($filters as $fil)
                        <li class="nav-item">
                            <a class="nav-link filter" href="#"
                                wire:click.prevent="changeFilter({{$fil->request_status_id}})">{{$fil->request_status->name}}<span
                                    class="{{$fil->request_status->badge}}">{{$fil->jml}}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Requests</h4>
                    <div class="section-header-button">
                        <a href="{{route('requests.create')}}" class="btn btn-success pull-right"><i
                                class="fa fa-plus mr-1"></i>Create New Request</a>
                    </div>
                </div>

                {{-- list request --}}

                <div class="row px-4">
                    @foreach($requests as $request) 
                        <livewire:auth.request.request-card :id='$request->id'/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('js_libraries')
<script src="{{asset('stisla/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('stisla/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('stisla/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
<script src="{{asset('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
@endpush

@push('page_specific_js')
<script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
@endpush
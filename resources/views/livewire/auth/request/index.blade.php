<div>
    @section('title','eForm | Requests')
    @push('css_libraries')
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/prismjs/themes/prism.css')}}">
    @endpush
    @section('section-header','Requests')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Requests</h4>
                    <div class="section-header-button">
                        <a href="{{route('requests.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus mr-1"></i>Create New Request</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Request Number</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Kantor</th>
                                    <th>Verifikasi</th>
                                    <th>Grade Score</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requests as $key=>$request)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$request->request_number}}</td>
                                    <td>{{$request->name}}</td>
                                    <td>{{$request->nik}}</td>
                                    <td>{{$request->office->shortname}}</td>
                                    @if($request->request_reff_id)     
                                        <td class="text-center">
                                            <a href="#" wire:click="checkVerification({{$request->id}})" class="modal-verification-1">
                                                <i class="fas fa-check text-success"></i>
                                            </a>
                                        </td>
                                    @else         
                                        <td class="text-center">
                                            <a href="#" wire:click="checkVerification({{$request->id}})" class="modal-verification-1">
                                                <i class="fas fa-times text-danger"></i>
                                            </a>
                                        </td>
                                    @endif
                                    @if($request->request_reff_id)
                                        <td class="text-center">
                                            <a href="#" wire:click.prevent="checkGradeRecomendation({{$request->id}})">
                                                <i class="fas fa-check text-success"></i>
                                            </a>
                                        </td>     
                                    @else         
                                        <td class="text-center">                                            
                                            <a href="#" wire:click.prevent="checkGradeRecomendation({{$request->id}})">
                                                <i class="fas fa-times text-danger"></i>
                                            </a>
                                        </td>
                                    @endif
                                    <td><small class="{{$request->request_status->badge}}">{{$request->request_status->name}}</small></td>
                                    <td>                                        
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="/request/detail/{{$request->id}}"><i class="fas fa-info-circle"></i>Detail</a>
                                                <a class="dropdown-item has-icon" href="/request/edit/{{$request->id}}"><i class="fas fa-edit"></i>Edit</a>
                                                <a class="dropdown-item has-icon" href="#"><i class="far fa-file"></i>Acc / Reject</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item has-icon text-danger" href="#"><i class="fas fa-trash"></i>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Verification Modal Start --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="verificationModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verification Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p wire:model="verificationData">
                        <code wire:model="verificationData">
                            {{$verificationData}}
                        </code>        
                    </p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Verification Modal Start --}}
    

    {{-- Grade Modal Start --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="gradeModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Grade Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <code wire:model="gradeData">
                            {{$gradeData}}
                        </code>        
                    </p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Grade Modal Start --}}

    @push('js_libraries')
    <script src="{{asset('stisla/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    @endpush
    
    @push('page_specific_js')
    <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
    <script src="{{asset('stisla/js/page/bootstrap-modal.js')}}"></script>
    <script>
        window.addEventListener('show-verification-modal',event=>{
            $('#verificationModal').appendTo('body').modal('show');
        });
        window.addEventListener('show-grade-modal',event=>{
            $('#gradeModal').appendTo('body').modal('show');
        });
    </script>
    <script src="{{asset('js/custom/user-index.js')}}"></script>
    @endpush
</div>

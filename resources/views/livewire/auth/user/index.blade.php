<div>
    @section('title','eForm | Users')
    @push('css_libraries')
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/prismjs/themes/prism.css')}}">
    @endpush    
    @section('section-header','Users')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Requests</h4>
                <div class="section-header-button">
                    <a href="{{route('auth.user.register')}}" class="btn btn-success pull-right"><i class="fa fa-plus mr-1"></i>Register New User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <livewire:auth.user.user-table theme="bootstrap-4"/>

                    <table class="table table-stripped" id="table-1">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Office</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img alt="image" src="{{$user->image}}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{$user->name}}">
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->office->name}}</td>
                                <td>{{$user->role->description}}</td>
                                @if($user->is_active==1)
                                    <td><div class="badge badge-success">Aktif</div></td>
                                @else
                                    <td><div class="badge badge-danger">Nonaktif</div></td>
                                @endif
                                <td>                                     
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                {{-- Modal Reset Password Start --}}
                <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="resetPasswordModal">Reset Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Reset Password Start --}}
            </div>
        </div>
    </div>

    @push('js_libraries')
    <script src="{{asset('stisla/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    @endpush
    
    @push('page_specific_js')
    <script>
        window.addEventListener('show-reset-password-modal',event => {
            $('#resetPasswordModal').appendTo('body').modal('show');
        });
    </script>
    <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
    <script src="{{asset('stisla/js/page/bootstrap-modal.js')}}"></script>
    @endpush
    
</div>

@section('title','eForm | Users')
<div>
    @section('section-header','Users')
    
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Advanced Table</h4>
            <div class="card-header-form">
                <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            </div>
            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                <tr>
                    <th>
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>
                    </th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <img alt="image" src="{{$user->image}}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{$user->name}}">
                        </td>
                        <td>{{$user->role->description}}</td>
                        @if($user->is_active==1)
                            <td><div class="badge badge-success">Aktif</div></td>
                        @else
                            <td><div class="badge badge-danger">Nonaktif</div></td>
                        @endif
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                @endforeach
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@push('page_specific_js')
    <script src="{{asset('stisla/js/page/components-table.js')}}"></script>
@endpush

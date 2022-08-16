@section('title','eForm | Requests')
<div>
    @push('css_libraries')
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    @endpush
    @section('section-header','Requests')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>No Permohonan</th>
                    <th>Tgl Permohonan</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($requests as $key=>$request)
                    <td>
                        {{$key}}
                    </td>
                    <td>{{$request->request_number}}</td>
                    <td>{{$request->request_date}}</td>
                    <td>{{$request->nik}}</td>
                    <td>{{$request->name}}</td>
                    <td>{{$request->birth_place.", ".$request->birth_date}}</td>
                    <td>{{$request->address}}</td>
                    <td>{{$request->phone}}</td>
                    <td><div class="{{$request->request_status->badge}}">{{$request->request_status->name}}</div></td>
                    <td>
                        <a href="#" class="btn btn-warning">Detail</a>
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
</div>
@push('js_libraries')
    <script src="{{asset('stisla/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
@endpush

@push('page_specific_js')
  <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
@endpush

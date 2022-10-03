<div>
    @section('title','eform| Detail')
    @push('css_libraries')
    <link rel="stylesheet" href="{{asset('stisla/modules/chocolat/dist/css/chocolat.css')}}">
    @endpush
    @section('section-header','Detail')
    <div class="section-body">
        <h2 class="section-title">Data Pemohon</h2>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="pricing pricing-highlight">
                    <div class="pricing-title">
                        Data Permohonan
                    </div>
                    <div class="row px-2">
                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="gallery gallery-fw" data-item-height="200">
                                        <div class="gallery-item" data-image="{{asset($datas->foto_debitur)}}"
                                            data-title="Image 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h5>Foto Pemohon</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="gallery gallery-fw" data-item-height="200">
                                        <div class="gallery-item" data-image="{{asset($datas->foto_ktp)}}"
                                            data-title="Image 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h5>Foto KTP</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 text-left">
                            <div class="pricing-title d-flex justify-content-center">
                                Identitas Pemohon
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>NIK</td>
                                            <td class="text-center" width="6%">:</td>
                                            <td>{{$datas->nik}}</td>
                                        </tr>
                                        <tr>
                                            <td>NPWP</td>
                                            <td class="text-center" width="6%">:</td>
                                            <td>{{$datas->npwp}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td class="text-center" width="6%">:</td>
                                            <td>{{$datas->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir </td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->birth_place)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir </td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{date("d-m-Y",strtotime($datas->birth_date))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->gender->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->address)}}</td>
                                        </tr>
                                        <tr>
                                            <td>No Telp / HP</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->phone)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kel/Desa</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->subdistrict->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->district->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kab/Kota</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->city->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->province->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu Kandung</td>
                                            <td class="text-center" width="6%"> : </td>
                                            <td>{{strtoupper($datas->mother_name)}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:auth.request.detail.data-cij :datas='$datas'>
    <livewire:auth.request.detail.vici-score :datas='$datas'>
</div>
</div>
@push('page_specific_js')
    <script src="{{asset('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
@endpush
</div>
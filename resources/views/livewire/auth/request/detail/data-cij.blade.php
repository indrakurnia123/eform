<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="pricing pricing-highlight">
            @if($cijdatas['code']==401)
            <div class="card" wire:model="cijdatas">
                    <p class="text-center mx-5 pt-5 pb-5" wire:model="cijdatas" wire:loading.remove wire:target='updateDataCij' >
                        {{$cijdatas['message']}}<br>
                        <a class="btn btn-icon icon-left btn-primary mt-2" wire:click.prevent="updateDataCij({{$datas->id}})" href="#"><i class="fas fa-sync-alt"></i>Cek Data Pinjaman</a>
                    </p>
                    <p class="text-center mx-5 pt-5 pb-5" wire:loading wire:target='updateDataCij'>
                        Cek data pinjaman aktif . . .<br>
                        <a class="btn btn-icon icon-left btn-primary mt-2" wire:model="cijdatas" wire:click.prevent="updateDataCij({{$datas->id}})" href="#"><i class="fas fa-sync-alt loader"></i>Loading</a>
                    </p>
            </div>
            @elseif($cijdatas['code']==500)
                <h6 class="text-center mx-5 pt-5 pb-5">Pemohon tidak memiliki kredit aktif di bank CiJ</h6>
            @else
            <div wire:model='cijdatas' >
                <div class="pricing-title">
                    Data History bank CiJ
                </div>
                <div class="row px-2">
                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-4">
                        <div class="pricing-title">
                            Data Nasabah
                        </div>
                        <div class="card text-left">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>CIF</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nomor_cif']}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nik']}}</td>
                                    </tr>
                                    <tr>
                                        <td>NPWP</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['npwp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Nasabah</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nama']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['jenis_kelamin']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['tempat_lahir_ktp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['tanggal_lahir']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['alamat']}}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telp / HP</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['no_hp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK Pasangan</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nik_pasangan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pasangan</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nama_pasangan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir Pasangan</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['tanggal_lahir_pasangan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu Kandung</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['nama_gadis_ibu_kandung']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Kantor Cabang</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$cijdatas['data']['nasabah']['kode_kantor_cabang']}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-4">
                        <div class="pricing-title">
                            Pinjaman Aktif
                        </div>
                        <div class="card">
                            <div class="card-body text-left">
                                <?php 
                                    $total_plafon=0;
                                    $total_baki_debet=0;
                                    $total_tunggakan_pokok=0;
                                    $total_tunggakan_bunga=0;
                                ?>
                                @foreach($cijdatas['data']['kredit'] as $key => $kredit)
                                <h5 class="mt-2">Pinjaman {{$key+1}}</h5>
                                <table>
                                    <?php 
                                        if($kredit['plafon_awal']){
                                            $total_plafon+=$kredit['plafon_awal'];
                                        }
                                        if($kredit['baki_debet']){
                                            $total_baki_debet+=$kredit['baki_debet'];
                                        }
                                        if($kredit['tunggakan_pokok']){
                                            $total_tunggakan_pokok+=$kredit['tunggakan_pokok'];
                                        }
                                        if($kredit['tunggakan_bunga']){
                                            $total_tunggakan_bunga+=$kredit['tunggakan_bunga'];
                                        }
                                        ?>
                                    <tr>
                                        <td>Plafon</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($kredit['plafon_awal'],0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Baki Debet</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($kredit['baki_debet'],0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kualitas</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$kredit['kode_kolektibilitas']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tunggakan Pokok</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($kredit['tunggakan_pokok'],0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tunggakan Bunga</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($kredit['tunggakan_bunga'],0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Tunggakan Hari</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$kredit['jumlah_hari_tunggakan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Frekuensi Restrukturisasi</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{$kredit['frekuensi_restrukturisasi']}}</td>
                                    </tr>
                                </table>
                                @endforeach
                            </div>
                            <div class="card-footer text-left">
                                <table>
                                    <tr>
                                        <td>Total Plafon</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($total_plafon,0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Baki Debet</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($total_baki_debet,0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Tunggakan Pokok</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($total_tunggakan_pokok,0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Tunggakan Bunga</td>
                                        <td class="text-center" width="6%">:</td>
                                        <td>{{number_format($total_tunggakan_bunga,0,',','.')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-4">
                        <div class="pricing-title">
                            Pinjaman Lunas
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6>Data Tidak tersedia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
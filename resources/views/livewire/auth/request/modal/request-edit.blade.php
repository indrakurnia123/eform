<div class="modal fade" tabindex="-1" role="dialog" id="edit-request-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button> --}}
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent="update()">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Foto Calon Debitur</h4>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="section-title text-center">Foto Debitur</div>
                                            @if($foto_debitur_resize)
                                            <div class="row ">
                                                <div class="col d-flex justify-content-center">
                                                    <img class="img-fluid mt-1" src="{{asset($foto_debitur_resize)}}" alt="{{$foto_debitur_resize}}" width="200px">
                                                </div>
                                            </div>
                                            <div class="mt-1 row text-center" title="{{$foto_debitur_resize}}">
                                                <div class="col">
                                                    <p><small>{{$foto_debitur_resize}}</small></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mt-1 mb-1 d-flex justify-content-center">
                                                        <button wire:model="foto_debitur_resize" wire:click.prevent="clearUploadFoto" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @else  
                                            <div class="d-flex justify-content-center mb-4">
                                                <div class="spinner-border" role="status" wire:loading
                                                    wire:target="foto_debitur">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="card-header-action mb-2">
                                                <button id="pre_take_buttons"class="btn btn-icon icon-left btn-primary"><i class="fas fa-camera"></i>Ambil dari kamera</button>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="media_file" id="media_file"
                                                    wire:model="foto_debitur" accept="image/*">
                                                <label class="custom-file-label" for="media_file">Pilih File</label>                                        
                                                @error('foto_debitur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="section-title text-center">Foto KTP</div>
                                            @if($foto_ktp_resize)
                                            <div class="row ">
                                                <div class="col d-flex justify-content-center">
                                                    <img class="img-fluid mt-1" src="{{asset($foto_ktp_resize)}}" alt="{{$foto_ktp_resize}}" width="200px">
                                                </div>
                                            </div>
                                            <div class="mt-1 row text-center" title="{{$foto_ktp_resize}}">
                                                <div class="col">
                                                    <p><small>{{$foto_ktp_resize}}</small></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mt-1 mb-1 d-flex justify-content-center">
                                                        <button wire:model="foto_ktp_resize" wire:click.prevent="clearUploadFoto" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="d-flex justify-content-center mb-4">
                                                <div class="spinner-border" role="status" wire:loading
                                                    wire:target="foto_ktp">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="card-header-action mb-2">
                                                <button id="pre_take_buttons"class="btn btn-icon icon-left btn-primary"><i class="fas fa-camera"></i>Ambil dari kamera</button>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="media_file" id="media_file"
                                                    wire:model="foto_ktp" accept="image/*">
                                                <label class="custom-file-label" for="media_file">Pilih File</label>                                        
                                                @error('foto_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Data Calon Debitur</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Pastikan data yang anda masukan sesuai e-KTP sebelum proses verifikasi
                                    oleh sistem</p>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">No. Permohonan</label>
                                        <input type="text" wire:model="request_number"
                                            class="form-control @error('request_number') is-invalid @enderror"
                                            placeholder="No. Permohonan" disabled>
                                        @error('request_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Nomor Hp (contoh : 6281234567890)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" wire:model.lazy="phone"
                                                class="form-control phone-number @error('phone') is-invalid @enderror"
                                                placeholder="No HP" maxlength="15" value="sdasjdlkajs">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">No. KTP (NIK)</label>
                                        <input type="text" wire:model.lazy="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="No. KTP (NIK)" maxlength="16">
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">No. NPWP (Jika ada)</label>
                                        <input type="text" wire:model.lazy="npwp"
                                            class="form-control @error('npwp') is-invalid @enderror" placeholder="No. NPWP">
                                        @error('npwp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">Nama Lengkap</label>
                                        <input type="text" wire:model.lazy="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama Lengkap">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">Alamat</label>
                                        <input type="text" wire:model="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Alamat">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Provinsi</label>
                                        <select wire:model="province_id"
                                            class="form-control @error('province_id') is-invalid @enderror">
                                            <option>-Pilih Provinsi-</option>
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Kota / Kabupaten</label>
                                        <select wire:model="city_id"
                                            class="form-control @error('city_id') is-invalid @enderror">
                                            <option>-Pilih Kota / Kab.-</option>
                                            @if($province_id)
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('city_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Kecamatan</label>
                                        <select wire:model="district_id"
                                            class="form-control @error('district_id') is-invalid @enderror">
                                            <option>-Pilih Kecamatan-</option>
                                            @if($city_id)
                                                @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('district_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Desa / Kelurahan</label>
                                        <select wire:model.lazy="subdistrict_id"
                                            class="form-control @error('subdistrict_id') is-invalid @enderror">
                                            <option>-Pilih Desa / Kelurahan-</option>
                                            @if($district_id)
                                                @foreach($subdistricts as $subdistrict)
                                                <option value="{{$subdistrict->id}}">{{$subdistrict->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('subdistrict_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">Tempat Lahir</label>
                                        <input type="text" wire:model.lazy="birth_place"
                                            class="form-control @error('birth_place') is-invalid @enderror"
                                            placeholder="Tempat Lahir">
                                        @error('birth_place')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input type="date" wire:model.lazy="birth_date"
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            placeholder="Tanggal Lahir">
                                        @error('birth_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label>Jenis Kelamin</label>
                                        <select wire:model.lazy="gender_id"
                                            class="form-control selectric @error('gender_id') is-invalid @enderror">
                                            <option>-Pilih Jenis Kelamin-</option>
                                            @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <label class="font-weight-bold">Nama Ibu Kandung</label>
                                        <input type="text" wire:model.lazy="mother_name"
                                            class="form-control @error('mother_name') is-invalid @enderror"
                                            placeholder="Nama Ibu Kandung">
                                        @error('mother_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right modal-footer">
                                <button class="btn btn-secondary" wire:click="$emit('hideModal')">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save</button>
                                <div wire:loading wire:target="update()">process...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
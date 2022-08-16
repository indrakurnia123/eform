@section('title','eform| Register')
<div>
    @section('section-header','Request')

    <div class="section-body">
        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-4">     
            <form wire:submit.prevent="store">
            <div class="card">
                <div class="card-header">
                <h4>Foto Calon Debitur</h4>
                </div>
                <div class="card-body">                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Foto Selfie + KTP</h4>
                            <div class="card-header-action">
                            <a href="#" class="btn btn-primary">Ambil Gambar</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <label class="col-12 text-center">Browse Foto</label>
                                <div class="form-group col-12">
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Foto KTP</h4>
                            <div class="card-header-action">
                            <a href="#" class="btn btn-primary">Ambil Gambar</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <label class="col-12 text-center">Browse Foto</label>
                                <div class="form-group col-12">
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
                <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Data Calon Debitur</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Pastikan anda masukan sudah sesuai KTP sebelum proses verifikasi oleh sistem</p>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="font-weight-bold">No. Permohonan</label>
                            <input type="text" wire:model.lazy="request_number" class="form-control @error('request_number') is-invalid @enderror" placeholder="No. Permohonan">
                            @error('request_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-6">
                            <label>Nomor Hp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                                </div>
                                <input type="text" wire:model.lazy="phone" class="form-control phone-number @error('phone') is-invalid @enderror" placeholder="No HP">
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="font-weight-bold">No. KTP (NIK)</label>
                            <input type="text" wire:model.lazy="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="No. KTP (NIK)" maxlength="16">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-6">
                            <label class="font-weight-bold">No. NPWP (Jika ada)</label>
                            <input type="text" wire:model.lazy="npwp" class="form-control @error('npwp') is-invalid @enderror" placeholder="No. NPWP">
                            @error('npwp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
     
                    
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" wire:model.lazy="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="font-weight-bold">Tempat Lahir</label>
                            <input type="text" wire:model.lazy="birth_place" class="form-control @error('birth_place') is-invalid @enderror" placeholder="Tempat Lahir">
                            @error('birth_place')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="font-weight-bold">Tanggal Lahir</label>
                            <input type="date" wire:model.lazy="birth_date" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('birth_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
</div>

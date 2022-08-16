@section('title','eform| Register')
<div>
    @section('section-header','Register')
    <div class="card card-primary">
        <div class="card-header"><h4>Masukan data user</h4></div>

        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="form-group col-6">
                        <label class="font-weight-bold">Username</label>
                        <input type="text" wire:model.lazy="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
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
                    <div class="form-group col-6">
                        <label class="font-weight-bold">Email</label>
                        <input type="text" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>Nomor Whatsapp (62xxxxxx)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            </div>
                            <input type="text" wire:model.lazy="phone" class="form-control phone-number @error('phone') is-invalid @enderror" placeholder="No Whatsapp (62xxxxxx)">
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
                        <label>Role</label>
                        <select wire:model.lazy="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option>-Role-</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->description}}</option>
                            @endforeach
                        </select>
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>Kantor</label>
                        <select wire:model.lazy="office_id" class="form-control @error('office_id') is-invalid @enderror">
                            <option>-Kantor-</option>
                            @foreach($offices as $office)
                                <option value="{{$office->id}}">{{$office->name}}</option>
                            @endforeach
                        </select>
                            @error('office_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>  
                <div class="row justify-content-right">
                    <div class="form-group col-md-2 col-lg-2 col-sm-6 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
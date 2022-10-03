    <div>
        
        @section('title','eform | Register User')
        @section('section-header','Register')
        <section class="section">
            <div class="section-body">
              <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card profile-widget">
                    <div class="profile-widget-header">
                      <img alt="image" src="{{asset($user->image)}}" class="rounded-circle profile-widget-picture">
                      <div class="profile-widget-items">
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">{{$user->name}}</div>
                          <div class="profile-widget-item-value">{{$user->role->description}}</div>
                        </div>
                    </div>
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->role->description}}</div></div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-body">
                        <form wire:submit.prevent="update">
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
              </div>
            </div>
        </section>
    </div>

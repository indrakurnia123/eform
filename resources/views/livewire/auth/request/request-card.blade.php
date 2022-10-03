<div class="col-md-3">
    <li class="custom-request-card card mb-3 px-2" data-item-height="45">
        <div class="gallery gallery-md card-header">
            <div class="gallery-item" wire:model="request" data-image="{{($request->foto_debitur)?asset($request->foto_debitur):asset('/img/default/no-image.jpg')}}" data-title="Foto Debitur" href="{{($request->foto_debitur)?asset($request->foto_debitur):'#'}}" title="Foto Debitur" style="background-image: url({{($request->foto_debitur)?asset($request->foto_debitur):asset('/img/default/no-image.jpg')}})"></div>
            <div class="gallery-item" wire:model="request" data-image="{{($request->foto_ktp)?asset($request->foto_ktp):asset('/img/default/no-image.jpg')}}" data-title="KTP KTP" href="{{($request->foto_ktp)?asset($request->foto_ktp):'#'}}" title="Foto Debitur" style="background-image: url({{($request->foto_ktp)?asset($request->foto_ktp):asset('/img/default/no-image.jpg')}})"></div>
        </div>
        <div class="card-body">
            <div class="media-title"><strong>{{strtoupper($request->name)}}</strong></div>
            <div class="media-title">{{$request->request_number}}</div>
            <div class="mt-1">
                <div class="budget-price">
                    <p>
                        {{ucwords(strtolower($request->address))}}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer py-2">
            <span class="{{$request->request_status->badge}}"><small>{{$request->request_status->name}}</small></span>
            <span class="{{$request->nasabah_status->badge}}"><small>{{$request->nasabah_status->name}}</small></span>
        </div>                                
        <div class="pricing-cta d-flex justify-content-center py-2 row">
            <div class="col">
                <button class="btn btn-icon icon-left btn-success" wire:click="$emit('showModal','auth.request.modal.request-edit',{{$request->id}})">
                    <i class="fas fa-edit"></i>{{__('Edit Request')}}
                </button>
                <button class="btn btn-primary trigger--fire-modal-1" wire:click.prevent="showEditModal">
                    test modal stisla
                </button>
                <a class="btn btn-icon icon-right btn-primary" href="{{url('/request/detail/'.$request->id)}}">Detail<i class="fas fa-arrow-right"></i> </a>
            </div> 
        </div>  
    </li>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
    @push('page_specific_js')
        <script src="{{asset('stisla/js/custom.js')}}"></script>
    @endpush
</div>
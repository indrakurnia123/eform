
<div class="col-12 col-sm-6 col-md-6 col-lg-3">
    <article class="article">
        <div class="article-header">
            <div class="article-image" data-background="{{asset($request->foto_debitur)}}">
            </div>
            <div class="article-badge">
                <div class="{{$request->request_status->badge}}">{{$request->request_status->name}}</div>
            </div>
        </div>
        <div class="article-details">
            <div class="article-title">
                <h6>{{$request->name}}</h6>
            </div>
            <div class="article-category text-small"><small>{{$request->nik}} @if($request->npwp!="") | {{$request->npwp}} @endif</small></div>
            <p style="font-size:9pt">
                {{$request->birth_place.", ".date("d-m-Y",strtotime($request->birth_date))}}
            </p>
            <p class="mt-0">
                {{$request->address.", Desa ".$request->subdistrict->name.", Kec.".$request->district->name.", ".$request->city->name." Provinsi ".$request->province->name}}
            </p>
            <div class="media">
                <div class="media-body">
                    <div class="media-right"><small class="badge badge-secondary">unknown</small></div>
                    <div class="media-title">Verifikasi Vici</div>
                </div>
            </div>
            <livewire:auth.request.nasabah-status :id='$request->id'>
            <div class="gallery mt-1" data-item-height="200">
                <div class="gallery-item" data-image="{{asset($request->foto_debitur)}}" data-title="Foto Debitur"></div>
                <div class="gallery-item" data-image="{{asset($request->foto_ktp)}}" data-title="KTP Debitur"></div>
            </div>
            <div class="article-cta">
                <a href="{{url('/request/detail/'.$request->id)}}">Detail<i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="article-cta">
                <a href="#" wire:click.prevent='auth.request.request-edit'>Edit<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </article>
</div>
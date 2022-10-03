@push('page_specific_css')
<link rel="stylesheet" href="{{asset('css/gauge-chart.css')}}">
@endpush
@push('page_specific_js_head')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endpush
@if($viciscores)
<div class="pricing pricing-highlight">
  <div class="pricing-title">
      Viciscore Data
  </div>
  <div class="row">
    <div class="col-md-4">
        <div class="card h-100 px-2">
          <div class="card-body text-center">
            <figure class="highcharts-figure">
              <div id="container"></div>
              <p class="highcharts-description badge badge-danger">
                {{$score_category}}
              </p>
            </figure>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
          <div class="card-header"><strong>nik</strong></div>
          <div class="card-body">
            Related NIK
          </div>
        </div>
        <div class="card">
          <div class="card-header"><strong>Deskripsi</strong></div>
          <div class="card-body">
           nik
          </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
          <div class="card-header"><strong>status</strong></div>
          <div class="card-body">
            Status
          </div>
        </div>
        <div class="card">
          <div class="card-header"><strong>longest_arrears</strong></div>
          <div class="card-body">
            Tunggakan Hari
          </div>
        </div>
        <div class="card">
          <div class="card-header"><strong>most_arrears</strong></div>
          <div class="card-body">
            Jumlah Tunggakan
          </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
          <div class="card-header"><strong>highest_plafon</strong></div>
          <div class="card-body">
            Plafon Terbesar
          </div>
        </div>
        <div class="card">
          <div class="card-header"><strong>active_loan</strong></div>
          <div class="card-body">
            Jumlah Pinjaman Aktif
          </div>
        </div>
        <div class="card">
          <div class="card-header"><strong>total_active_loan</strong></div>
          <div class="card-body">
            Total Pinjaman Aktif
          </div>
        </div>
    </div>
  </div>
</div>
@else
<div class="card">
  <p class="text-center mx-5 pt-5 pb-5">
      Viciscore belum tersedia<br>
      <a class="btn btn-icon icon-left btn-primary mt-2" href="#"><i class="fas fa-sync-alt"></i>Cek Vici Data</a>
  </p>
  {{-- <p class="text-center mx-5 pt-5 pb-5" >
      Cek data pinjaman aktif . . .<br>
      <a class="btn btn-icon icon-left btn-primary mt-2" href="#"><i class="fas fa-sync-alt loader"></i>Loading</a>
  </p> --}}
</div>
@endif
@push('page_specific_js')
@endpush
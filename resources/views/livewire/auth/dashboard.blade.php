@section('title','eForm | Dashboard')
<div>
    @section('section-header','Dashboard')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Users</h4>
                </div>
                <div class="card-body">
                {{$users['all']}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Permohonan</h4>
                </div>
                <div class="card-body">
                {{$requests['all']}}
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Permohonan Hari Ini</h4>
                </div>
                <div class="card-body">
                {{$requests['today']}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

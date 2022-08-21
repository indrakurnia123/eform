	<div class="col-lg-4 col-md-4 col-sm-12">
		<div class="card card-statistic-2">
			<div class="card-stats">
				<div class="card-stats-title">
					{{$title}}
					<div class="dropdown d-inline">
						<a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">{{$month}}</a>
						<ul class="dropdown-menu dropdown-menu-sm" id="select-month">
							<li class="dropdown-title">Select Month</li>
                            @foreach($months as $month)
							<li><a href="#" class="dropdown-item" onclick="monthChange(this)">{{$month->name}}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>
				<div class="card-stats-items">
                    @foreach($datas as $data)    
					<div class="card-stats-item">
						<div class="card-stats-item-count">{{$data->jml}}</div>
						<div class="card-stats-item-label">{{$data->name}}</div>
					</div>
                    @endforeach
				</div>
			</div>
			<div class="card-icon shadow-primary bg-primary">
				<i class="fas fa-archive"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>{{$subtitle}}</h4>
				</div>
				<div class="card-body">
					{{$sumdatas[0]->jml}}
				</div>
			</div>
		</div>
	</div>
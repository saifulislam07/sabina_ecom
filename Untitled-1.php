<!-- Page Breadcrumb -->
<div class="page-breadcrumbs breadcrumbs-fixed">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Dashboard</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative page-header-fixed">
    <div class="header-title">
        <h1>
            Dashboard
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="#">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="well">
		<div class="row">
			<div class="col-lg-6">
				<div class="widget">
					<div class="widget-header ">
						<span class="widget-caption">Total Receivables</span>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="col-lg-12">
								<h6>Total unpaid invoices {{ $currencyLabel, ' ', $receiveable->balance }}</h6>
								<div class="progress bg-yellow progress-sm progress-no-radius">									
									<div class="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ $receive_able  }}%"></div>
								</div>
								<div class="col-lg-6 padding-0">
									<h6 class="text-success margin-0">CURRENT </h6>
									<h6 class="margin-0">{{ $currencyLabel, ' ', $receiveable->balance - $overDueReceiveable->balance }}</h6>
								</div>
								<div class="col-lg-6 padding-0">
									<h6 class="text-danger margin-0">OVERDUE </h6>
									<h6 class="margin-0">{{ $currencyLabel, ' ', $overDueReceiveable->balance }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="widget">
					<div class="widget-header ">
						<span class="widget-caption">Total Payables</span>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="col-lg-12">
								<h6>Total unpaid bills {{ $currencyLabel, ' ', $payable->balance }}</h6>
								<div class="progress bg-yellow progress-sm progress-no-radius">									
									<div class="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pay_able  }}%"></div>
								</div>
								<div class="col-lg-6 padding-0">
									<h6 class="text-success margin-0">CURRENT </h6>
									<h6 class="margin-0">{{ $currencyLabel, ' ', $payable->balance - $overDuePayable->balance }}</h6>
								</div>
								<div class="col-lg-6 padding-0">
									<h6 class="text-danger margin-0">OVERDUE </h6>
									<h6 class="margin-0">{{ $currencyLabel, ' ', $overDuePayable->balance }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="horizontal-space"></div>
		
        <div class="row">
			<div class="col-lg-12">
				<div class="widget">
					<div class="widget-header ">
						<span class="widget-caption">Cash Flow</span>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="col-lg-9" style="border-right:1px solid #CCCCCC">
								<div id="line-chart-2" class="chart chart-lg"></div>
							</div>
							<div class="col-lg-3">
								<div class="chart chart-lg text-right">
									<br  />
									<h5 class="text-muted">Cash as on {{$startDate}}</h5>
									<h4>{{ $currencyLabel }} @if(!empty($cashOpening->balance)) {{ $cashOpening->balance }} @else {{ 0.00 }} @endif </h4>
									<h5 class="text-success">Incoming</h5>
									<h4>{{ $currencyLabel, ' ', $cashStatistics->income }}</h4>
									<h5 class="text-danger">Outgoing</h5>
									<h4>{{ $currencyLabel, ' ', $cashStatistics->expense }}</h4>
									<h5 class="text-info">Cash as on {{$endDate}}</h5>
									<h4>{{ $currencyLabel, ' ', $cashOpening->balance + $cashStatistics->income - $cashStatistics->expense }}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="horizontal-space"></div>
		
		<div class="row">
			<div class="col-lg-6">	
				<div class="widget">
					<div class="widget-header">
						<span class="widget-caption">Income Expense</span>
					</div>			
					<div class="widget-body">	
						<div id="bar-chart" class="chart chart-lg"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="widget">
					<div class="widget-header">
						<span class="widget-caption">Top Expense</span>
					</div>			
					<div class="widget-body">
						<div id="pie-chart" class="chart chart-lg"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">	
				<div class="widget">
					<div class="widget-header">
						<span class="widget-caption">Tax Payable / Receivable</span>
					</div>			
					<div class="widget-body">	
						<div id="tax-chart" class="chart chart-lg"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="widget">
					<div class="widget-header">
						<span class="widget-caption">Realized Gain or Loss</span>
					</div>			
					<div class="widget-body">	
						<div id="currency-chart" class="chart chart-lg"></div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
<!-- /Page Body -->

<script>	
	Number.prototype.formatMoney = function(){
		c = 2;
		d = '.';
		t = ',';
		var n = this, 
	    s = n < 0 ? "-" : "", 
	    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
	    j = (j = i.length) > 3 ? j % 3 : 0;
	   return "{{ $currencyLabel }} " + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};

	months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

	var InitiateLineChart2 = function () {
		return {
			init: function () {				
				Morris.Line({
					element: 'line-chart-2',
					data: [					   
					  <?php
					  	$opening = !empty($cashOpening->balance) ? $cashOpening->balance : 0;
					  	foreach($cashFlow as $v) :
					  		$closing = $opening + $v->income - $v->expense;					  		
					  ?>
					  { y: '{{$v->date}}', o: {{$opening}}, i: {{$v->income}}, e: {{$v->expense}}, c: {{$closing}} }, 
					  <?php 
					  		$opening = $closing;
					  	endforeach; 
					  ?>					  				  				  
					],
					xkey: 'y',
					ykeys: ['c'],
					xLabelFormat: function (x) { 
						return months[x.getMonth()]+' '+x.getFullYear().toString().substr(2,2); 						
					},
					xLabelAngle: 90,
					yLabelFormat: function (y) { 
						var k = parseInt(y/1000);
						return (k == 0) ? y : k.toString() + ' k';
					},
					labels: ['Opening Balance'],								
					dateFormat: function (x) { 
						var t = new Date(x); 
						return months[t.getMonth()]+' '+t.getFullYear().toString(); 
					},
					hideHover: true,
					hoverCallback: function (index, options, content) {
					  	var data = options.data[index];
					  	var t = new Date(data.y);
					  	var xCaption = months[t.getMonth()]+' '+t.getFullYear().toString().substr(2,2)				  
						return "<div class='morris-hover-row-label'>"+xCaption+"</div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-6 margin-0 padding-0 text-right text-muted'>Opening Balance:</p> <p class='col-md-6 margin-0 text-left'>"+data.o.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-6 margin-0 padding-0 text-right text-success'>Incoming:</p> <p class='col-md-6 margin-0 text-left'>"+data.i.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-6 margin-0 padding-0 text-right text-danger'>Outgoing:</p> <p class='col-md-6 margin-0 text-left'>"+data.e.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-6 margin-0 padding-0 text-right text-info'>Ending Balance:</p> <p class='col-md-6 margin-0 text-left'>"+data.c.formatMoney()+"</p> </div>";
				  		
					},
					resize: true,
					smooth: false,
					lineWidth: 1,
					lineColors: ['#58ade5'],
				});	
			}
		};
	}();
	
	InitiateLineChart2.init();
	
	var InitiateBarChart = function () {
			return {
				init: function () {
					Morris.Bar({
						element: 'bar-chart',
						data: [						  	
						  @foreach($incomeExpense as $v)
						  { y: '{{$v->date}}', a: {{$v->income}}, b: {{$v->expense}}},	
						  @endforeach					 
						],
						xkey: 'y',
						ykeys: ['a', 'b'],
						xLabelFormat: function (x) { 							
							x = new Date(x.label);
							return months[x.getMonth()]+' '+x.getFullYear().toString().substr(2,2); 						
						},
						xLabelAngle: 90,
						yLabelFormat: function (y) { 
							var k = parseInt(y/1000);
							return (k == 0) ? y : k.toString() + ' k';
						},
						labels: ['Income', 'Expenses'],
						hideHover: true,
						hoverCallback: function (index, options, content) {
						  	var data = options.data[index];
						  	var t = new Date(data.y);
						  	var xCaption = months[t.getMonth()]+' '+t.getFullYear().toString().substr(2,2)				  
							return "<div class='morris-hover-row-label'>"+xCaption+"</div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-success'>Income:</p> <p class='col-md-8 margin-0 text-left'>"+data.a.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-danger'>Expense:</p> <p class='col-md-8 margin-0 text-left'>"+data.b.formatMoney()+"</p> </div>";
					  		
						},
						barColors: ['#a9d47d', '#edc456']
					});
				}
			};
		}();
		
		InitiateBarChart.init();	

		var InitiatePieChart = function () {
		    return {
		        init: function () {	
		            var data = [
		            	@foreach($topExpenseList as $e)
		            	@if($e->expense > 0)
		            	{ label: "{{ $e->subsidiary_name }}", data: {{ $e->expense }} },
		            	@endif
		            	@endforeach
		            ];

		            var placeholder = $("#pie-chart");

		            $.plot(placeholder, data, {
	                    series: {
	                        pie: {
	                            show: true
	                        }
	                    },
	                    grid: {
	                        hoverable: true,
	                        clickable: true
	                    }
	                });

	                placeholder.bind("plotclick", function (event, pos, obj) {

	                    if (!obj) {
	                        return;
	                    }

	                    percent = parseFloat(obj.series.percent).toFixed(2);
	                    alert("" + obj.series.label + ": " + percent + "%");
	                });
		        }
		    };
		}();

		InitiatePieChart.init();	


		var InitiateTaxChart = function () {
			return {
				init: function () {
					Morris.Bar({
						element: 'tax-chart',
						data: [
						  @foreach($taxCharList as $v)
						  { y: '{{$v->date}}', a: {{ $v->payable }}, b: {{ $v->receiveable }} },	
						  @endforeach						  
						],
						xkey: 'y',
						ykeys: ['a', 'b'],
						xLabelFormat: function (x) { 							
							x = new Date(x.label);
							return months[x.getMonth()]+' '+x.getFullYear().toString().substr(2,2); 						
						},
						xLabelAngle: 90,
						yLabelFormat: function (y) { 
							var k = parseInt(y/1000);
							return (k == 0) ? y : k.toString() + ' k';
						},						
						labels: ['Payable', 'Receivable'],
						hideHover: 'auto',
						hoverCallback: function (index, options, content) {
						  	var data = options.data[index];
						  	var t = new Date(data.y);
						  	var xCaption = months[t.getMonth()]+' '+t.getFullYear().toString().substr(2,2)				  
							return "<div class='morris-hover-row-label'>"+xCaption+"</div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-success'>Payable:</p> <p class='col-md-8 margin-0 text-left'>"+data.a.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-danger'>Receivable:</p> <p class='col-md-8 margin-0 text-left'>"+data.b.formatMoney()+"</p> </div>";
					  		
						},
						barColors: ['#a9d47d', '#edc456']
					});
				}
			};
		}();
		
		InitiateTaxChart.init();

		var InitiateCurrencyExchangeChart = function () {
			return {
				init: function () {
					Morris.Bar({
						element: 'currency-chart',
						data: [
						  @foreach($gainLossList as $v)
						  { y: '{{$v->date}}', a: {{$v->gain}}, b: {{$v->loss}}},	
						  @endforeach
						],
						xkey: 'y',
						ykeys: ['a', 'b'],
						xLabelFormat: function (x) { 							
							x = new Date(x.label);
							return months[x.getMonth()]+' '+x.getFullYear().toString().substr(2,2); 						
						},
						xLabelAngle: 90,
						yLabelFormat: function (y) { 
							var k = parseInt(y/1000);
							return (k == 0) ? y : k.toString() + ' k';
						},
						labels: ['Gain', 'Loss'],
						hideHover: 'auto',
						hoverCallback: function (index, options, content) {
						  	var data = options.data[index];
						  	var t = new Date(data.y);
						  	var xCaption = months[t.getMonth()]+' '+t.getFullYear().toString().substr(2,2)				  
							return "<div class='morris-hover-row-label'>"+xCaption+"</div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-success'>Gain:</p> <p class='col-md-8 margin-0 text-left'>"+data.a.formatMoney()+"</p> </div><div class='morris-hover-point' style='color: #000000'> <p class='col-md-4 margin-0 padding-0 text-right text-danger'>Loss:</p> <p class='col-md-8 margin-0 text-left'>"+data.b.formatMoney()+"</p> </div>";
					  		
						},
						barColors: ['#a9d47d', '#edc456']
					});
				}
			};
		}();
		
		InitiateCurrencyExchangeChart.init();	
</script>
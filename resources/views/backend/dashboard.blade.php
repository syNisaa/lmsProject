@extends('backend.index')
@section('content')
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total
							</h4>
							<span class="wc-des">
								Semua Course
							</span>
							<span class="wc-stats">
								<span class="counter">{{ $jml }}</span> 
							</span>	
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									100%
								</span>
							</span>	
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 Total
							</h4>
							<span class="wc-des">
								Semua Mentor
							</span>
							<span class="wc-stats counter">
								{{$jml_mentor}}
							</span>	
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									100%
								</span>
							</span>	
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total 
							</h4>
							<span class="wc-des">
								Semua Peserta
							</span>
							<span class="wc-stats counter">
								{{$jml_peserta}} 
							</span>	
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									100%
								</span>
							</span>	
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total  
							</h4>
							<span class="wc-des">
								Kategori Course
							</span>
							<span class="wc-stats counter">
								{{$jml_kategori}}
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									100%
								</span>
							</span>
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Grafik Jumlah Course per Kategori Course</h5>

							<!-- Bar Chart -->
							<canvas id="barChart" style="max-height: 400px;"></canvas>
							<script>
								//ambil data nama kategori dan jumlah asset per asset dari DashboardController di fungsi index
								var lbl = [@foreach($grafik_bar as $gb) '{{ $gb->nama }}', @endforeach];
								var jml = [@foreach($grafik_bar as $gb) {{ $gb->jml }}, @endforeach];
								document.addEventListener("DOMContentLoaded", () => {
									new Chart(document.querySelector('#barChart'), {
										type: 'bar',
										data: {
											/*
											labels: ['January', 'February', 'March', 'April', 'May', 'June',
												'July'
											],
											*/
											labels: lbl,
											datasets: [{
												label: 'Perbandingan Jumlah Course',
												//data: [65, 59, 80, 81, 56, 55, 40],
												data: jml,
												backgroundColor: [
													'rgba(255, 99, 132, 0.2)',
													'rgba(255, 159, 64, 0.2)',
													'rgba(255, 205, 86, 0.2)',
													'rgba(75, 192, 192, 0.2)',
													'rgba(54, 162, 235, 0.2)',
													'rgba(153, 102, 255, 0.2)',
													'rgba(201, 203, 207, 0.2)'
												],
												borderColor: [
													'rgb(255, 99, 132)',
													'rgb(255, 159, 64)',
													'rgb(255, 205, 86)',
													'rgb(75, 192, 192)',
													'rgb(54, 162, 235)',
													'rgb(153, 102, 255)',
													'rgb(201, 203, 207)'
												],
												borderWidth: 1
											}]
										},
										options: {
											scales: {
												y: {
													beginAtZero: true
												}
											}
										}
									});
								});

							</script>
							<!-- End Bar CHart -->

						</div>
					</div>
				</div>
			
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Grafik Total Harga per Kategori Asset</h5>

							<!-- Pie Chart -->
							<canvas id="pieChart" style="max-height: 400px;"></canvas>
							<script>
								var lbl2 = [@foreach($grafik_pie as $gp) '{{ $gp->nama }}', @endforeach];
								var total = [@foreach($grafik_pie as $gp) {{ $gp->jml }}, @endforeach];
								document.addEventListener("DOMContentLoaded", () => {
									new Chart(document.querySelector('#pieChart'), {
										type: 'pie',
										data: {
											/*
											labels: [
												'Red',
												'Blue',
												'Yellow'
											],
											*/
											labels:lbl2,
											datasets: [{
												label: 'Perbandingan Jumlah Course di setiap kategori',
												//data: [300, 50, 100],
												data: total,
												backgroundColor: [
													'rgb(255, 99, 132)',
													'rgb(54, 162, 235)',
													'rgb(255, 205, 86)',
													'rgb(60, 179, 113)',
													'rgb(106, 90, 205)'
												],
												hoverOffset: 4
											}]
										}
									});
								});

							</script>
							<!-- End Pie CHart -->
						</div>
					</div>	
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Basic Calendar</h4>
						</div>
						<div class="widget-inner">
							<div id="calendar"></div>
						</div>
					</div>
@endsection
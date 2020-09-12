<head>
	<title>Dashboard - Administrator POS Amnotel</title>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<style>
	body {
		font-family: 'Open Sans', sans-serif;
		font-size: 12px;
	}
	div:nth-child(1) {
		font-family: 'Open Sans', sans-serif;
	}
	div:nth-child(2) {
		font-family: 'Open Sans', sans-serif;
	}
	</style>
</head>
<div class="row d-flex align-items-center">
	<div class="mr-auto col-md-3 mt-1 mb-1">
		<h3 class="m-subheader__title">
			<label for="">Dashboard</label>
		</h3>
	</div>
	<div class="col-md-9 mt-1 mb-1 text-right">
		<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
			<span class="m-subheader__daterange-label">
				<!-- <span id="hijriyah"></span> -->
				<span class="m-subheader__daterange-title">Hari ini :</span>
				<span class="m-subheader__daterange-date m--font-brand" id="jamtanggal"></span>							
			</span>
			<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
				<i class="fa fa-calendar"></i>
			</a>
		</span>
	</div>
</div>
<br />
<div class="row">
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(230deg, #46dd6c, #102b08)">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Laba Harian</h5>
						<!--<h3 class="num-dashboard"><?php echo $countlaba; ?></h3>-->
						<h3 class="num-dashboard"><?php	$a=0;									
							foreach($countlaba->result() as $row) {
								foreach($countlabatt->result() as $rowtt) {?>
									<?php $a=$row->total + $rowtt->totaltt; echo $a;
								}
							}?>
						</h3>
					</div>
					<div class="col-4">
						<i class="fa fa-money fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div>   
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(230deg, #102e56, #721cf6)">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Total Karyawan</h5>
						<h3 class="num-dashboard"><?php echo $countkasir; ?></h3>
					</div>
					<div class="col-4">
						<i class="fa fa-users fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(230deg, #dd468f, #410c25 )">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Total Pengeluaran</h5>
						<h3 class="num-dashboard"><?php echo $counttotalpengeluaran; ?></h3>
					</div>
					<div class="col-4">
						<i class="fa fa-share fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div>  
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(230deg, #7f7b76, #ff9500)">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Barang Terjual</h5>
						<h3 class="num-dashboard"><?php echo $countbarangterjual; ?></h3>
					</div>
					<div class="col-4">
						<i class="fa fa-check fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(220deg, black, gray)">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Stok Barang</h5>
						<h3 class="num-dashboard"><?php echo $countbarang; ?></h3>
					</div>
					<div class="col-4">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div>   
	<div class="col-xl-4">
		<div class="m-portlet m-portlet--mobile" style="background: linear-gradient(230deg, #176, #255)">
			<div class="m-portlet__body " style="color: #fff!important">
				<div class="row align-items-center">
					<div class="col-8">
						<h5>Total Service</h5>
						<h3 class="num-dashboard"><?php echo $counttransaksiteknisi; ?></h3>
					</div>
					<div class="col-4">
						<i class="fa fa-wrench fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
	</div>           

<div class="col-md-2 col-md-2"></div>            
	<div class="col-lg-12">
	<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Laporan Pemasukan Bulanan
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body text-center">
				<div id="m_morris_3" style="height:250px;">
				</div>
			</div>
		</div>
	<!--end::Portlet-->
	</div>						
</div>
<!-- /.row -->

</div>

</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>

<script src="http://hrms.amnotel.co.id/assets/datatables/jquery.dataTables.js"></script>
<script src="http://hrms.amnotel.co.id/assets/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/assets/app/js/dashboard.js" type="text/javascript"></script>
<script src="assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>

<!--<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>-->
<script>
Morris.Bar({
element: 'm_morris_3',
data: <?php echo $dataa;?>,
xkey: 'bulan',
ykeys: ['purchase', 'sale', 'profit'],
labels: ['Pemasukan Teknisi', 'Pemasukan Kasir', 'Pengeluaran']
});
</script>

<!-- test jquery -->
<script type="text/javascript">

$(document).ready(function(){
// alert('test jquery');

});
</script>
<script>
					// Function ini dijalankan ketika Halaman ini dibuka pada browser
					$(function() {
						setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
					});

					function timestamp() {
						$.ajax({
							url: 'https://hrms.amnotel.co.id/calendar/jam',
							success: function(data) {
								$('#jamtanggal').html(data);
							},
						});
					};
				</script>
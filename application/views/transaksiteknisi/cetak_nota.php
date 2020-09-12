<head>
    <title>CETAK TRANSAKSI SERVICE</title>
    <meta charset="utf-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->        

	<!--<link href="http://hrms.amnotel.co.id/assets/admin/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="http://hrms.amnotel.co.id/assets/admin/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->
	<link rel="stylesheet" href="http://hrms.amnotel.co.id/assets/admin/customkita/customcss.css">	
        
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/custom.css" rel="stylesheet">

    <!--begin::Base Styles -->  
    <!--begin::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		
		<!--end::Base Styles -->    

    <link href="<?php echo base_url(); ?>assets/asset/css/datepicker.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700%7COpen+Sans:300,400,500,600,700" media="all">
		
    
     
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/assets/demo/default/media/img/logo/logoposs.png"/>
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>    
    <div class="text-center" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <!--<div class="modal-content">-->
        <div class="modal-body"><br />
            <div class="row mb-2">
                                    <div class="col-2">
                                        <br><br><img src="https://hrms.amnotel.co.id/assets/image/logo/aatcdv.png" class="w-100">
                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
                                        <br><p style="margin-bottom: 5px"><strong>AMNOTEL STORE</strong></p>
                                        <p style="margin-bottom: 5px"><i>trusted in connecting and securing your business</i></p>
                                        <p style="margin-bottom: 5px">Jl. Potronanggan RT.06, Kragilan, Tamanan, Banguntapan, Bantul, Yogyakarta, 55191</p>
                                    </div>
                                </div>
            <div class="text-center">
                <span >Faktur Service</span><br>          
                <span class="text-center"><?php echo tgl_indonesia_transaksi($tanggal_service);?></span>
            </div>
            <div class="text-left">
                <span id=no_transaksi>No Transaksi : <?php echo $autonumber ?></span><br>
                <span>Petugas&emsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo  $this->session->userdata['full_name']; ?></span>
            </div>
            <br>
            <?php //$totalharga=0;
                    foreach($tmptrservice as $tmptrservice):?>

            <table width="100%">
                <thead>
                    <tr>
                        <th class="text-left">Nama Barang</th>
                        <th class="text-center">Kerusakan</th>
                        <th class="text-right">Estimasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left"><?php echo $tmptrservice->merk;?><br><?php echo $tmptrservice->imei;?></td>
                        <td class="text-center"><?php echo $tmptrservice->kerusakan;?></td>
                        <td class="text-right"><?php echo $tmptrservice->estimasi;?></td>
                    </tr>
                </tbody>
            </table>
            <?php endforeach;?>            
            <hr style="border-bottom: 0.5px solid #525252;padding-bottom: 0px;">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th class="text-right">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><br><br><br>_____________</td>
                        <td class="text-right"><br><br><br><?php echo  $this->session->userdata['full_name']; ?></td>
                    </tr>
                </tbody>
            </table>
    </div>    
</body>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>



<!-- Metis Menu Plugin JavaScript--> 
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>

	<!-- begin::Quick Nav -->	
	<!--begin::Base Scripts -->
	<script src="<?php echo base_url(); ?>/assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Base Scripts -->   
	<!--begin::Page Vendors -->
	<script src="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
	<!--end::Page Vendors -->  
	<!--begin::Page Snippets -->
	<script src="<?php echo base_url(); ?>/assets/assets/app/js/dashboard.js" type="text/javascript"></script>
	<!--end::Page Snippets -->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });

}); //end document
</script>
<script>
var rate = <?php echo $rate; ?> //inserted with PHP
$("#iii").change(function(){
    var inputKembalian = this.value;    
    var text = aa
    $('#ii').text(text);
});
</script>
<script>
    function sama(){
        var a = $("#kembalian").val();
        document.getElementById('cetakKembalian').value = a;        
    }
</script>
<script>
    window.print();
</script>
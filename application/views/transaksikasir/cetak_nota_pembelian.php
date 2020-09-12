<head>
    <title>CETAK TRANSAKSI PEMBELIAN</title>
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
    <div class="text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <!--<div class="modal-content">-->
            <div class="modal-body"><br />
                <div class="row mb-2">
                    <div class="col-2">
                        <br><img src="https://hrms.amnotel.co.id/assets/image/logo/aatcdv.png" class="w-100">
                    </div>
                    <div class="col-9 text-center" style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
                        <p style="margin-bottom: 5px"><strong>AMNOTEL STORE</strong></p>
                        <p style="margin-bottom: 5px"><i>trusted in connecting and securing your business</i></p>
                        <p style="margin-bottom: 5px">Jl. Potronanggan RT.06, Kragilan, Tamanan, Banguntapan, Bantul, Yogyakarta, 55191</p>
                    </div>
                </div>
                <div class="text-center">
                    <span >Faktur Penjualan</span><br>          
                    <span class="text-center"><?php echo tgl_indonesia_transaksi($tanggal_transaksi);?></span>
                </div>
                <div class="text-left">
                    <span id=no_transaksi>No Transaksi : <?php echo $autonumber ?></span><br>
                    <span>Petugas&emsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo  $this->session->userdata['full_name']; ?></span>
                </div>
                <br>
                <table width="100%">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Harga</th>
                                </tr>
                            </thead>
                            <?php $totalharga=0;
                        foreach($tmp as $tmp):?>
                            <tbody>
                                <tr>
                                    <td><?php echo $tmp->merk;?> <?php echo $tmp->tipe;?></td>
                                    <td class="text-center">1</td>
                                    <td class="text-right"><?php echo rupiah($tmp->harga);?></td>
                                </tr>
                            </tbody>
                </table>
                <?php $totalharga +=$tmp->harga;
                        endforeach;?>
                        <hr style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
                <table width="100%">
                    <tr>
                        <td width="300px" class="text-right">Total&emsp;&emsp;&nbsp; &nbsp;</td>
                        
                        <td class="text-right"><?php echo rupiah($totalharga);?></td>
                    </tr>
                    <tr>
                        <td width="300px" class="text-right">Tunai&emsp;&emsp;&nbsp;&nbsp;</td>
                        <?php foreach($tmptrbelibyr as $tmptrbelibyr):?>
                        <td class="text-right"><?php echo rupiah($tmptrbelibyr->tunai);?></td>
                    </tr>
                    <tr>
                        <td width="300px" class="text-right">Kembalian</td>
                        
                        <td class="text-right"><?php echo rupiah($tmptrbelibyr->kembalian);?></td>
                    </tr>
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
                                <td><br><br><br>___________</td>
                                <td class="text-right"><br><br><br><?php echo  $this->session->userdata['full_name']; ?></td>
                            </tr>
                        </tbody>
                </table>
                <br>
                <span>Nb:</span><br>
                <span>- iPhone garansi 1 bulan (tidak termasuk headset dan charger), lama garansi 1 bulan (1 minggu replace 3 minggu repair) </span><br>
                <span>- Garansi meliputi kerusakan fungsi bukan fisik</span><br>
                <span>- iPhone yang sudah dibeli tidak dapat dikembalikan atau ditukar dengan barang lain</span><br>
                <span>- Garansi batal apabila nota hilang/segel rusak/kesalahan pemakai seperti jatuh atau kena air</span>
            </div>
        </div>
    </div>
</body>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>



<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>

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
function cetakTunai() {           
    document.getElementById('tunai').value;      
}
function cetakKembalian() {           
    var aa = $("#kembalian").val();
    document.getElementById('cetakKembalian').html() = aa;      
}
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
<head>
    <title>Laporan Kasir - Administrator POS Amnotel</title>
    <style>
        div#loader {
            text-align: center;
            z-index: 9999;
        }
    </style>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                       <label for=""><span><a href="<?php echo base_url('laporankasir'); ?>">Laporan</a> / Laporan Kasir</span></label>
					</h5>
				</div>
				<!---<div class="col-md-8 mt-1 mb-1 text-right">
					<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<!-- <span id="hijriyah"></span> -->
					<!--		<span class="m-subheader__daterange-title">Hari ini :</span>
							<span class="m-subheader__daterange-date m--font-brand" id="jamtanggal"></span>							
						</span>
						<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
							<i class="fa fa-calendar"></i>
						</a>
					</span>
				</div>-->
            
			</div>
            <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>
            <br />

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <!--<div class="panel-heading">
                <?php echo $title;?>
            </div>-->
            <div class="panel-body">
               <br />
               <div class="form-horizontal">
                   <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-lg-3">Tanggal Awal</label>
                            <div class="col-md-7">
                                <input type="date" id="tanggal1" class="form-control">
                            </div>
                        </div> 
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-lg-3">Tanggal Akhir</label>
                            <div class="col-md-7">
                                <input type="date" id="tanggal2" class="form-control">
                            </div>
                        <div class="col-md-1">
                            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>   Lihat Laporan</button>
                        </div>
                    </div>    
                </div>                   
            </div>
        </div>
        <br />
        <div id="loader"></div>
        <div id="tampil"></div>
            
        </div> <!-- end panel body -->
        
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->

<!-- Modal Cari Buku -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <h4 class="modal-title"><strong>Detail Pengembalian</strong></h4> -->
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
          

            <div id="tampildetail"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Buku -->



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>assets/asset/js/bootstrap-datepicker.js"></script>

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


    //datepicker
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });


    //get data via ajax 
    $("#tampilkan").click(function(){

        var tanggal1 = $("#tanggal1").val();
        var tanggal2 = $("#tanggal2").val();

        

        if(tanggal1 == "") {
            alert("Silahkan isi periode tanggal awal")
            $("#tanggal1").focus();
            return false;
        }
        else if(tanggal2 == ""){
            alert("Silahkan isi periode tanggal akhir")
            $("#tanggal2").focus();
            return false;
        }
        else{

            $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

            $.ajax({
                url:"<?php echo site_url('laporankasir/cari_laporankasir');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    // console.log(hasil);
                    $("#tampil").html(hasil);

                     $('#loader').html("").hide();
                }
            })

            //  $('#loader').html("").hide();

        }

    }) //end tampilkan 

    $('body').on('click', '.show-modal', function(){        
        var id_transaksi = $(this).attr("kode");
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        $.ajax({
                url:"<?php echo site_url('laporankasir/detail_laporankasir');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })
     
     });
     
    

}); //end document
</script>




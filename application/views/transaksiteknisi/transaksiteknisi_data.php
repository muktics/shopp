<head>
    <title>Transaksi Service - Sistem Teknisi Amnotel</title>
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><!--<a href="<?php echo base_url('transaksiteknisi'); ?>">-->Transaksi Teknisi<!--</a>--></span></label>
					</h5>
				</div>
				<!--<div class="col-md-8 mt-1 mb-1 text-right">
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
                <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>
			</div>
            <br />        
<div class="row">
    <div class="col-lg-12">  
    <!-- <legend>Transaksi</legend> -->
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo site_url('transaksiteknisi/simpan');?>" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">No. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>                                                                                                
                        <div class="form-group">
                            <label class="col-lg-4 ">Tanggal Transaksi</label>
                            <div class="col-lg-7">
                                <input type="date" id="tanggal_service" name="tanggal_service" class="form-control" value="<?php 
                                echo $tanggal_service; ?>" readonly="readonly">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Kasir</label>
                            <div class="col-lg-7">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo  $this->session->userdata['full_name']; ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4">IMEI</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control"  id="imei" value="<?php echo set_value('imei'); ?>">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-lg-4">Nama Barang</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control"  id="merk" value="<?php echo set_value('merk'); ?>">
                            </div>
                        </div>            
                        <div class="form-group">
                            <label class="col-lg-4">Estimasi</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control"  id="estimasi" value="<?php echo set_value('estimasi'); ?>">
                            </div>
                        </div>                               
                    </div>   
                    <div class="col-md-6">         
                        <div class="form-group">
                            <label class="col-lg-12 text-center">Detail Kerusakan</label>
                            <div class="col-lg-12 text-center">
                                <textarea type="text" class="form-control"  id="kerusakan" value="<?php echo set_value('kerusakan'); ?>"></textarea>
                            </div>
                        </div>        
                    </div>    
                    <div class="col-md-12">
                        <div class="form-group text-right">
                        <?php //$no = 1;$tmptrservice;
                            //foreach($tmptrservice as $tmptrservice){?> 
                        <!--<button class="hapus btn btn-brand" kode="<?php echo $tmptrservice->imei;?>">Reset</button>
                        <?php //endforeach;?><?php// $no++; } ?>    
                        <!--<button id="tambah_buku"><i class="fa fa-floppy-o"></i></button>
                        <i id="tambah_buku" class="fa fa-floppy-o fa-3x"></i>-->
                        <button id="reset" class="btn btn-brand">RESET</button>
                        </div>
                    </div>   
                </div>
            </div>        
            
            <div class="panel-footer">                              
                <div class=text-right>
                    <!--<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>-->                    
                    <!--<button id="tambah_buku" class="btn btn-brand"> Tambah Barang <i class="glyphicon glyphicon-plus"></i></button>-->
                    <button id="previewon" class="btn btn-accent">Next <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- end data buku -->        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.end row -->


<!-- Modal Print -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <!--<h5 class="modal-title" id="titleview">
            </h5>-->
            <p id="result"></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                ×
            </span>
            </button>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <h4 class="modal-title"><strong>Detail Pengembalian</strong></h4> -->
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
          

            <div id="tampildetail"></div>

        </div>

        <br /><br />
       
        <div class="form-group">
            <div class="col-md-4 text-left">
                <!--<button type="button" class="btn btn-brand" data-dismiss="modal"><i class="fa fa-print"></i></button>-->
                <a href="transaksiteknisi/cetak_nota_tservice" target="_blank"><i class="fa fa-print fa-2x"></i></a>
            </div>
            <div class="col-md-4 text-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="col-md-4 text-right">
                <button type="button" class="btn btn-accent" id="simpan" data-dismiss="modal">Simpan</button>
            </div>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


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

<!--<script src="<?php echo base_url(); ?>assets/asset/js/tinymce/tinymce.min.js"></script>-->
<script>
//tinymce.init({selector:'textarea'});
$(document).ready(function() {

    //alert('');

    $('body').on('click', '#reset', function(){        
        //var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
                 
        $.ajax({
                url:"<?php echo site_url('transaksiteknisi/resettmpservice');?>",
                type:"POST",
                data:"",
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    location.reload();
                    //$("#tampildetailcnota").html(hasil);
                    //$("#myModal5").modal("show");
                    //  $('#loader').html("").hide();
                }
            })     
     });

    $('#dataTables-example').DataTable({
        responsive: true
    });    

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var imei = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('transaksiteknisi/hapus_tmptrservice');?>",
            type:"POST",
            data:"imei="+imei,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                location.reload();            }
        })
        

    }); //end delete table tmp

        //tambah_service ke tmptrservice    
        $('body').on('click', '#previewon', function(){        
        var id_transaksi = $(this).attr("kode");
        var estimasi = $("#estimasi").val();
        var kerusakan     = $("#kerusakan").val();
        var merk = $("#merk").val();        
        var imei = $("#imei").val();

        if(imei == "") {
            alert("IMEI " + imei + " Masih Kosong ");
            $("#imei").focus();
            return false;
        }
        else if(merk == ""){
            alert("Merk " + merk + " Masih Kosong ");
            $("#merk").focus();
            return false;
        }
        else if(kerusakan == ""){
            alert("Kerusakan " + kerusakan + " Masih Kosong ");
            $("#kerusakan").focus();
            return false;
        }
        else if(estimasi == ""){
            alert("Estimasi " + estimasi + " Masih Kosong ");
            $("#estimasi").focus();
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('transaksiteknisi/save_tmptrservis');?>",
                type:"POST",
                data:"estimasi="+estimasi+"&kerusakan="+kerusakan+"&merk="+merk+"&imei="+imei+"&id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //alert(hasil);
                   //console.log(data);
                }
            })
        }

    }) //end tambahbuku 

    $('body').on('click', '#preview', function(){        
        var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
        //var tanggal_service   = $("#tanggal_service").val();       
        var imei   = $("#imei").val();
        //var detail   = $("#detail").val();
        var estimasi   = $("#estimasi").val();
        var kerusakan   = $("#kerusakan").val();
        var merk   = $("#merk").val();
        //alert(id_transaksi);        
        // $("#myModal3").modal("show"); 
        if(imei == 0){
            alert("Masukkan IMEI Terlebih Dahulu");
            $("#imei").focus();
            return false;        
        }else if(merk == 0){
            alert("Masukkan Merk Device Terlebih Dahulu");
            $("#merk").focus();
            return false;
        }else if(estimasi == 0){
            alert("Masukkan Estimasi Penyelesaian Service Terlebih Dahulu");
            $("#estimasi").focus();
            return false;
        }else if(kerusakan == ""){
            alert("Beri Penjelasan Detail Kerusakan Terlebih Dahulu");
            $("#kerusakan").focus();
            return false;
        }/*else if(jumlah_tmp == 0){
            alert("Pilih Barang Terlebih Dahulu");
            $("#kode_barang").focus();
            return false;
        }*/
        else{                   
        $.ajax({
                url:"<?php echo site_url('transaksiteknisi/detail_transaksiteknisi');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&imei="+imei+"&merk="+merk+"&estimasi="+estimasi+"&kerusakan="+kerusakan,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })  
        }       
     });


    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tanggal_service   = $("#tanggal_service").val();
        //var tgl_kembali  = $("#tgl_kembali").val();
        //var nis          = $("#nis").val();
        var imei   = $("#imei").val();
        var detail   = $("#detail").val();
        var estimasi   = $("#estimasi").val();
        var kerusakan   = $("#kerusakan").val();
        var merk   = $("#merk").val();
        //var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);
        //var jumlah_harga   = parseInt($("#harga").val(), 10);

        //cek nis jika kosong 
        if(imei == 0){
            alert("Masukkan IMEI Terlebih Dahulu");
            $("#imei").focus();
            return false;        
        }else if(merk == 0){
            alert("Masukkan Merk Device Terlebih Dahulu");
            $("#merk").focus();
            return false;
        }else if(estimasi == 0){
            alert("Masukkan Estimasi Penyelesaian Service Terlebih Dahulu");
            $("#estimasi").focus();
            return false;
        }else if(kerusakan == ""){
            alert("Beri Penjelasan Detail Kerusakan Terlebih Dahulu");
            $("#kerusakan").focus();
            return false;
        }/*else if(jumlah_tmp == 0){
            alert("Pilih Barang Terlebih Dahulu");
            $("#kode_barang").focus();
            return false;
        }*/
        else{
            $.ajax({
                url:"<?php echo site_url('transaksiteknisi/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tanggal_service="+tanggal_service+"&imei="+imei+"&merk="+merk+"&estimasi="+estimasi+"&kerusakan="+kerusakan/*+"&jumlah_tmp="+jumlah_tmp*/,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Service Berhasil");
                  
                  location.reload();
                }
            })
        }
        
    })
});
</script>





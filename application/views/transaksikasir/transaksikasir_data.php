<head>
    <title>Transaksi Pembelian - Sistem Kasir Amnotel</title>
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <!--<label for=""><span><a href="<?php echo base_url('transaksikasir'); ?>">Transaksi Pembelian</a></span></label>-->
                        <label for=""><span>Transaksi Pembelian</span></label>
					</h5>
				</div>
				<!--<div class="col-md-8 mt-1 mb-1 text-right">
					<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<!-- <span id="hijriyah"></span> -->
							<!--<span class="m-subheader__daterange-title">Hari ini :</span>
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
                <form class="form-horizontal" action="<?php echo site_url('transaksikasir/simpan');?>" method="post">
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
                                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control" value="<?php 
                                echo $tanggal_transaksi; ?>" readonly="readonly">
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

        <!-- data barang -->
        <div class="panel panel-default">
            <!--<div class="panel-heading">
                <strong>Detail Pembelian</strong>
            </div>-->
            
            <div class="panel-body">
                <div class="form-horizontal">               
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <label class="sr-only">Merk</label>
                        <button id="cari" class="btn btn-accent"> Cari Barang <i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4">Kode Barang</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="kode_barang" >
                            <span class="text-danger">*) tekan enter</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4">Tipe</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="tipe" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4">Merk</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="merk" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4">Harga</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="harga" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4">IMEI</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="imei" readonly="readonly">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-lg-4">QTY</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="qty">
                        </div>
                    </div>-->
                    
                </div>
                <div class="col-md-12 text-center">
                    <div class="form-group ">
                        <label class="sr-only">Merk</label>
                        <button id="tambah_buku" class="btn btn-brand"> Tambah Barang <i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                </div>
                </div>
                <br /><br />

                <!-- buat tampil tabel tmp     -->
                <div id="tampil"></div>
                <div class="col-md-12 text-right">
                <button id="reset" class="btn btn-brand">RESET</button>
                </div>
            </div>
            
            
            
            <div class="panel-footer">
                <div class="text-right">
                    <button id="preview" class="btn btn-accent">Next <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- end data barang -->

        
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->

 

<!-- Modal Cari BArang -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Cari Barang</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
            <input type="text" name="caribarang" id="caribarang" class="form-control" placeholder="Masukkan Kode Barang">

            <div id="tampilbuku"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari BArang -->


<!-- Modal Print -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titleview">
            </h5>
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
                <!--<button onclick="cetak()"type="button" class="btn btn-brand"><i class="fa fa-print"></i></button>-->
                <a href="transaksikasir/cetak_nota_pembelian" target="_blank"><i class="fa fa-print fa-2x"></i></a>
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
 
        <!--begin::Page Vendors -->
		<script src="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        
<script>
$(document).ready(function() {

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });

    $('body').on('click', '#reset', function(){        
        //var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
                 
        $.ajax({
                url:"<?php echo site_url('transaksikasir/resettmpbeli');?>",
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

    function cetak(){
        window.print()
    }

    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('transaksikasir/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data barang setelah di tambah ke tmp
    function EmptyData()
    {
        $("#kode_barang").val("");
        $("#tipe").val("");
        $("#merk").val("");
        $("#harga").val("");
        $("#imei").val("");
    }

    //ambil data anggota berdasarkan nis
    // $("#nis").click(function(){
    /*$("#nis").change(function(){    
        var nis = $("#nis").val();
        
        $.ajax({
            url:"<?php echo site_url('transaksikasir/cari_anggota');?>",
            type:"POST",
            data:"nis="+nis,
            cache:false,
            success:function(html){
                $("#nama").val(html);
                // document.write(html)
            }
        })
        
    });*/

    //show modal search barang
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search barang
    $("#caribarang").keyup(function(){
        var caribarang = $('#caribarang').val();

         $.ajax({
            url:"<?php echo site_url('transaksikasir/cari_barang');?>",
            type:"POST",
            data:"caribarang="+caribarang,
            cache:false,
            success:function(hasil){
                $("#tampilbuku").html(hasil);
                
            }
        })
        
    })


    //tambah barang dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var kode_barang = $(this).attr("kode");
        var tipe     = $(this).attr("tipe");
        var merk = $(this).attr("merk");
        var harga = $(this).attr("harga");
        var imei = $(this).attr("imei");
        
        $("#kode_barang").val(kode_barang);
        $("#tipe").val(tipe);
        $("#merk").val(merk);
        $("#harga").val(harga);
        $("#imei").val(imei);

        $("#myModal2").modal("hide");
        //console.log(kode_barang);
       
    });


    //event keypress cari kode
    $("#kode_barang").keypress(function(){
        
        //13 adalah kode asci buat enter
        if(event.which == 13) {
            var kode_barang = $("#kode_barang").val();

            $.ajax({
                url:"<?php echo site_url('transaksikasir/cari_kode_barang');?>",
                type:"POST",
                data:"kode_barang="+kode_barang,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Barang " + kode_barang + " Barang Tidak Ditemukan");
                       $("#tipe").val("");
                       $("#merk").val("");
                       $("#harga").val("");
                       $("#imei").val("");
                   }
                   else{
                       $("#tipe").val(data[0]);
                       $("#merk").val(data[1]);
                       $("#harga").val(data[2]);
                       $("#imei").val(data[3]);
                       $("#tambah_buku").focus();
                   }

                   //console.log(data);
                }
            })
            
        } 

    }) //end event keypress

    //tambah_barang ke tmp
    $("#tambah_buku").click(function(){
        
        var kode_barang = $("#kode_barang").val();
        var tipe     = $("#tipe").val();
        var merk = $("#merk").val();
        var harga = $("#harga").val();
        var imei = $("#imei").val();

        if(kode_barang == "") {
            alert("Kode " + kode_barang + " Masih Kosong ");
            $("#kode_barang").focus();
            return false;
        }
        else if(tipe == ""){
            alert("Tipe " + tipe + " Masih Kosong ");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('transaksikasir/save_tmp');?>",
                type:"POST",
                data:"kode_barang="+kode_barang+"&tipe="+tipe+"&merk="+merk+"&harga="+harga+"&imei="+imei,
                cache:false,
                success:function(hasil){
                    loadData();
                    EmptyData();
                    //alert(hasil);
                   //console.log(data);
                }
            })
        }

    }) //end tambahbarang

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode_barang = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('transaksikasir/hapus_tmp');?>",
            type:"POST",
            data:"kode_barang="+kode_barang,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    $('body').on('click', '#preview', function(){        
        var id_transaksi = $(this).attr("kode");
        var tunai = $("#tunai").val();
        var kembalian = $("#kembalian").val();
        //var id_transaksi = $("#kembalian").val();
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        if($("#tunai").val() != "")            
        $.ajax({
                url:"<?php echo site_url('transaksikasir/detail_transaksikasir');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&tunai="+tunai+"&kembalian="+kembalian,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })
            else
                alert("Nominal Pembayaran Masih Kosong");
                $("#tunai").focus();    
     
     });

    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tanggal_transaksi   = $("#tanggal_transaksi").val();
        //var tgl_kembali  = $("#tgl_kembali").val();
        //var nis          = $("#nis").val();

        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);
        var jumlah_harga   = parseInt($("#harga").val(), 10);

        //var laba = parseInt($("#totalhargaaa").val(), 10);

        //cek nis jika kosong 
        if(jumlah_tmp == 0){
            alert("Pilih Barang Terlebih Dahulu");
            $("#kode_barang").focus();
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('transaksikasir/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tanggal_transaksi="+tanggal_transaksi+"&jumlah_tmp="+jumlah_tmp,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Pembelian Berhasil");
                  
                  location.reload();
                }
            })
        }        
    })
});
</script>

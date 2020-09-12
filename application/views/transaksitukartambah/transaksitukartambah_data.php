<head>
    <title>Transaksi Tukar Tambah - Sistem Kasir Amnotel</title>
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <!--<label for=""><span><a href="<?php echo base_url('transaksitukartambah'); ?>">Transaksi Tukar Tambah</a></span></label>-->
                        <label for=""><span>Transaksi Tukar Tambah</span></label>
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
                <form class="form-horizontal" action="<?php echo site_url('transaksitukartambah/simpan');?>" method="post">
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
                                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control" value="<?php echo $tanggal_transaksi; ?>" readonly="readonly">
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
                <strong>Detail Tukar Tambah</strong>
            </div>-->
            
            <div class="panel-body">            
                
                <div class="col-md-12">
                    <h4>Detail Barang</h4><hr>
                </div>                
                
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
                            <input type="text" class="form-control text-right"  id="harga" readonly="readonly">
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
                        <button id="tambah_buku" class="btn btn-brand"> Tambah Barang <i class="glyphicon glyphicon-plus"></i></button><br>
                    </div>
                    <br>
                </div>
                    
                </div>
                <div class="col-md-12">
                    <h4>Detail Pelanggan</h4><hr>
                </div>
                
                <div class="form-horizontal">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4">Nama Pelanggan</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="nama_pelanggan" value="<?php echo set_value('nama_pelanggan'); ?>">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-lg-4">Alasan Penjualan</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control"  id="alasan" value="<?php echo set_value('alasan'); ?>">
                        </div>
                    </div>            
                    <div class="form-group">
                        <label class="col-lg-4">Harga Penjualan</label>
                        <div class="col-lg-7">
                            <input type="text" onkeyup="sum();" class="form-control text-right"  id="harga_jual" value="<?php echo set_value('harga_jual'); ?>">
                        </div>
                    </div>          
                     
                </div>   
                <div class="col-md-6">         
                    <div class="form-group">
                        <label class="col-lg-12 text-center">Detail Barang</label>
                        <div class="col-lg-12 text-center">
                            <textarea type="text" class="form-control"  id="detail" value="<?php echo set_value('detail'); ?>"></textarea>
                        </div><br>
                    </div>      <br>  
                </div>     <br>       
                </div>    
                <!-- buat tampil tabel tmp     -->
                <br><div id="tampil"></div>
            
            
            <div class="col-md-12 text-right">
                <button id="reset" class="btn btn-brand">RESET</button>
            </div>
            </div>
            <div class="panel-footer">                
                <!--<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>-->
                <div class=text-right>
                    <button id="preview" class="btn btn-accent">Next <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- end data buku -->

        
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->

 

<!-- Modal Cari Buku -->
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
<!-- End Modal Cari Buku -->

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
                <!--<button type="button" class="btn btn-brand" data-dismiss="modal"><i class="fa fa-print"></i></button>-->
                <a href="transaksitukartambah/cetak_nota_ttt" target="_blank"><i class="fa fa-print fa-2x"></i></a>
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

<script src="<?php echo base_url(); ?>assets/asset/js/tinymce/tinymce.min.js"></script>
<script>
//tinymce.init({selector:'textarea'});
$(document).ready(function() {

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });

    $('body').on('click', '#reset', function(){        
        //var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
                 
        $.ajax({
                url:"<?php echo site_url('transaksitukartambah/resettmptt');?>",
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

    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('transaksitukartambah/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data buku setelah di tambah ke tmp
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
            url:"<?php echo site_url('transaksitukartambah/cari_anggota');?>",
            type:"POST",
            data:"nis="+nis,
            cache:false,
            success:function(html){
                $("#nama").val(html);
                // document.write(html)
            }
        })
        
    });*/

    //show modal search buku
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search buku
    $("#caribarang").keyup(function(){
        var caribarang = $('#caribarang').val();

         $.ajax({
            url:"<?php echo site_url('transaksitukartambah/cari_barang');?>",
            type:"POST",
            data:"caribarang="+caribarang,
            cache:false,
            success:function(hasil){
                $("#tampilbuku").html(hasil);
                
            }
        })
        
    })


    //tambah buku dari modal ke form
    
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
                url:"<?php echo site_url('transaksitukartambah/cari_kode_barang');?>",
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

    //tambah_buku ke tmp
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
                url:"<?php echo site_url('transaksitukartambah/save_tmp');?>",
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

    }) //end tambahbuku 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode_barang = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('transaksitukartambah/hapus_tmp');?>",
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
        var nama_pelanggan = $("#nama_pelanggan").val();
        var tunai = $("#tunai").val();
        var kembalian = $("#kembalian").val();
        var harga_jual = $("#harga_jual").val();
        var detail = $("#detail").val();
        var alasan = $("#alasan").val();
        //var id_transaksi = $("#kembalian").val();
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        if(tunai == 0){            
            alert("Nominal Pembayaran Masih Kosong");
            $("#tunai").focus();     
        }else if(nama_pelanggan == 0){
        alert("Masukkan Nama Pelanggan Terlebih Dahulu");
            $("#nama_pelanggan").focus();
            return false;
        }else if(detail == 0){
            alert("Beri Penjelasan Detail Barang Terlebih Dahulu");
            $("#detail").focus();
            return false;
        }else if(alasan == 0){
            alert("Masukkan Alasan Penjualan barang Terlebih Dahulu");
            $("#alasan").focus();
            return false;
        }else if(harga_jual == 0){
            alert("Masukkan Harga Jual Barang Terlebih Dahulu");
            $("#harga_jual").focus();
            return false;
        }
        
        else{        
        $.ajax({
                url:"<?php echo site_url('transaksitukartambah/detail_transaksitukartambah');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&tunai="+tunai+"&kembalian="+kembalian+"&nama_pelanggan="+nama_pelanggan+"&harga_jual="+harga_jual+"&detail="+detail+"&alasan="+alasan,
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
        var tanggal_transaksi   = $("#tanggal_transaksi").val();
        //var tgl_kembali  = $("#tgl_kembali").val();
        //var nis          = $("#nis").val();
        var nama_pelanggan   = $("#nama_pelanggan").val();
        var detail   = $("#detail").val();
        var alasan   = $("#alasan").val();
        var harga_jual   = $("#harga_jual").val();
        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);
        var jumlah_harga   = parseInt($("#harga").val(), 10);

        //cek form jika kosong 
        if(nama_pelanggan == 0){
            alert("Masukkan Nama Pelanggan Terlebih Dahulu");
            $("#nama_pelanggan").focus();
            return false;
        }else if(detail == 0){
            alert("Beri Penjelasan Detail Barang Terlebih Dahulu");
            $("#detail").focus();
            return false;
        }else if(alasan == 0){
            alert("Masukkan Alasan Penjualan barang Terlebih Dahulu");
            $("#alasan").focus();
            return false;
        }else if(harga_jual == 0){
            alert("Masukkan Harga Jual Barang Terlebih Dahulu");
            $("#harga_jual").focus();
            return false;
        }else if(jumlah_tmp == 0){
            alert("Pilih Barang Terlebih Dahulu");
            $("#kode_barang").focus();
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('transaksitukartambah/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tanggal_transaksi="+tanggal_transaksi+"&nama_pelanggan="+nama_pelanggan+"&detail="+detail+"&alasan="+alasan+"&harga_jual="+harga_jual+"&jumlah_tmp="+jumlah_tmp,
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


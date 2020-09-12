<head>
    <title>Transaksi Selesai - Sistem Teknisi Amnotel</title>
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><?php //echo base_url('transaksiserviceselesai'); ?>Transaksi Penyelesaian Service</span></label>
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

        <div class="panel panel-default">
            <!--<div class="panel-heading">
                <?php echo $title;?>
            </div>-->
            <div class="panel-body">
            <span><u><h3>Data Service</h3></u></span><br>
                <form class="form-horizontal" action="" method="post">                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 ">No. Transaksi</label>
                            <div class="col-lg-5">
                                <input type="text" name="no_transaksi" id="no_transaksi" class="form-control">
                                <span class="text-danger">*) tekan enter</span>
                            </div>
                            
                            <div class="col-lg-2">
                                <a href="#" class="btn btn-accent" id="cari_imei"> Search &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tangggal Service</label>
                            <div class="col-lg-8">
                                <input type="date" name="tanggal_service" id="tanggal_service" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tanggal Selesai</label>
                            <div class="col-lg-8">
                                <input type="text" name="tanggal_selesai" id="tanggal_selesai" value="<?php echo tgl_indonesia_transaksi($tanggal_selesai); ?>" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">Imei</label>
                            <div class="col-lg-8">
                                <input type="text" name="imei" id="imei" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Barang</label>
                            <div class="col-lg-8">
                                <input type="text" name="merk" id="merk" class="form-control" readonly="readonly">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-lg-4 ">Kerusakan</label>
                            <div class="col-lg-8">
                                <input type="text" name="kerusakan" id="kerusakan" class="form-control" >
                            </div>
                        </div>                                                                        
                    </div>
                    <div class="col-md-12">
                        <br><span><u><h3>Detail</h3></u></span><br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Pelanggan</label>
                            <div class="col-lg-8">
                                <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" id="nama_pelanggan" class="form-control">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-lg-4 ">Garansi</label>
                            <div class="col-lg-8">
                                <input type="text" name="garansi" id="garansi" placeholder="Garansi Perbaikan" class="form-control" value="7 Hari" readonly="readonly">
                            </div>
                        </div>  
                    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">Biaya</label>
                            <div class="col-lg-8">
                                <input type="text"  onkeyup="sum();" name="biaya" id="biaya" placeholder="Biaya Perbaikan Service" class="form-control text-right" >
                                <!--<input type="text" onkeyup="sum();" name="biaya" id="dengan-rupiah" placeholder="Biaya Perbaikan Service" class="form-control text-right">-->
                            </div>
                        </div>                                              
                        <div class="form-group">
                            <label class="col-lg-4 ">Bayar</label>
                            <div class="col-lg-8">
                                <input type="text" onkeyup="sum();"  name="tunai" id="tunai" class="form-control text-right" placeholder="Nominal Pembayaran" >
                                <!--<input type="text" onkeyup="sum();" name="tunai" id="dengan-rupiah1" class="form-control text-right" placeholder="Nominal Pembayaran">-->
                            </div>
                        </div>                                              
                        <div class="form-group">
                            <label class="col-lg-4 ">Kembalian</label>
                            <div class="col-lg-8">
                                <input type="text"  name="kembalian" id="kembalian" class="form-control text-right" onkeyup="sum();" readonly="readonly" placeholder="Kembalian Pembayaran">
                                <!--<input type="text" onkeyup="sum();" name="kembalian" id="dengan-rupiah2" class="form-control text-right" readonly="readonly" placeholder="Kembalian Pembayaran">-->
                            </div>
                        </div>                                              
                    </div>
                </form>

            <!-- tampil barang -->
            <div id="tampildataservice"></div>
            <!-- end tampil barang -->
            
            <div class="col-md-12 text-right">
                <button id="reset" class="btn btn-brand">RESET</button>
            </div>
            </div>
                                
            <div class="panel-footer">
                <div class="text-right">
                    <!--<button id="simpan_transaksi" class="btn btn-brand"><i class="glyphicon glyphicon-saved"></i> Simpan</button>-->
                    <button id="preview" class="btn btn-accent">Next <i class="fa fa-chevron-right"></i></button>
                    <!--<button onClick="window.print();return false" type="button" class="btn btn-brand" data-dismiss="modal"><i class="fa fa-print"></i></button>-->
                </div>
            </div>
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->
<br><br><br>
<br><br>
<!-- Modal Print -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <!--<a href="transaksiteknisiselesai/doprint"><button type="button" class="btn btn-brand" data-dismiss="modal"><i class="fa fa-print"></i></button></a>-->
            <!--<button id="cetaknota" type="button" class="btn btn-brand"><i class="fa fa-print"></i></button>-->
            <a href="transaksiteknisiselesai/cetak_nota_tselesai" target="_blank"><i class="fa fa-print fa-2x"></i></a>
            </div>
            <div class="col-md-4 text-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="col-md-4 text-right">
                <button type="button" class="btn btn-accent" id="simpan_transaksi" data-dismiss="modal">Simpan</button>
            </div>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
 
 <!-- Modal Print -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">       
            <div class="modal-body"><br />            
            

                <div id="tampildetailcnota"></div>

            </div>

        </div><!-- /.modal-content--> 
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Cari service -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Transaksi Penyelesaian Service</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Service</label>-->
            <input type="text" name="cariimei" id="cariimei" class="form-control" placeholder="Silahkan Masukkan Nomor Imei">

            <div id="tampilimei"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari barang -->



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
    var dengan_rupiah = document.getElementById('biaya');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value);
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }

    var dengan_rupiah1 = document.getElementById('tunai');
    dengan_rupiah1.addEventListener('keyup', function(e)
    {
        dengan_rupiah1.value = formatRupiah1(this.value);
    });

    function formatRupiah1(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }

   var dengan_rupiah2 = document.getElementById('kembalian');
    dengan_rupiah2.addEventListener('keyup', function(e)
    {
        dengan_rupiah2.value = formatRupiah2(this.value);
    });


</script>

<script>

$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });

    //show modal imei
    $("#cari_imei").click(function(){
        $("#myModal3").modal("show");
    });

    //cari by imei
    $("#cariimei").keyup(function(){
        var imei = $("#cariimei").val();
        
        $.ajax({
            url:"<?php echo site_url('transaksiteknisiselesai/cari_imei');?>",
            type:"POST",
            data:"imei="+imei,
            cache:false,
            success:function(hasil){
                // console.log(hasil);
                $("#tampilimei").html(hasil);
            }
        })
    })


    //tambahkan data dari modal ke form berdasarkan id_transaksi
    $('body').on('click', '.tambahkan', function(){

        var id_transaksi = $(this).attr("no_transaksi");
        // console.log(id_transaksi);
        $("#no_transaksi").val(id_transaksi);
        $("#myModal3").modal("hide");
        $("#no_transaksi").focus();

    });
    

    

    //keypress no_transaksi
    $("#no_transaksi").keypress(function(){

        if(event.which == 13) {

            var no_transaksi = $("#no_transaksi").val();
            
            $.ajax({
                url:"<?php echo site_url('transaksiteknisiselesai/cari_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#imei").val(data[0]);  
                       $("#tanggal_service").val(data[1]);
                       //$("#tanggal_selesai").val(data[2]);
                       $("#merk").val(data[2]); 
                       $("#kerusakan").val(data[3]);                     

                       $("#tampildataservice").load("<?php echo site_url('transaksiteknisiselesai/tampil_transaksiteknisi') ?>",
                       "no_transaksi="+no_transaksi);
                   }

                   //console.log(data);
                }
            }) //end ajax

        } //end event

    }) //end keypress

    $('body').on('click', '#cetaknota', function(){        
        //var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
                 
        $.ajax({
                url:"<?php echo site_url('transaksiteknisiselesai/cetak_nota_tselesai');?>",
                type:"POST",
                data:"",
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetailcnota").html(hasil);
                    $("#myModal5").modal("show");
                    //  $('#loader').html("").hide();
                }
            })     
     });

     $('body').on('click', '#reset', function(){        
        //var id_transaksi = $(this).attr("kode");
        //var no_transaksi = $("#no_transaksi").val();
                 
        $.ajax({
                url:"<?php echo site_url('transaksiteknisiselesai/resettmp');?>",
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

    $('body').on('click', '#preview', function(){        
        var id_transaksi = $(this).attr("kode");
        var no_transaksi = $("#no_transaksi").val();
        var nama_pelanggan = $("#nama_pelanggan").val();
        var tunai = $("#tunai").val();
        var kembalian = $("#kembalian").val();
        var garansi = $("#garansi").val();
        var biaya = $("#biaya").val(); 
        var imei = $("#imei").val(); 
        var merk = $("#merk").val();       
        var kerusakan = $("#kerusakan").val();        
        var tanggal_service = $("#tanggal_service").val(); 
        /*var no_transaksi = $("#no_transaksi").val();
        var tanggal_service   = $("#tanggal_service").val();
        //var tgl_kembali  = $("#tgl_kembali").val();
        //var nis          = $("#nis").val();
        var imei   = $("#imei").val();
        var detail   = $("#detail").val();
        var estimasi   = $("#estimasi").val();
        var kerusakan   = $("#kerusakan").val();
        var merk   = $("#merk").val();*/
        //alert(id_transaksi);        
        // $("#myModal3").modal("show"); 
        if(garansi == 0){
            alert("Masukkan Garansi Service Terlebih Dahulu");
            $("#garansi").focus();
            return false;        
        }else if(biaya == 0){
            alert("Masukkan Biaya Service Terlebih Dahulu");
            $("#biaya").focus();
            return false;
        }else if(tunai == 0){
            alert("Masukkan Nominal Pembayaran Service Terlebih Dahulu");
            $("#tunai").focus();
            return false;
        }else if(kembalian == ""){
            alert("Masukkan Kembalian Terlebih Dahulu");
            $("#kembalian").focus();
            return false;       
        }
        else if(nama_pelanggan == ""){
            alert("Masukkan Nama Pelanggan Terlebih Dahulu");
            $("#nama_pelanggan").focus();
            return false;       
        } 
        else{                   
        $.ajax({
                url:"<?php echo site_url('transaksiteknisiselesai/detail_transaksiteknisiselesai');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&kerusakan="+kerusakan+"&no_transaksi="+no_transaksi+"&tanggal_service="+tanggal_service+"&merk="+merk+"&imei="+imei+"&garansi="+garansi+"&biaya="+biaya+"&tunai="+tunai+"&kembalian="+kembalian+"&nama_pelanggan="+nama_pelanggan,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal4").modal("show");
                    //  $('#loader').html("").hide();
                }
            })  
        }       
     });

    $("#simpan_transaksi").click(function(){

        var no_transaksi = $("#no_transaksi").val();
        var tanggal_selesai          = $("#tanggal_selesai").val();  
        var imei          = $("#imei").val();  
        var merk        = $("#merk").val();
        var garansi        = $("#garansi").val();
        var biaya        = $("#biaya").val();
        var tunai        = $("#tunai").val();
        var kembalian        = $("#kembalian").val();
        
        if(no_transaksi == "" || imei == ""){
            alert("Pilih ID Transaksi");
            $("#no_transaksi").focus();
            return false;
        }
        else if(tanggal_selesai == ""){
            alert("Masukkan Tanggal Selesai");
            $("#tanggal_selesai").focus();
            return false;
        }
        else if(garansi == ""){
            alert("Masukkan Garansi Service");
            $("#garansi").focus();
            return false;
        }
        else if(biaya == "") {
                alert("Masukan nominal biaya");
                $("#biaya").focus();
                return false;
        }               
        else {
            $.ajax({
                url:"<?php echo site_url('transaksiteknisiselesai/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&garansi="+garansi+"&tanggal_selesai="+tanggal_selesai+"&biaya="+biaya+"&tunai="+tunai+"&kembalian="+kembalian,
                cache:false,
                success:function(){
                    alert("Transaksi berhasil disimpan");
                    location.reload();
                }
            })//end ajax
        }
       
     

    }) //end simpan_transaksai

});

function sum() {
    var biaya1 = document.getElementById('biaya').value;
      var bayar1 = document.getElementById('tunai').value;
      var biaya = biaya1.split('.').join("");
      var bayar = bayar1.split('.').join("");
      //var biaya = biaya1.replace(".",""); 
      //var bayar = bayar1.replace(".","");
      //var	reverse = txtSecondNumberValue.toString().split('').reverse().join(''),
	        //ribuan 	= reverse.match(/\d{1,3}/g);
	        //ribuan	= ribuan.join('.').split('').reverse().join('');
      var subTotal = bayar - biaya;      
      document.getElementById('kembalian').value = formatRupiah2(subTotal.toString());     
}
function formatRupiah2(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }
</script>





<!--<script src="assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
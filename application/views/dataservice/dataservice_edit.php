<head>
    <title>Ubah Data Service - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('dataservice'); ?>">Data Service</a> / Ubah Data Service</span></label>
					</h6>
				</div>				
            
			</div>
            
            <?php
            echo validation_errors();
            //buat message nis
            if(!empty($message)) {
            echo $message;
            }
        ?>
        <br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!--<div class="panel-heading">
                Detail Ubah Data Service
            </div>-->
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('dataservice/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">No Transaksi</p>
                    <div class="col-sm-4">
                        <input type="text" name="id_transaksi" class="form-control" value="<?php echo $edit['id_transaksi']; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Service</p>
                    <div class="col-sm-4">
                        <input type="text" name="tanggal_service" class="form-control" value="<?php echo $edit['tanggal_service']; ?>" readonly="readonly">
                    </div>
                </div>
                <!--<div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Selesai</p>
                    <div class="col-sm-4">
                        <input type="text" name="tanggal_selesai" class="form-control" value="<?php echo $edit['tanggal_selesai']; ?>" readonly="readonly">
                    </div>
                </div>-->
                <div class="form-group">
                    <p class="col-sm-2 text-left">Detail Barang</p>
                    <div class="col-sm-4">
                        <input type="text" name="merk" class="form-control" placeholder="Detail Barang" value="<?php echo $edit['merk']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">IMEI</p>
                    <div class="col-sm-4">
                        <input type="text" name="imei" class="form-control" placeholder="IMEI" value="<?php echo $edit['imei']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Detail Kerusakan</p>
                    <div class="col-sm-4">
                        <input type="text" name="kerusakan" class="form-control" placeholder="Detail Kerusakan" value="<?php echo $edit['kerusakan']; ?>">
                    </div>
                </div>
                <!--<div class="form-group">
                    <p class="col-sm-2 text-left">Estimasi Service</p>
                    <div class="col-sm-4">
                        <input type="text" name="estimasi" class="form-control" placeholder="Harga Jual" value="<?php echo $edit['estimasi']; ?>">
                    </div>
                </div>-->
                <div class="form-group">
                    <p class="col-sm-2 text-left">Garansi</p>
                    <div class="col-sm-4">
                        <input type="text" name="garansi" class="form-control" readonly="readonly" placeholder="Garansi Service" value="<?php echo $edit['garansi']; ?>">
                    </div>
                </div>
                <!--<div class="form-group">
                    <p class="col-sm-2 text-left">Biaya Service</p>
                    <div class="col-sm-4">
                        <input type="text" name="biaya" class="form-control  text-right" placeholder="Biaya Serivce" value="<?php echo $edit['biaya']; ?>">
                    </div>
                </div>-->
                <div class="form-group">
                    <p class="col-sm-2 text-left">Petugas</p>
                    <div class="col-sm-4">
                        <input type="text" name="id_petugas" class="form-control" value="<?php echo $edit['full_name']; ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('dataservice', 'Batal', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-center">
                            <input type="submit" name="update" value="Perbarui" class="btn btn-accent">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/js/jquery.mask.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>assets/asset/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>assets/asset/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>



<script type="text/javascript">

tinymce.init({selector:'textarea'});

$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})



</script>
<!--<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
		}
    </script>-->
    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>
    <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
        </script>
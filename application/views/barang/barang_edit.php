<head>
    <title>Ubah Data Barang - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('barang'); ?>">Barang</a> / Edit Barang</span></label>
					</h6>
				</div>				
            
			</div>
            <br>
            <?php
            echo validation_errors();
            //buat message nis
            if(!empty($message)) {
            echo $message;
            }
        ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!--<div class="panel-heading">
                Data Ubah Barang
            </div>-->
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('barang/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Kode Barang</p>
                    <div class="col-sm-4">
                        <!--<input type="text" name="kode_baranglama" value="<?php echo $edit['kode_barang']; ?>" hidden="">                    -->
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Item Penjualan" value="<?php echo $edit['kode_barang']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Merk</p>
                    <div class="col-sm-4">
                        <?php 
                            $merk = array('Samsung' => 'Samsung', 'Apple' => 'Apple', 'Oppo' => 'Oppo'); 
                            echo form_dropdown('merk',$merk,$edit['merk'],"class='form-control'");    
                        ?>                   
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Type / Model Item </p>
                    <div class="col-sm-4">
                        <input type="text" name="tipe" class="form-control" placeholder="Type / Model Item" value="<?php echo $edit['tipe']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Harga Item </p>
                    <div class="col-sm-4">
                        <input type="text" name="harga" id="dengan-rupiah" class="form-control text-right" placeholder="Harga Item" value="<?php echo rupiah($edit['harga']); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">IMEI </p>
                    <div class="col-sm-4">
                        <input type="text" name="imei" class="form-control" placeholder="IMEI Item" value="<?php echo $edit['imei']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Spesifikasi </p>
                    <div class="col-sm-6">
                        <textarea name="spesifikasi"><?php echo $edit['spesifikasi']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">																
                    <p class="col-sm-2 text-left">Gambar</p>
                    <div class="col-sm-3">
                        <?php if($edit['image'] != '') { ?>
                            <img src="<?php echo base_url('assets/img/barang/'.$edit['image']);?>" width="100px" height="100px">
                        <?php }else{ ?>
                            <img src="<?php echo base_url('assets/img/barang/images.jpg');?>" width="100px" height="100px">
                        <?php } ?> <br /><br />
                        <br />
					    <label class="custom-file">                                
							<input type="file" name="userfile" id="file2" class="custom-file-input" value="<?php echo set_value('userfile'); ?>">
								<span class="custom-file-control form-control" ></span>
                            </label>
                    </div>
				</div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('barang', 'Batal', array('class' => 'btn btn-danger')); ?>
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

    var dengan_rupiah = document.getElementById('dengan-rupiah');
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
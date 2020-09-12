<head>
    <title>Tambah Data Barang - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('barang'); ?>">Barang</a> / Tambah Barang</span></label>
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
                Data Tambah Barang
            </div>-->
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('barang/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Kode Barang</p>
                    <div class="col-sm-4">
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?php echo set_value('kode_barang'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Merk </p>
                    <div class="col-sm-4">
                    <select name="merk" class="form-control" >
                        <option value="">Pilih Merk</option>
                        <option value="Samsung" <?php echo set_select('merk','Samsung'); ?> >Samsung</option>
                        <option value="Apple" <?php echo set_select('merk','Apple'); ?>>Apple</option>
                        <option value="Oppo" <?php echo set_select('merk','Oppo'); ?>>Oppo</option>
                    </select>   
                    </div>
                </div>             

                <div class="form-group">
                    <p class="col-sm-2 text-left">Type / Model </p>
                    <div class="col-sm-4">
                        <input type="text" name="tipe" class="form-control" placeholder="Type / Model Barang" value="<?php echo set_value('tipe'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Harga </p>
                    <div class="col-sm-4">
                        <input type="text" id="dengan-rupiah" name="harga" class="form-control text-right" placeholder="Harga" value="<?php echo set_value('harga'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">IMEI </p>
                    <div class="col-sm-4">
                        <input type="text" name="imei" class="form-control" placeholder="IMEI" value="<?php echo set_value('imei'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Spesifikasi</p>
                    <div class="col-sm-6">
                        <textarea name="spesifikasi"><?php echo set_value('spesifikasi'); ?></textarea>
                    </div>
                </div>

                <div class="form-group">																
                    <p class="col-sm-2 text-left">Gambar</p>
                    <div class="col-sm-3">                      
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
                            <input type="submit" name="save" value="Simpan" class="btn btn-accent">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/js/tinymce/tinymce.min.js"></script>
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
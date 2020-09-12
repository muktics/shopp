<head>
    <title>Tambah Pengeluaran - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('pengeluaran'); ?>">Pengeluaran</a> / Tambah Pengeluaran</span></label>
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
                Data Tambah Pengeluaran
            </div>-->
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('pengeluaran/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Pengeluaran </p>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran" id="tanggal"  value="<?php echo set_value('tanggal_pengeluaran'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Pengeluaran </p>
                    <div class="col-sm-4">
                    <select name="jenis" class="form-control" >
                        <option value="">- Pilih Jenis Pengeluaran -</option>
                        <option value="Pengeluaran Harian" <?php echo set_select('jenis','Pengeluaran Harian'); ?> >Kebutuhan Harian</option>
                        <option value="Kebutuhan Kasir" <?php echo set_select('jenis','Kebutuhan Kasir'); ?>>Kebutuhan Kasir</option>
                        <option value="Kebutuhan Teknisi" <?php echo set_select('jenis','Kebutuhan Teknisi'); ?>>Kebutuhan Teknisi</option>
                    </select>   
                    </div>
                </div>

                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Deskripsi</p>

                    <div class="col-sm-8">
                        <textarea name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Biaya Pengeluaran</p>
                    <div class="col-sm-4">                        
                        <input type="text" name="biaya" class="form-control text-right" id="dengan-rupiah" placeholder="Biaya"  value="<?php echo set_value('biaya'); ?>">
                    </div>
                </div>  


                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('pengeluaran', 'Batal', array('class' => 'btn btn-danger')); ?>
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

<!--<div class="row">
    <div class="col-lg-12"><br />       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('pengeluaran/create'); ?>">pengeluaran</a></li>
            <li class="active">Create pengeluaran</li>
        </ol>
        <?php
            echo validation_errors();
            if(!empty($message)) {
            echo $message;
            }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create pengeluaran
            </div>
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('pengeluaran/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Pengeluaran </p>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran" id="tanggal"  value="<?php echo set_value('tanggal_pengeluaran'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Pengeluaran </p>
                    <div class="col-sm-10">
                    <select name="jenis" class="form-control" >
                        <option value="">- Pilih Jenis Pengeluaran -</option>
                        <option value="L" <?php echo set_select('jenis','harian'); ?> >Kebutuhan Harian</option>
                        <option value="P" <?php echo set_select('jenis','kasir'); ?>>Kebutuhan Kasir</option>
                        <option value="P" <?php echo set_select('jenis','teknisi'); ?>>Kebutuhan Teknisi</option>
                    </select>   
                    </div>
                </div>
                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Deskripsi Pengeluaran</p>
                    <div class="col-sm-10">
                        <textarea name="deskripsi" cols="30" rows="10"><?php echo set_value('deskripsi'); ?></textarea>
                        <!--<input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"  value="<?php echo set_value('deskripsi'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Biaya Pengeluaran</p>
                    <div class="col-sm-10">                        
                        <input type="text" name="biaya" class="form-control" placeholder="Biaya"  value="<?php echo set_value('biaya'); ?>">
                    </div>
                </div>                
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('pengeluaran', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="save" value="Save" class="btn btn-success btn-sm">
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
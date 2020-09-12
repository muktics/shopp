<head>
    <title>Ubah Data Pengeluaran - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('pengeluaran'); ?>">Pengeluaran</a> / Edit Pengeluaran</span></label>
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
                Data Edit pengeluaran
            </div>-->
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('pengeluaran/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
                <div class="form-group">
                    <p class="col-sm-2 text-left">No ID </p>
                    <div class="col-sm-4">
                        <input type="text" name="id_pengeluaran" class="form-control" placeholder="No ID" value="<?php echo $edit['id_pengeluaran']; 
                        ?>" readonly="readonly">
                    </div>
                </div>                
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Pengeluaran </p>
                    <div class="col-sm-4">
                    <?php 
                    $jenis_pengeluarannya = array('Pengeluaran Harian' => 'Kebutuhan Harian', 'Kebutuhan Kasir' => 'Kebutuhan Kasir', 'Kebutuhan Teknisi' => 'Kebutuhan Teknisi'); 
                    echo form_dropdown('jenis',$jenis_pengeluarannya,$edit['jenis_pengeluaran'],"class='form-control'");    
                    ?>                   
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Pengeluaran </p>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran" id="tanggal"  value="<?php echo $edit['tanggal_pengeluaran'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Deskripsi Pengeluaran </p>

                    <div class="col-sm-8">
                        <textarea name="deskripsi"><?php echo $edit['deskripsi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Biaya</p>
                    <div class="col-sm-4">
                        <input type="text" name="biaya" class="form-control text-right" id="dengan-rupiah" placeholder="Biaya"  value="<?php echo rupiah($edit['biaya']); ?>">
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
                            <input type="submit" name="update" value="Perbarui" class="btn btn-accent">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

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
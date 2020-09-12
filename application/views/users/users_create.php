<head>
    <title>Tambah User - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('users'); ?>">User</a> / Tambah User</span></label>
					</h5>
				</div>				
            
			</div>
        <?php
            echo validation_errors();
            if(!empty($message)) {
            echo $message;
            }
        ?>
  
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open('users/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">KTP / NIP </p>

                    <div class="col-sm-4">
                        <input type="text" name="id_petugas" class="form-control" placeholder="NIP" value="<?php echo set_value('id_petugas'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Username </p>

                    <div class="col-sm-4">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>

                    <div class="col-sm-4">
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Password </p>

                    <div class="col-sm-4">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>
                    <div class="col-sm-4">
                    <select name="jenis" class="form-control" >
                        <option value=""> - Pilih Jenis Kelamin - </option>
                        <option value="Laki-Laki" <?php echo set_select('jenis','Laki-Laki'); ?> >Laki Laki</option>
                        <option value="Perempuan" <?php echo set_select('jenis','Perempuan'); ?>>Perempuan</option>
                    </select>   
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tempat Lahir</p>
                    <div class="col-sm-4">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir </p>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal"  value="<?php echo set_value('tanggal_lahir'); ?>">
                    </div>
                </div>                
                <div class="form-group">
                    <p class="col-sm-2 text-left">No Hp</p>
                    <div class="col-sm-4">
                        <input type="text" name="nohp" class="form-control" placeholder="No Hp"  value="<?php echo set_value('nohp'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis User </p>
                    <div class="col-sm-4">
                    <select name="jenis_user" class="form-control" >
                        <option value=""> - Pilih Jenis User - </option>
                        <option value="Admin" <?php echo set_select('jenis_user','Admin'); ?> >Admin</option>
                        <option value="Kasir" <?php echo set_select('jenis_user','Kasir'); ?>>Kasir</option>
                        <option value="Teknisi" <?php echo set_select('jenis_user','Teknisi'); ?>>Teknisi</option>
                    </select>   
                    </div>
                </div>

                

               
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('users', 'Batal', array('class' => 'btn btn-danger')); ?>
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
<!--<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>-->
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
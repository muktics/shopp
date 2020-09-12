<head>
    <title>Tambah User Teknisi - Administrator POS Amnotel</title>
    
    <!-- Bootstrap CSS 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h6 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('Teknisi'); ?>">Teknisi</a> / Tambah Teknisi</span></label>
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

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!--<div class="panel-heading">
                Tambah Kasir
            </div>-->
            <div class="panel-body">
            <?php
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('teknisi/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
                
                <div class="form-group">
                    <p class="col-sm-2 text-left">User </p>
                    <div class="col-sm-4">
                        <input type="text" name="jenis_user" readonly="readonly" class="form-control" placeholder="Teknisi" value="Teknisi"<?php echo set_value('jenis_user'); ?>>
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">No ID </p>
                    <div class="col-sm-4">
                        <input type="text" name="id_petugas" class="form-control" placeholder="No ID" value="<?php echo set_value('id_petugas'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>
                    <div class="col-sm-4">
                        <input type="text" name="full_name" class="form-control" placeholder="Nama" value="<?php echo set_value('full_name'); ?>">
                    </div>
                </div>
                <!--<div class="form-group">
                    <p class="col-sm-2 text-left">Username</p>
                    <div class="col-sm-4">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Password</p>
                    <div class="col-sm-4">
                        <input type="password" data-toggle="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    </div>
                </div>-->
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>
                    <div class="col-sm-4">
                    <select name="jenis" class="form-control" >
                        <option value="">- Pilih Jenis Kelamin-</option>
                        <option value="Laki-Laki" <?php echo set_select('jenis','Laki-Laki'); ?> >Laki Laki</option>
                        <option value="Perempuan" <?php echo set_select('jenis','Perempuan'); ?>>Perempuan</option>
                    </select>   
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Tempat Lahir</p>
                    <div class="col-sm-4">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"  value="<?php echo set_value('tempat_lahir'); ?>">
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
                            <?php echo anchor('teknisi', 'Batal', array('class' => 'btn btn-danger')); ?>
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
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>
    	<!--begin::Base Scripts -->
        <script src="assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<script type="text/javascript">              
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
<!--<script src="http://hrms.amnotel.co.id/assets/jquery/jquery-3.4.1.min.js"></script>  -->
<script src="http://hrms.amnotel.co.id/assets/showpassword/bootstrap-show-password.min.js"></script>
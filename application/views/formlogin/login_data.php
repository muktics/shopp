<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Point of Sales AMNOTEL</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Open Sans', sans-serif;
        font-size: 48px;
      }
      div:nth-child(1) {
        font-family: 'Open Sans', sans-serif;
      }
      div:nth-child(2) {
        font-family: 'Open Sans', sans-serif;
      }
    </style>

    <!-- Custom Fonts 
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="http://hrms.amnotel.co.id/assets/sweetalert/sweetalert2.min.css">

    <!-- Bootstrap Core CSS 
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Isi CSS -->
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Login CSS -->
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/customlogin.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link href="assets/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
  <!-- custom css -->
  <style>
    *:focus{
      box-shadow: none!important;
    }
    body{
      background: url("http://hrms.amnotel.co.id/assets/image/background/loginbg.jpg") 100% 100%;
    }
    .waves {
      overflow: hidden;
      position: relative;
      transition: 0.3s;
    }

    .waves:hover {
      cursor: pointer;
    }

    .wave {
      position: absolute;
      background: rgba(0, 0, 0, 0.25);
      border-radius: 100%;
      transform: scale(0.2);
      opacity: 0;
      pointer-events: none;
      animation: wave 0.90s ease-out;
    }

    @keyframes wave {
      from {
        opacity: 1;
      }
      to {
        transform: scale(2);
        opacity: 0;
      }
    }
    .hide{
      display: none;
    }
    .show{
      display: block;
    }
  </style>

  <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
    </script>
</head>

<body>        
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
               
            </div>
            <div class="panel-body">
            <form class="form-horizontal" id="formulir" role="form" action="<?php echo site_url('login');?>" method="POST">                                 
                    <img src="<?php echo base_url(); ?>assets/img/banner/pos.png" alt="logo" class="w-100 mb-20"> 
                    <p></p>
                    <h3 class="text-center">Point of Sales AMNOTEL</h3>                   
                    <hr style="width:90%;text-align:left;margin-left:20;color:gray;background-color:gray;height:0.5px;border-width:0">
                    <?php
                    if(!empty($pesan)) {
                        echo $pesan;
                    }?>                   
                    <?php echo $this->session->flashdata('message');?>
                    <div class="form-group m-form__group">                        
                           <?php echo form_error('username'); ?>
                            <input type="text" name="username" onkeyup="cekbutton()"    class="form-control form-control-lg m-input" id="inputEmail3" placeholder="Username" value="<?php echo set_value('username'); ?>">                        
                    </div>
                    <div class="form-group">                        
                            <?php echo form_error('password'); ?>
                            <input type="password" data-toggle="password" onkeyup="cekbutton()" name="password" class="form-control form-control-lg m-input" id="inputPassword3" placeholder="Password" value="<?php echo set_value('password'); ?>">                        
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-12 text-center">                            
                            <!--<button type="reset" class="btn btn-white m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">RESET</button>-->
                            <button type="submit" name="proses" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">LOGIN</button>
                        </div>
                    </div>
            </form>
        </div>  </div>           
        </div>           
    </div>
        
     
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>
  <!-- jquery -->
  <script src="http://hrms.amnotel.co.id/assets/jquery/jquery-3.4.1.min.js"></script>
  <script src="http://hrms.amnotel.co.id/assets/sweetalert/sweetalert2.min.js"></script>
  <script src="http://hrms.amnotel.co.id/assets/showpassword/bootstrap-show-password.min.js"></script>

  <!-- custom js -->
  <script src="http://hrms.amnotel.co.id/assets/geetest/gt.js"></script>   
  <script>
    //window.print();
  </script>
</body>
</html>

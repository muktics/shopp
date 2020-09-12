<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
<?php $this->session->userdata('akses')=='Teknisi'?>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
		
		<meta name="author" content="">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
    

    <!--<title> Sistem Teknisi Amnotel</title>-->
    
	<!--<link href="http://hrms.amnotel.co.id/assets/admin/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="http://hrms.amnotel.co.id/assets/admin/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->
	<link rel="stylesheet" href="http://hrms.amnotel.co.id/assets/admin/customkita/customcss.css">	

    
    
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/custom.css" rel="stylesheet">

    <!--begin::Base Styles -->  
    <!--begin::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		
		<!--end::Base Styles -->    

    <link href="<?php echo base_url(); ?>assets/asset/css/datepicker.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700%7COpen+Sans:300,400,500,600,700" media="all">
		
    
     
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/assets/demo/default/media/img/logo/logoposs.png"/>
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<!-- end::Head -->
<!--<body>
    <div id="wrapper">-->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->session->userdata('akses')=='Admin'?>       

    <!--<title>ADMIN</title>-->				
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    </style>
    <link rel="stylesheet" href="http://hrms.amnotel.co.id/assets/admin/customkita/customcss.css">	
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/css/custom.css" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/dist/css/sb-admin-2.css" rel="stylesheet">-->
    <link href="<?php echo base_url(); ?>assets/asset/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?php echo base_url(); ?>/assets/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/assets/demo/default/media/img/logo/logoposs.png"/>
    <link href="<?php echo base_url(); ?>assets/asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
<!-- <div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="">Laporan</a></li>
            <li class="active">Detail transaksikasir</li>
        </ol>

    </div>
    
</div> -->
<!-- /.col-lg-12 -->
<br><br><br>
<br><br><br>
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <div class="col-md-8">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-5">No Transaksi</label>
                            <span class="col-lg-6">
                                : <?php echo $transaksiteknisi['id_transaksi'];?>
                            </span>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-lg-5">Tanggal Service</label>
                            <span class="col-lg-6">
                                : <?php echo tgl_indonesia_transaksi($transaksiteknisi['tanggal_service']);?>
                            </span>
                        </div>-->
                        <!--<div class="form-group">
                            <label class="col-lg-5">Tanggal Selesai</label>
                            <label class="col-lg-6">
                                : <?php echo tgl_indonesia_transaksi($transaksiteknisi['tanggal_selesai']);?>
                            </label>
                        </div>-->
                        <div class="form-group">
                            <label class="col-lg-5">Status</label>
                            <span class="col-lg-7">
                                : <?php echo $transaksiteknisi['status_transaksi'];?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-5">Petugas</label>
                            <span class="col-lg-7">
                                : <?php echo $transaksiteknisi['full_name'];?>
                            </span>
                        </div>
                      
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Detail Barang</td>
                            <td class="text-center">IMEI</td>
                            <td class="text-center">Garansi</td>
                            <td class="text-center">Kerusakan</td>
                            <td class="text-center">Biaya</td>
                        </tr>
                    </thead>
                    <?php foreach($detailtransaksiteknisi as $row):?>
                    <tr>
                        <td><?php echo $row->merk;?></td>
                        <td><?php echo $row->imei;?></td>
                        <td><?php echo $row->garansi;?></td>
                        <td><?php echo $row->kerusakan;?></td>
                        <td><?php echo $row->biaya;?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                
                <!--<p class="text-right">
                <a href="" ><button  class="btn btn-primary"> Kembali</button></a></p>-->
            </div> <!-- end panel body -->
        
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>



<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });


   


    
    

}); //end document
</script>




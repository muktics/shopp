<head>
    <title>Data Tukar Tambah - Administrator POS Amnotel</title>
</head>

<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('datatukartambah'); ?>">Tukar Tambah</a> / Data Tukar Tambah</span></label>
					</h5>
				</div>
				<div class="col-md-8 mt-1 mb-1 text-right">
					<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<!-- <span id="hijriyah"></span> -->
							<span class="m-subheader__daterange-title">Hari ini :</span>
							<span class="m-subheader__daterange-date m--font-brand" id="jamtanggal"></span>							
						</span>
						<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
							<i class="fa fa-calendar"></i>
						</a>
					</span>
				</div>
            
			</div>
            <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>
            <br />  
    <!--<div class="row">
    <div class="col-lg-12">
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('datatukartambah'); ?>">Tukar Tambah</a></li>
            <li class="active">Data Tukar Tambah</li>
        
        <div class="col-md-9 mt-1 mb-1 text-right">
		<span class="m-subheader__daterange">
		<span class="m-subheader__daterange-label">
			<!-- <span id="hijriyah"></span> -->
		<!--<span class="m-subheader__daterange-title">Hari ini :</span>
		<span class="m-subheader__daterange-date m--font-brand" id="jamtanggal"></span>
		<script>
			// Function ini dijalankan ketika Halaman ini dibuka pada browser
			$(function() {
				setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
			});
            function timestamp() {
                $.ajax({
                    url: 'https://hrms.amnotel.co.id/calendar/jam',
                    success: function(data) {
                        $('#jamtanggal').html(data);
                    },
            });
                    };
                </script>
            </span>
            <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                <i class="fa fa-calendar"></i>
            </a>
        </span>
    </div></ol>
        <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 
</div>-->

<div class="row">
    <div class="col-lg-12">        
  
        <div class="panel panel-default">

            <!--<div class="panel-heading">
                Data Tukar Tambah
            </div>-->
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- pencarian -->
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-md-12 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Cari disini ..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                        <tr style="height: 56px;">
                            <th class="text-center">No</th>
                            <th class="text-center">No Transaksi</th>
                            <th class="text-center">Tanggal Transaksi</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">Detail Barang</th>
                            <th class="text-center">Alasan Tukar Tambah</th>                            
                            <th class="text-center">Harga Jual (Rp)</th>                                                    
                            <!--<th class="text-center">Barang Dibeli</th>                            
                            <th class="text-center">Harga Barang (Rp)</th>-->
                            <th class="text-center">Petugas</th>    
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($transaksitukartambah->result() as $row) {
                                ?>
                                <tr style="height: 56px;">
                                    <td class="text-center"><?php echo $no;?></td>                                    
                                    <td><a class="show-modal" kodenya="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
                                    <td class="text-center"><?php echo $row->tanggal_transaksi;?></td>
                                    <td class="text-center"><?php echo $row->nama_pelanggan;?></td>                                    
                                    <td class="text-center"><?php echo $row->detail;?></td>
                                    <td class="text-center"><?php echo $row->alasan;?></td>
                                    <td class="text-right"><?php echo rupiah($row->harga_jual);?></td>                                    
                                    <!--<td class="text-center"><?php echo $row->merk;?> <?php echo $row->tipe;?></td>
                                    <td class="text-right"><?php echo rupiah($row->harga);?></td>-->
                                    <td class="text-center"><?php echo $row->full_name;?></td>
                                    <td class="text-center">
                                        <span style="width:113px">
                                            <a href="<?php echo base_url('datatukartambah/edit/'.$row->id_transaksi) ?>" name="edit" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" name="<?php echo $row->nama_pelanggan;?>" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php echo $row->id_transaksi;?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $no++; } ?>    
                    </tbody>
                </table>
                            <!-- /.table-responsive -->                            
            </div>
                        <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <h4 class="modal-title text-center">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idhapus" id="idhapus">
                    <p>Apakah Anda Yakin Ingin Menghapus Pembeli Bernama <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-xs" id="konfirmasi">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Cari Laporan Tukar Tambah -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <h4 class="modal-title"><strong>Detail Pengembalian</strong></h4> -->
        </div>
        <div class="modal-body">
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
          

            <div id="tampildetail"></div>

        </div>        
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari laporan Tukar Tambah -->


<!-- jQuery 
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript 
<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript 
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript 
<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<!-- tambahin script ini -->
<script src="http://hrms.amnotel.co.id/assets/datatables/jquery.dataTables.js"></script>
<script src="http://hrms.amnotel.co.id/assets/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/assets/app/js/dashboard.js" type="text/javascript"></script>
<script src="assets/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<!--<script src="http://hrms.amnotel.co.id/assets/admin/demo/default/base/scripts.bundle.js" type="text/javascript"></script>-->
<!-- sampai sini -->

<script>

//== Class definition

var DatatableHtmlTableDemo = function() {
  //== Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#generalSearch'),
      },
      columns: [
        {
          field: 'No',
          width: "30",
          textAlign: 'center',
        },
        {
          field: 'IMEI',
          width: "150",
        },
        {
          field: 'Harga Jual (Rp)',
          type: 'number',
          textAlign : 'right',
        },
        {
          field: 'Harga Barang (Rp)',
          type: 'number',
          textAlign : 'right',
        },
        {
          field: 'Tanggall',
          type: 'date',
          format: 'YYYY-MM-DD',
        },
      ],
    });
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});

// $(document).ready(function() {
//     $('#dataTables-example').dataTable({
//         responsive: true
//     });
// });
</script>

<script type="text/javascript">
    // function confirmDelete()
    // {
    //     return confirm("Apakah anda yakin ingin menghapus data anggota")
    // }

    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            var name=$(this).attr("name");
           
            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var id_transaksi = $("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('datatukartambah/delete');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('datatukartambah/index/delete-success');?>";
                }
            });
        });
    });

    $('body').on('click', '.show-modal', function(){        
        var id_transaksi = $(this).attr("kodenya");
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        $.ajax({
                url:"<?php echo site_url('laporantukartambah/detail_laporantukartambah');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })
     
     });
</script>


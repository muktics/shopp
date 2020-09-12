<head>
    <title>Data Barang - Administrator POS Amnotel</title>
</head>


<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('barang'); ?>">Barang</a> / Data Barang</span></label>
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
<div class="row">
    <div class="col-lg-12">
        
        <?php //echo anchor('barang/create', 'Add', array('class' => 'btn btn-brand')); ?>
    
        <div class="panel panel-default">
            <!--<div class="panel-heading">
                Data Barang
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
                                <div class="col-md-9 text-right">
                                    <a href="barang/create" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-cart-plus"></i>
													<span>
									Tambah
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- table -->
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Merk</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Spesifikasi</th>
                            <th class="text-center">IMEI</th>                   
                            <th class="text-center">Harga (Rp)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($barang->result() as $row) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no;?></td>
                                    <!-- jika ada barang di dalam database maka tampilkan -->
                                    <td class="text-center"><?php if($row->image != "") { ?>
                                        <img src="<?php echo base_url('assets/img/barang/'.$row->image);?>" width="100px" height="100px">
                                        <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/img/barang/book-default.jpg');?>" width="100px" height="100px">
                                        <?php } ?> 
                                    </td>
                                    <td class="text-center"><?php echo $row->kode_barang;?><br><img width="100px" height="100px" src="<?php echo base_url().'assets/img/qr/'.$row->qrcode;?>"></td>
                                    <td class="text-center"><?php echo $row->merk;?></td>
                                    <td class="text-center"><?php echo $row->tipe;?></td>                                    
                                    <td class="text-center"><?php echo $row->spesifikasi;?></td>
                                    <td class="text-center"><?php echo $row->imei;?></td>
                                    <td style="text-align:center"><?php echo rupiah($row->harga);?></td>
                                    <td class="text-center">
                                        <span style="width:113px">
                                            <a href="<?php echo base_url('barang/edit/'.$row->kode_barang) ?>" name="edit" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" name="<?php echo $row->merk;?>" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php echo $row->kode_barang;?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span>
                                    </td>
                                    <!--<td class="text-center">
                                            <a href="<?php echo base_url('barang/edit/'.$row->kode_barang) ?>"><input type="submit" class="btn btn-success btn-xs" name="edit" value="Edit"></a>
                                            <a href="#" name="<?php echo $row->merk;?>" class="hapus btn btn-danger btn-xs" kode="<?php echo $row->kode_barang;?>">Hapus</a>
                                    </td>-->
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idhapus" id="idhapus">
                    <p>Apakah anda yakin ingin menghapus barang <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-xs" id="konfirmasi">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- jQuery 
<script src="<?php echo base_url(); ?>assets/asset/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<!--<script src="<?php echo base_url(); ?>assets/asset/vendor/metisMenu/metisMenu.min.js"></script>-->

<!-- DataTables JavaScript -->
<!--<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables/js/jquery.dataTables.min.js"></script>-->
<!--<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>-->
<!--<script src="<?php echo base_url(); ?>assets/asset/vendor/datatables-responsive/dataTables.responsive.js"></script>-->

<!-- Custom Theme JavaScript -->
<!--<script src="<?php echo base_url(); ?>assets/asset/dist/js/sb-admin-2.js"></script>-->

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
          class: "text-center",
          textAlign: 'center',
        },
        {
          field: 'Merk',
          width: "80",          
        },
        {
          field: 'IMEI',
          width: "125",
        },
        {
          field: 'Gambar',          
          textAlign: 'center',
        },
        {
          field: 'Kode Barang',
          width: "125",
          textAlign: 'center',
        },
        {
          field: 'Harga (Rp)',
          class: 'text-right',
          textAlign: 'right',
        },
        {
          field: 'Order Date',
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
            var kode_barang = $("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('barang/delete');?>",
                type:"POST",
                data:"kode_barang="+kode_barang,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('barang/index/delete-success');?>";
                }
            });
        });
    });
</script>


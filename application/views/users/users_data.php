<head>
    <title>Data User - Administrator POS Amnotel</title>
</head>
<div class="row d-flex align-items-center">
				<div class="mr-auto col-md-4 mt-1 mb-1">
					<h5 class="m-subheader__title">
                        <label for=""><span><a href="<?php echo base_url('users'); ?>">User</a> / Data User</span></label>
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
        <div class="panel panel-default">

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
                                    <a href="users/create" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-cart-plus"></i>
													<span>
									Tambah
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
                                    <?php //echo anchor('kasir/create', 'Tambah', array('class' => 'btn btn-brand')); ?>
                                </div>                         
                            </div>
                        </div>
                    </div>
                </div>
                <table class="m-datatable" id="html_table" width="100%">
                                <thead>
                                    <tr style="height: 56px;">
                                        <th class="text-center">No</th>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Role</th>
                                        <!--<th class="text-center">Password</th>-->
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($users as $row) {
                                ?>
                                    <tr style="height: 56px;">
                                        <td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $row->id_petugas;?></td>
                                        <td class="text-center"><?php echo $row->username;?></td>
                                        <td class="text-center"><?php echo $row->full_name;?></td>  
                                        <td class="text-center"><?php echo $row->jk;?></td>  
                                        <td class="text-center"><?php echo $row->jenis_user;?></td>
                                        <!--<td class="text-center"><?php echo $row->password;?></td>-->
                                        <td class="text-center">
                                            <span style="width:113px">
                                                <a href="<?php echo base_url('users/edit/'.$row->id_petugas) ?>" name="edit" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" username="<?php echo $row->full_name;?>" class="hapus btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only deletekar" kode="<?php echo $row->id_petugas;?>">
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
        <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="idhapus" id="idhapus">
                <p>Apakah anda yakin ingin menghapus users <strong class="text-konfirmasi"> </strong> ?</p>
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
          field: 'NIP',
          width: "150",
        },
        {
          field: 'Full Name',
          width: "200",
        },
        {
          field: 'Jenis Kelamin',
          width: "80",
        },
        {
          field: 'Role',
          width: "50",
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
            var kode = $(this).attr("kode");
            var name = $(this).attr("username");
           
            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var id_petugas = $("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('users/delete');?>",
                type:"POST",
                data:"id_petugas="+id_petugas,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('users/index/delete-success');?>";
                }
            });
        });
    });
</script>


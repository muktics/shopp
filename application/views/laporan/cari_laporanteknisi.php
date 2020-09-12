<?php if($hasil_search->num_rows() > 0) { ?>
<table class="table ">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Transaksi</td>
            <td>Tanggal Service</td>
            <!--<td>Tanggal Selesai Service</td>-->
            <td>Status</td>
            <td>Petugas</td>
        </tr>
    </thead>
    <?php $no=0; foreach($hasil_search->result() as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a class="show-modal" kode="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
        <td><?php echo tgl_indonesia_transaksi($row->tanggal_service);?></td>
        <!--<td><?php echo tgl_indonesia_transaksi($row->tanggal_selesai);?></td>-->
        <td><?php echo $row->status_service; ?></td>
        <td><?php echo $row->full_name;?></td>
    </tr>
    <?php endforeach;?>
</table>
<br><br>

				<!--begin::Portlet-->
				    <div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Laporan Status Service
									</h3>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">
                            <div id="m_morris_3" style="height:500px;">
                            </div>
						</div>
					</div>
				<!--end::Portlet-->
				</div>						
        </div>

<?php }else{ ?>
<p class="text-center"><strong> ~ Maaf Data Belum Tersedia ~ </strong></p>
<?php } ?>

<script>
        Morris.Bar({
          element: 'm_morris_3',
          data: <?php //echo $dataa;?>[
                { y: 'Status Service', c: <?php echo $counttransaksiteknisi; ?>,a: <?php echo $counttransaksiteknisiproses; ?>, b: <?php echo $counttransaksiteknisiselesai; ?> },                
                ],
          xkey: 'y',
          ykeys: ['c', 'a', 'b'],
          labels: ['Total Service', 'Belum Selesai', 'Selesai']
        });
    </script>
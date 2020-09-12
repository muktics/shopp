<?php if($hasil_search->num_rows() > 0) { ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Transaksi</td>            
            <td>Tanggal Transaksi</td>
            <!--<td>Denda</td>
            <td>IMEI</td>
            <td>Merk</td>
            <td>Tipe</td>-->
            <td>ID Petugas</td>
        </tr>
    </thead>
    <?php $no=0; foreach($hasil_search->result() as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a class="show-modal" kode="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
        <td><?php echo tgl_indonesia_transaksi($row->tanggal_transaksi);?></td>
        <!--<td><?php echo $row->denda;?></td>
        <td><?php echo $row->imei; ?></td>
        <td><?php echo $row->merk; ?></td>
        <td><?php echo $row->tipe; ?></td>-->
        <td><?php echo $row->full_name;?></td>
    </tr>
    <?php endforeach;?>
</table>

<?php }else{ ?>
<p class="text-center"><strong> ~ Maaf Data Belum Tersedia ~ </strong></p>
<?php } ?>
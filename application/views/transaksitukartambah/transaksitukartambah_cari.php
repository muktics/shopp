<?php if($barang->num_rows() > 0) { ?>
<br /><br />
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Kode barang</td>
                <td>Tipe</td>
                <td>Merk</td>
                <td>Harga</td>
                <td>IMEI</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($barang->result() as $data):?>
        <tr>
            <td><?php echo $data->kode_barang;?></td>
            <td><?php echo $data->tipe;?></td>
            <td><?php echo $data->merk;?></td>
            <td><?php echo $data->harga;?></td>
            <td><?php echo $data->imei;?></td>
            <td>
                <a href="#" class="tambah" 
                kode="<?php echo $data->kode_barang;?>"
                tipe="<?php echo $data->tipe;?>"
                merk="<?php echo $data->merk;?>"
                harga="<?php echo $data->harga;?>"
                imei="<?php echo $data->imei;?>">
                <i class="glyphicon glyphicon-plus"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
<?php }else{ ?>
<br />
<strong>Barang Tidak Ada</strong>

<?php } ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Id Transaksi</td>
            <td>Tanggal Service</td>
            <td>Imei</td>
            <td>Merk</td>
        </tr>
    </thead>
    <?php foreach($selesaiservice as $row):?>
    <tr>
        <td><?php echo $row->idtransaksi;?></td>
        <td><?php echo $row->tanggal_service;?></td>
        <td><?php echo $row->imei;?></td>
        <td><?php echo $row->merk;?></td>
    </tr>
    <?php endforeach;?>
</table>
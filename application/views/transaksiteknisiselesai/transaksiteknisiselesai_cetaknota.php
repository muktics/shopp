<br><br><br>
<br>
<div class="row mb-2">
                        <div class="col-2">
                            <img src="https://hrms.amnotel.co.id/assets/image/logo/aatcdv.png" class="w-100">
                        </div>
                        <div class="col-9 text-center" style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
                            <p style="margin-bottom: 5px"><strong>AMNOTEL STORE</strong></p>
                            <p style="margin-bottom: 5px"><i>trusted in connecting and securing your business</i></p>
                            <p style="margin-bottom: 5px">Jl. Potronanggan RT.06, Kragilan, Tamanan, Banguntapan, Bantul, Yogyakarta, 55191</p>
                        </div>
                    </div>
<div class="text-center">
    <span >Faktur Service</span><br>          
    <span class="text-center"><?php echo tgl_indonesia_transaksi($tanggal_selesai);?></span>
</div>
<div class="text-left">
    <?php foreach($tmptrserviceselesai as $tmptrserviceselesai):?>
    <span id=no_transaksi>No Transaksi &emsp;&nbsp; : <?php echo $tmptrserviceselesai->id_transaksi; ?></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id=no_transaksi>Garansi : <?php echo $tmptrserviceselesai->garansi; ?><?php //echo $autonumber ?></span><br>
</div>
<div class="text-left">
    <span>Tanggal Service &nbsp;:  <?php echo tgl_indonesia_transaksi($tmptrserviceselesai->tanggal_service); ?></span>
</div>
<div class="text-left">
    <span>Petugas&emsp;&emsp;&emsp;&nbsp; &nbsp; : <?php echo  $this->session->userdata['full_name']; ?></span>
</div>
<br>
<div class="form-group">
    <div class="col-md-4 text-left">
        <label>Nama Barang</label>
    </div>
    <div class="col-md-4 text-center">
        <label>IMEI</label>
    </div>
    <div class="col-md-4 text-right">
        <label>Kerusakan</label>
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 text-left">
        <span><?php echo $tmptrserviceselesai->merk;?></span>
    </div>
    <div class="col-md-4 text-center">
        <span><?php echo $tmptrserviceselesai->imei;?></span>
    </div>
    <div class="col-md-4 text-right">
        <span><?php echo $tmptrserviceselesai->kerusakan;?></span>
    </div>
</div>
<br><br>

<?php //$totalharga +=$tmp->harga;
        //endforeach;?>
        <hr style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
<div>
    <span class="col-lg-8 text-right"><?php //echo $jumlahTmp;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span> 
    <span class="col-lg-1 text-left">Total</span>       
    <span class="col-lg-3 text-right"><?php echo rupiah($tmptrserviceselesai->biaya);?></span>
</div>
<div>
    <span class="col-lg-8 text-left"></span>   
    <span class="col-lg-1 text-left">Tunai</span> 
    <?php //foreach($tmptrserviceselesai as $tmptrserviceselesai):?>  
    <span class="col-lg-3 text-right"><?php echo rupiah($tmptrserviceselesai->tunai);?></span>
</div>
<div>
    <span class="col-lg-8 text-left"></span>   
    <span class="col-lg-1 text-left">Kembalian</span>  
    <!--<input type="text" class="text-right" id="kembalian"  name="kembalian" onkeyup="sum();" readonly="readonly" value="<?php //echo rupiah($kembali);?>" class="form-control">-->
    <span id="cetakKembalian" class="col-lg-3 text-right"><?php echo rupiah($tmptrserviceselesai->kembalian);?></span>
</div>
<br><br><br>
<hr style="border-bottom: 0.5px solid #525252;padding-bottom: 0px;">
<div class="form-group">
    <div class="col-md-6 text-left">
        <label >Pelanggan</label>
    </div>
    <div class="col-md-6 text-right">
        <label >Petugas</label>
    </div>
</div>
<br><br>
<br><br>
<div class="form-group">
    <div class="col-md-6 text-left">
        <span><?php echo $tmptrserviceselesai->nama_pelanggan;?></span>
        <?php endforeach;?>
    </div>
    <div class="col-md-6 text-right">
        <span ><?php echo  $this->session->userdata['full_name']; ?>&emsp;</span>
    </div>
</div>

<!--<button onclick="window.print()">Print this page</button>
<button onClick="window.print();return false" type="button" class="btn btn-brand" data-dismiss="modal"><i class="fa fa-print"></i></button>-->

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
<script>
var rate = <?php echo $rate; ?> //inserted with PHP
$("#iii").change(function(){
    var inputKembalian = this.value;    
    var text = aa
    $('#ii').text(text);
});
</script>
<script>
function cetakTunai() {           
    document.getElementById('tunai').value;      
}
function cetakKembalian() {           
    var aa = $("#kembalian").val();
    document.getElementById('cetakKembalian').html() = aa;      
}
</script>

<script>
    function sama(){
        var a = $("#kembalian").val();
        document.getElementById('cetakKembalian').value = a;        
    }
</script>
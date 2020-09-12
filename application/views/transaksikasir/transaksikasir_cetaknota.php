<!--
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="">Laporan</a></li>
            <li class="active">Detail Peminjaman</li>
        </ol>

    </div>
</div> --> <!-- /.col-lg-12 -->
<br><br><br>
<br><br><br>
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
    <span >Faktur Penjualan</span><br>          
    <span class="text-center"><?php echo tgl_indonesia_transaksi($tanggal_transaksi);?></span>
</div>
<div class="text-left">
    <span id=no_transaksi>No Transaksi : <?php echo $autonumber ?></span><br>
    <span>Petugas&emsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo  $this->session->userdata['full_name']; ?></span>
</div>
<br>
<div class="form-group">
    <div class="col-md-4 text-left">
        <label>Deskripsi</label>
    </div>
    <div class="col-md-4 text-center">
        <label>Jumlah</label>
    </div>
    <div class="col-md-4 text-right">
        <label>Harga</label>
    </div>
</div>
<?php $totalharga=0;
        foreach($tmp as $tmp):?>
<div class="form-group">
    <div class="col-md-4 text-left">
        <span><?php echo $tmp->merk;?> <?php echo $tmp->tipe;?></span>
    </div>
    <div class="col-md-4 text-center">
        <span>1</span>
    </div>
    <div class="col-md-4 text-right">
        <span><?php echo rupiah($tmp->harga);?></span>
    </div>
</div>
<br><br>

<?php $totalharga +=$tmp->harga;
        endforeach;?>
        <hr style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
<div>
    <span class="col-lg-8 text-right"><?php //echo $jumlahTmp;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span> 
    <span class="col-lg-1 text-left">Total</span>   
    <span class="col-lg-3 text-right" id="totalhargaaa"><?php echo rupiah($totalharga);?></span>
</div>
<div>
    <span class="col-lg-8 text-left"></span>   
    <span class="col-lg-1 text-left">Tunai</span>   
    <?php foreach($tmptrbelibyr as $tmptrbelibyr):?>
    <span id="cetakTunai" class="col-lg-3 text-right"><?php echo rupiah($tmptrbelibyr->tunai);?></span>
</div>
<div>
    <span class="col-lg-8 text-left"></span>   
    <span class="col-lg-1 text-left">Kembalian</span>  
    <!--<input type="text" class="text-right" id="kembalian"  name="kembalian" onkeyup="sum();" readonly="readonly" value="<?php //echo rupiah($kembali);?>" class="form-control">-->
    <span class="col-lg-3 text-right"><?php echo rupiah($tmptrbelibyr->kembalian);?></span>
    <?php endforeach;?>
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
        <span>___________</span>
    </div>
    <div class="col-md-6 text-right">
        <span ><?php echo  $this->session->userdata['full_name']; ?>&emsp;</span>
    </div>
</div>
<br>
        <span>Nb:</span><br>
        <span>- iPhone garansi 1 bulan (tidak termasuk headset dan charger), lama garansi 1 bulan (1 minggu replace 3 minggu repair) </span><br>
        <span>- Garansi meliputi kerusakan fungsi bukan fisik</span><br>
        <span>- iPhone yang sudah dibeli tidak dapat dikembalikan atau ditukar dengan barang lain</span><br>
        <span>- Garansi batal apabila nota hilang/segel rusak/kesalahan pemakai seperti jatuh atau kena air</span>

<!--<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <div class="col-md-8">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-5">No Transaksi</label>
                            <label class="col-lg-6">
                                : <?php //echo $transaksikasir['id_transaksi'];?>
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-5">Tanggal Transaksi</label>
                            <label class="col-lg-6">
                                : <?php //echo tgl_indonesia_transaksi($transaksikasir['tanggal_transaksi']);?>
                            </label>
                        </div>

                <!--<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Kode Barang</td>
                            <td>IMEI</td>
                            <td>Merk</td>
                            <td>Tipe</td>
                            <td>Harga</td>
                        </tr>
                    </thead>
                    <?php $totalharga=0;
                        foreach($detailtransaksikasir as $row):?>
                    <tr>
                        <td><?php echo $row->kode_barang;?></td>
                        <td><?php echo $row->imei;?></td>
                        <td><?php echo $row->merk;?></td>
                        <td><?php echo $row->tipe;?></td>
                        <td><?php echo rupiah($row->harga);?></td>
                    </tr>
                    <?php $totalharga +=$row->harga;
                        endforeach;?>
                    <tr>
                        <td colspan="4">Total</td>
                        <td colspan="1"><?php echo rupiah($totalharga);?></td>
                    </tr>
                    
                </table>-->

                <!-- <p class="text-right">
                <a href="" ><button  class="btn btn-primary"> Kembali</button></a></p> -->
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
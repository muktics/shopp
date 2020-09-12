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
        <label>Deskripsi Pembelian</label>
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

<?php $totalharga +=$tmp->harga;
        endforeach;?>
<br>
<div class="form-group"><br>
    <div class="col-md-12 text-left">
        <label>Deskripsi Tukar Tambah</label>
    </div>

</div>
<?php $totaltt = 0;        
        foreach($tmptrttbyr as $tmptrttbyr):?>
<div class="form-group">
    <div class="col-md-4 text-left">
        <span><?php echo $tmptrttbyr->detail;?></span>
    </div>
    <div class="col-md-4 text-center">
        <span>1</span>
    </div>
    <div class="col-md-4 text-right">
        <span><?php echo rupiah($tmptrttbyr->harga_jual);?></span>
    </div>
</div>
<br><br>
        <hr style="border-bottom: 1px solid #525252;padding-bottom: 0px;">
<div>
    <span class="col-lg-7 text-right"><?php //echo $jumlahTmp;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span> 
    <span class="col-lg-2 text-left">Total</span>   
    <span class="col-lg-3 text-right"><?php echo rupiah($totalharga);?></span>
</div>
<div>
    <span class="col-lg-7 text-right"><?php //echo $jumlahTmp;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span> 
    <?php $totaltt +=$tmptrttbyr->harga_jual;
            $subtotall = $totalharga - $totaltt;?>
    <span class="col-lg-3 text-left">Harga Tukar Tambah</span>   
    <span class="col-lg-2 text-right"><?php echo rupiah($totaltt);?></span>
</div>
<div>
    <span class="col-lg-7 text-right"><?php //echo $jumlahTmp;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span> 
    <span class="col-lg-3 text-left">Sub Total</span>   
    <span class="col-lg-2 text-right"><?php echo rupiah($subtotall);?></span>
</div>
<div>
    <span class="col-lg-7 text-left"></span>   
    <span class="col-lg-3 text-left">Tunai</span>   
    
    <span class="col-lg-2 text-right"><?php echo rupiah($tmptrttbyr->tunai);?></span>    
</div>
<div>
    <span class="col-lg-7 text-left"></span>   
    <span class="col-lg-3 text-left">Kembalian</span>  
    <!--<input type="text" class="text-right" id="kembalian"  name="kembalian" onkeyup="sum();" readonly="readonly" value="<?php //echo rupiah($kembali);?>" class="form-control">-->    
    <span class="col-lg-2 text-right"><?php echo rupiah($tmptrttbyr->kembalian);?></span>    
</div>
<br><br><br><br><br>
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
        <span><?php echo $tmptrttbyr->nama_pelanggan;?></span>
        <?php endforeach;?>
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

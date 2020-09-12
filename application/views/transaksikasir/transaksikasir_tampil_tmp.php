<table class="table">
    <thead>
        <tr>
            <td class="text-center">Kode barang</td>
            <td class="text-center">Tipe</td>
            <td class="text-center">Merk</td>
            <td class="text-center">IMEI</td>
            <td class="text-center">Harga</td>
            <td class="text-center"></td>
        </tr>
    </thead>
    <?php $totalharga=0;
        foreach($tmp as $tmp):?>
    <tr>
        <td class="text-center"><?php echo $tmp->kode_barang;?></td>
        <td class="text-center"><?php echo $tmp->tipe;?></td>
        <td class="text-center"><?php echo $tmp->merk;?></td>        
        <td class="text-center"><?php echo $tmp->imei;?></td>
        <td class="text-right"><?php echo rupiah($tmp->harga);?></td>
        <td class="text-center"><a href="#" class="hapus" kode="<?php echo $tmp->kode_barang;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php $totalharga +=$tmp->harga;
        endforeach;?>
    <tr>
        <td colspan="4" class="text-left">&emsp;&emsp;Total</td>
        <td colspan="1" class="text-right" id="totalHarga" onkeyup="sum();" readonly="readonly"><?php echo rupiah($totalharga);?></td>
        <td colspan="1" id="jumlahTmp"class="text-center"><?php echo $jumlahTmp;?></td>
    </tr>
    <tr>
        <td colspan="4" class="text-left">&emsp;&emsp;Bayar</td>
        <td colspan="1" class="text-right">
            <input type="text" name="tunai" class="form-control text-right"  id="tunai" onkeyup="sum();"  class="form-control">
            <!--<input type="text" name="tunai" class="form-control text-right" onkeyup="sum();" id="dengan-rupiah"  class="form-control">-->
        </td>
    </tr>
    <?php //$kembali = $a - $totalharga?>
    <tr>
        <td colspan="4" class="text-left">&emsp;&emsp;Kembali</td>
        <td colspan="1" class="text-right">
            <input type="text" class="form-control text-right" id="kembalian"  name="kembalian" onkeyup="sum();" readonly="readonly" value="<?php //echo rupiah($kembali);?>" class="form-control" >
            <!--<input type="text" class="form-control text-right" id="dengan-rupiah1"  name="kembalian" onkeyup="sum();" readonly="readonly" value="<?php //echo rupiah($kembali);?>" class="form-control">-->
        </td>
    </tr>
</table>
<script>

    var dengan_rupiah = document.getElementById('tunai');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value);
    });

    var dengan_rupiah1 = document.getElementById('kembalian');
    dengan_rupiah1.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value1 = formatRupiah1(this.value);
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }

    function sum() {
        var totalHarga = "<?php echo $totalharga;?>";
        var bayar1 = document.getElementById('tunai').value;
        var bayar = bayar1.split('.').join("");
        //var	reverse = txtSecondNumberValue.toString().split('').reverse().join(''),
                //ribuan 	= reverse.match(/\d{1,3}/g);
                //ribuan	= ribuan.join('.').split('').reverse().join('');
        var subTotal = bayar - totalHarga;  
        
        document.getElementById('kembalian').value = formatRupiah1(subTotal.toString());     
        // console.log(formatRupiah1();  
    }

    function formatRupiah1(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }

</script>


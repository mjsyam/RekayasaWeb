<?php echo anchor('/member/member_dashboard','back to dashboard')?>
<?php
$quantity = array(
      'name'        => 'quantity',
      'maxlength'   => '3',
      'size'        => '3',
);
foreach ($produk as $produk){ ?>

<div>
    <table>
        <tr>
            <td colspan="3" align="center"><?php echo $produk->nama_produk?></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><img src="<?php echo base_url()?>include/gambar/<?php echo $produk->gambar?>" width="100px" height="100px"/></td>
        </tr>
        <tr>
            <td colspan="3" align="center">harga Rp.<?php echo $this->cart->format_number($produk->harga) ?></td>
        </tr>
        <!-- belanja form-->
        <tr>
            <?php echo form_open("member/control_crud_produk/masuk_cart");?>
            <td><?php echo form_label('Quantity');?></td>
            <td><?php echo form_input($quantity);?></td>
            <td><?php echo form_hidden('idprdk',$produk->id_produk)?></td>
            <td><?php echo form_submit('submit','Masukan Ke Keranjang')?></td>
            <?php echo form_close()?>
        </tr>
        <!-- end form belanja-->
    </table>
</div>
<hr>
    <?php
}

?>

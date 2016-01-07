<?php echo anchor('/member/member_dashboard','back to dashboard')?>
<script>
function inform(){
    alert('jika ingin menghapus item dari cart, silahkan update dan ubah quantity barang = 0');
}
</script>
<?php
if(!empty ($cart_list)){ 
?><table class="borderedMB">
    <th>Num</th> <th>Nama</th> <th>Jumlah</th> <th>Harga Satuan</th> <th>Harga Total</th> <th colspan="2">action</th>
    <?php $i = 1;?>
<?php foreach($cart_list as $cart){ ?>
    <tr>
        <?php echo form_open("member/control_crud_produk/update_cart")?>
        <td><?php echo form_hidden('rowid',$cart['rowid']);echo $i;?></td>
        <td><?php echo $cart['name']; ?></td>
        <td><?php echo form_input(array('name' => 'qty', 'value' => $cart['qty'], 'maxlength' => '3', 'size' => '3')); ?></td>
        <td>Rp.<?php echo $this->cart->format_number($cart['price']); ?></td>
        <td>Rp.<?php echo $this->cart->format_number($cart['qty']*$cart['price']); ?></td>
        <td><?php echo form_submit("submit",'update')?></td>
        <?php echo form_close()?>
    </tr>
    
    <?php
        $i++;};//tutup foreach looping 
       ?>
    <tr>
        <td colspan="2"><B>TOTAL</B></td>
        <td><b><?php echo $this->cart->total_items();?></b></td>
        <td></td>
        <td><b>Rp.<?php echo $this->cart->format_number($this->cart->total());?></b></td>
        <td align="center"><?php echo anchor("/member/control_crud_produk/lihat_cart/$cart[id]",'Help',"onclick='inform()'")?></td>
    </tr>
    
    <tr>
        <?php echo form_open("member/control_crud_produk/order_produk");?>
        <td><?php echo form_submit('submit','Order Sekarang', 'class="button"')?></td>
        <?php echo form_close()?>
    </tr>
</table>
<?php
    }else{
       echo "cart masih kosong";    
}
?>
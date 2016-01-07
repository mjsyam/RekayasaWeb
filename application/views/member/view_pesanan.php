<?php echo anchor('/member/member_dashboard','back to dashboard')?>
<table>
    <th>Nama Produk</th><th>jumlah pesanan</th><th>harga satuan</th> <th>total_harga</th> 
    <th>tanggal pesan</th> <th>status</th>
<?php
foreach($pesanan as $show){
    ?>
    
    <tr>
        <td><?php echo $show->nama_produk ?></td>
        <td><?php echo $show->jumlah?></td>  
        <td>Rp.<?php echo $this->cart->format_number($show->harga_satuan)?></td>
        <td>Rp.<?php echo $this->cart->format_number($show->total_harga_pesanan)?></td>
        <td><?php echo $show->tanggal?></td>
        <td><?php echo $show->status?></td>
    </tr>
<?php
};
?>
</table>
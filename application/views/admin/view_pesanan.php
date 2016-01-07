<?php echo anchor('/admin/dashboard','Back To Dashboard', 'class=button')?>

<table class='bordered'>
  <thead>
    <tr><th>ID</th>
        <th>Nama Pemesan</th> 
        <th>Nama Produk</th>
        <th>Jumlah pesanan</th>
        <th>Total Harga</th> 
        <th>Tanggal Pesan</th> 
        <th>Status</th>
        <th>Action</th></tr></thead>
<?php
    $no =0;
foreach($pesanan as $show){
        $no++;
    ?>

    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo anchor("/admin/control_crud_produk/lihat_detail_pemesan/$show->id_pengguna","$show->nama_pemesan")?></td>
        <td><?php echo anchor("/admin/control_crud_produk/lihat_detail_pesanan_produk/$show->id_produk","$show->nama_produk")?></td>
        <td align="center"><?php echo $show->jumlah?></td>
        <td>Rp.<?php echo $this->cart->format_number($show->total_harga_pesanan)?></td>
        <td><?php echo $show->tanggal?></td>
        
        <!lock pesanan yang sudah selesai transaksi -->   
        <?php echo form_open('/admin/control_crud_produk/ganti_status_pesanan')?>
        <?php $lock = $show->status;
        if($lock == 'Success'){ ?> 
            <td><?php echo $show->status;?></td>
        <?php }else{?>
        <?php $status = array(
            $show->status => "$show->status",
            'Awaiting Confirmation' => 'Awaiting Confirmation',
            'Confirmed' =>'Confirmed',
            'Rejected' => 'Rejected',
            'Success' => 'Success'
            
        );?> 
        <td><?php echo form_dropdown('status',$status)?></td>
        <?php echo form_hidden('idpesanan',$show->id_pesanan);?>
        <td><?php echo form_submit('submit','Post', 'class="submit"');?></td>
        <?php }?>
        <!-- end lock pesanan -->
        
        <?php echo form_close()?>
    </tr>
<?php
};
?>
</table>
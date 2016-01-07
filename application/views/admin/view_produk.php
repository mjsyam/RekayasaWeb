<?php echo anchor('/admin/dashboard','Back To Dashboard', 'class=button')?>
<?php
foreach ($produk as $produk){ ?>

<div>
    <table class="bordered">
        <tr>
            <td><span id="merek"><?php echo $produk->nama_produk?></span></td>
        </tr>
        <tr>
            <td colspan="2"><img src="<?php echo base_url()?>include/gambar/<?php echo $produk->gambar?>" width="100px" height="100px"/></td>
        </tr>
        <tr>
            <td>harga Rp.<?php echo $this->cart->format_number($produk->harga) ?></td>
        </tr>
        <tr>
            <td>Kategori <?php echo $produk->kategori; ?></td>
        </tr>
        <tr>
            <td><?php echo anchor("/admin/control_crud_produk/show_form_edit_produk/$produk->id_produk","Edit", "class=button");?></td>
            <td><?php echo anchor("/admin/control_crud_produk/delete_produk/$produk->id_produk",'Delete', "class=button");?></td>
        </tr>
    </table>
</div>
    <?php
}

?>
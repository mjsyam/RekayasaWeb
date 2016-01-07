<html>
<head>
<title>Manajemen Produk</title>
</head>
<body>
    <h3 align="center">Form Edit Produk</h3>
    <?php echo form_open_multipart('');?>
    <?php    foreach ($updateproduk as $update){ ?>
    <table align="center">
        <tr>
            <td colspan="3" align="center"><img src="<?php echo base_url()?>include/gambar/<?php echo $update->gambar?>" width='100px' height='100px'/></td>
        </tr>
        <tr>
            <td><?php echo form_label('Nama')?></td>
            <td><?php echo form_input('nama_produk',$update->nama_produk);?></td>
            <td><?php echo form_error('nama_produk');?></td>
        </tr>
        
        <tr>
            <td><?php echo form_label('Harga');?></td>
            <td><?php echo form_input('harga',$update->harga);?></td>
            <td><?php echo form_error('harga');?></td>
        </tr>
        
            <?php
            $kategori = array(
                $update->kategori=>'default',
                'V-Neck' => 'V-Neck',
                'O-Neck' => 'O-Neck',
                'Long Sleeves' => 'long Sleeves',
                'Short Sleeves' => 'Short Sleeves'
                );
            ?>
        <tr>
            <td><?php echo form_label('Kategori')?></td>
            <td><?php echo form_dropdown('kategori', $kategori);?></td>
        </tr>
        
        <tr>
            <td><?php echo form_reset('reset', 'Reset'); ?></td>
            <td><?php echo form_submit('submit','Update');?></td>
        </tr>
    
        <?php echo form_close();?>
    </table>
    <?php }?>
    </div>
</body>
</html>
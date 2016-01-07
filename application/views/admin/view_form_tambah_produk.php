
    <?php
        $kategori = array(
                'V-Neck' => 'V-Neck',
                'O-Neck' => 'O-Neck',
                'Long Sleeves' => 'long Sleeves',
                'Short Sleeves' => 'Short Sleeves'
                );
    ?>

    <h3 align="left">Form Tambah Produk</h3>
    
    
    <table align="center">
        <?php 
            echo form_open_multipart('admin/control_crud_produk/tambah_data_produk'); 
    ?>
        <tr>
            <td><?php echo form_label('Nama')?></td>
            <td><?php echo form_input('nama_produk');?></td>
            <td><?php echo form_error('nama_produk');?></td>
        </tr>
        
        <tr>
            <td><?php echo form_label('Harga');?></td>
            <td><?php echo form_input('harga');?></td>
            <td><?php echo form_error('harga');?></td>
        </tr>
        
        <tr>
            <td><?php echo form_label('Kategori')?></td>
            <td><?php echo form_dropdown('kategori', $kategori);?></td>
        </tr>
        
        <tr>
            <td><?php echo form_label('Upload Gambar')?></td>
            <td><?php echo form_upload('userfile');?></td>
            <td><?php echo $error;?></td>
        </tr>
        
        <tr>
            <td></td>
            <td><?php echo form_reset('reset', 'Reset', 'class=submit'); ?>
                <?php echo form_submit('submit','upload', 'class=submit');?></td>
            <td></td>
        </tr>
    
        <?php echo form_close();?>
    </table>
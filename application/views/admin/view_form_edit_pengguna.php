<tittle>form edit member khusus admin</tittle>
<?php foreach($editmember as $edit){ ?>
<table>
    <?php echo form_open(); ?>
    <tr>
        <td>Username</td>
        <td>:</td>
        <td><?php echo form_input('usernamex',$edit->nama);?></td>
        <td><?php echo form_error('usernamex')?></td>
    </tr>
    
    <tr>
        <td>Surename</td>
        <td>:</td>
        <td><?php echo form_input('surename',$edit->nama_asli);?></td>
        <td><?php echo form_error('surename')?></td>
    </tr>
    
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo form_input('email',$edit->email);?></td>
        <td><?php echo form_error('email');?></td>
    </tr>
    
    <tr>
        <td colspan="2"></td>
        <td><?php echo form_reset('reset','Reset')?>
        <?php echo form_submit('submit','update')?></td>
    </tr>
    <?php echo form_close();?>
</table>

<?php 
    }
?>
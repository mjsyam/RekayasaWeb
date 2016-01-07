<tittle>form tambah member</tittle>
<table>
    <?php echo form_open(); ?>
    <tr>
        <td>Username</td>
        <td>:</td>
        <td><?php echo form_input('usernamex');?></td>
        <td><?php echo form_error('usernamex');echo $alert;?></td>
    </tr>
    
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><?php echo form_password('passwordx');?></td>
        <td><?php echo form_error('passwordx');?></td>
    </tr>
    
    <tr>
        <td>Password Confirmation</td>
        <td>:</td>
        <td><?php echo form_password('passconf');?></td>
        <td><?php echo form_error('passconf');?></td>
    </tr>
    
    <tr>
        <td>Surename</td>
        <td>:</td>
        <td><?php echo form_input('surename');?></td>
        <td><?php echo form_error('surename')?></td>
    </tr>
    
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo form_input('email');?></td>
        <td><?php echo form_error('email');?></td>
    </tr>
    
    <?php $dropdown = array(
        '3' => 'admin',
        '6' => 'member'
    );?>
    <tr>
        <td>akses</td>
        <td>:</td>
        <td><?php echo form_dropdown('akses',$dropdown)?></td>
    </tr>
    
    <tr>
        <td colspan="2"></td>
        <td><?php echo form_reset('reset','Reset')?>
        <?php echo form_submit('submit','new entry')?></td>
    </tr>
    <?php echo form_close();?>
</table>
<h3 align="left">Change Password</h3>
<table>
    <?php echo form_open(); ?>
    <tr>
        <td>Old Password</td>
        <td>:</td>
        <td><?php echo form_input('oldpasswordx');?></td>
        <td><?php echo form_error('oldpasswordx');echo form_error('oldpasswordxconf');echo $alert;?></td>
    </tr>
    
    <tr>
        <td>New Password</td>
        <td>:</td>
        <td><?php echo form_password('newpasswordx');?></td>
        <td><?php echo form_error('newpasswordx');?></td>
    </tr>
    
    <tr>
        <td>Retype New Password</td>
        <td>:</td>
        <td><?php echo form_password('passconf');?></td>
        <td><?php echo form_error('passconf');?></td>
    </tr>
    
    <tr>
        <td colspan="2"></td>
        <td><?php echo form_reset('reset','Reset', 'class=submit')?>
        <?php echo form_submit('submit','Change Password', 'class=submit')?></td>
    </tr>
    <?php echo form_close();?>
</table>
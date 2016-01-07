<style type="text/css">@import url("<?php echo base_url().'include/CSSA/formCSS.css'; ?>");</style>
<h4>Sign Up Now</h4>
<hr>
<table>
    <?php echo form_open('login/register'); ?>
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
    
    <tr>
        <td colspan="2"></td>
        <td><?php echo form_reset('reset','Reset', 'class="submit"')?>
        <?php echo form_submit('submit','Sign Up', 'class="submit"')?></td>
    </tr>
    <?php echo form_close();?>
</table>
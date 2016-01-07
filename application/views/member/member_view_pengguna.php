<?php echo anchor('/member/member_dashboard','back to dashboard')?>
<p>data anda :</p>
<?php
    if(isset ($self)){
    foreach ($self as $saya){
    
?>
<table>
    
    <tr>
        <td>Nomor Identitas</td>
        <td>:</td>
        <td><?php echo $saya->id_pengguna?></td>
        <td><?php echo anchor("member/control_crud_member/show_form_edit_pengguna/$saya->id_pengguna",'update')?></td>
        
    </tr>
   
    <tr>
        <td>Username</td>
        <td>:</td>
        <td><?php echo $saya->nama?></td>
    </tr>
    
   <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $saya->nama_asli?></td>
    </tr>
    
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><?php echo $saya->pass?></td>
    </tr>
    
    <tr>
        <td>email</td>
        <td>:</td>
        <td><?php echo $saya->email?></td>
    </tr>
</table>

<?php
        }
    }
?>
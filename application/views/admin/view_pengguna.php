<?php echo anchor('/admin/dashboard','back to dashboard');echo '&nbsp|&nbsp';?>
tambah pengguna <?php echo anchor('admin/control_crud_pengguna/show_form_tambah_pengguna','new entry')?>

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
        <td><?php echo anchor("admin/control_crud_pengguna/show_form_edit_pengguna/$saya->id_pengguna",'update')?></td>
        <td><?php echo anchor("admin/control_crud_pengguna/ganti_password",'Ganti Password')?></td>
        
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
<hr>
<p>data member :</p>
<?php
    if(isset ($member)){
    foreach ($member as $member){
    
?>
<table>
    <tr>
        <td>Nomor Identitas</td>
        <td>:</td>
        <td><?php echo $member->id_pengguna?></td>
        <td><?php echo anchor("admin/control_crud_pengguna/show_form_edit_pengguna/$member->id_pengguna",'Update')?></td>
        <td><?php echo anchor("admin/control_crud_pengguna/delete_member/$member->id_pengguna",'Hapus')?></td>
        <td><?php echo anchor("admin/control_crud_pengguna/ganti_password",'Ganti Password')?></td>
    </tr>
    
    <tr>
        <td>Username</td>
        <td>:</td>
        <td><?php echo $member->nama?></td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $member->nama_asli?></td>
    </tr>

    <tr>
        <td>Password</td>
        <td>:</td>
        <td><?php echo $member->pass?></td>
    </tr>
    
    <tr>
        <td>email</td>
        <td>:</td>
        <td><?php echo $member->email?></td>
    </tr>
</table>

<?php
        }
    }
?>
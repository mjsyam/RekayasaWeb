<html>
    <head>
        <style type="text/css">@import url("<?php echo base_url() . 'include/CSS/loginmb.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/button.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/table.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSS/ribbons.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSS/layoutNew.css'; ?>");</style>
        <script type="text/javascript" src="<?php echo base_url(); ?>include/javascript/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#login-trigger').click(function(){
                    $(this).next('#login-content').slideToggle();
                    $(this).toggleClass('active');                                  
            
                    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                    else $(this).find('span').html('&#x25BC;')
                })
            });
        </script>
    </head>
    <body>
        <header class="cf">
            <?php echo $sambutan ?>
            <nav>
                <ul>      
                    <li id="login">
                        <a id="login-trigger" href="#">
                            <?php echo $this->session->flashdata('alert'); ?>Cart <span>&#x25BC</span>
                        </a>
                        <div id="login-content">  
                            <?php echo $this->load->view('member/view_cart'); ?>                     
                        </div>
                    </li>
                    <li id="signup">
                        <?php echo anchor('/login/logout', 'Logout'); ?>                
                    </li>
                </ul>
            </nav>
        </header>
        <div id="konten">                      
            <h1 class="left">Preorder KaosOblong</h1>
            <?php echo $this->load->view($main_view); ?>
        </div>
    <footer>
        <article>Develop and Desing By Gainza Mandarko Jimantoro and Syamsul Mujahidin</article>
    </footer>
    </body>
</html>





<!--<h1><?php echo $sambutan ?></h1>
<hr>

<style>
    #profile{
        background-color: rgba(121,121,21,0.8);
        width: 250px !important;
    }
</style>
<div id="profile">
    <table>
        <h3 align="center">Profile</h3>
        <tr>
            <td>1. <?php echo anchor("member/control_crud_member/lihat_daftar_pengguna", "My Profile"); ?></td>
        </tr>
        <tr>
            <td>2. <?php echo anchor("member/control_crud_member/ganti_password", "Change Password"); ?></td>
        </tr>
        <tr>
            <td>3. <?php echo anchor("/login/logout", 'Logout'); ?></td>
        </tr>
    </table>
</div>

<div id="profile">
    <table>
        <h3 align="center">Produk</h3>
        <tr>
            <td>1. <?php echo anchor("member/control_crud_produk/lihat_produk", "Go Shop"); ?></td>
        </tr>
        <tr>
            <td>2. <?php echo anchor("member/control_crud_produk/lihat_cart", "Cart"); ?></td>
        </tr>
        <tr>
            <td>3. <?php echo anchor("member/control_crud_produk/lihat_pesanan", 'Order'); ?></td>
        </tr>
    </table>
</div>-->
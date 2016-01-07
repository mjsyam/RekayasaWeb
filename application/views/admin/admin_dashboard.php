<html>
    <head>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/layout.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/button.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/formCSS.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSSA/table.css'; ?>");</style>
        <script type="text/javascript" src="<?php echo base_url(); ?>include/javascript/jquery.js"></script>
        <script>
            function initMenu() {
                $('#menu ul').hide(); 
                if ($('#menu li').has('ul')) $('#menu ul').prev().addClass('expandable'); 
                $('.expandable').click(
                function() {
                    $(this).next().slideToggle();
                    $(this).toggleClass('expanded');
                }
            );
            }
            $(document).ready(function() {
                initMenu();
            });
        </script>
        <title>Admin Rekweb</title>
    </head>
    <body>
        <header>
            <hgroup class="clearfix">
                <h1><a href="#">PreOrder <span>Kaos Oblong</span></a></h1>
            </hgroup>
        </header>
        <div id="main" class="clearfix">
            <aside>
                <nav>
                    <ul id="menu">
                        <li>
                            <a>Manajemen User</a>
                            <ul>
                                <li><?php echo anchor("admin/control_crud_pengguna/lihat_daftar_pengguna","My Profile"); ?></li>
                                <li><?php echo anchor("admin/control_crud_pengguna/ganti_password","Change Password"); ?></li>
                            </ul>
                        </li>
                        <li>
                            <a>Manajemen Barang</a>
                            <ul>
                                <li><?php echo anchor("admin/control_crud_produk/tambah_data_produk",'Add New Produk'); ?></li>
                                <li><?php echo anchor("admin/control_crud_produk/lihat_produk",'Produk'); ?></li>
                                <li><?php echo anchor("admin/control_crud_produk/lihat_pesanan",'Pesanan'); ?></li>
                            </ul>
                        </li>
                        <li><?php echo anchor("/login/logout",'Logout'); ?></li>
                    </ul>
                </nav>
            </aside>
            <div id="content">
                <article>
                    <section>   
                        <figure>
                            <?php echo $this->load->view($main_view);?>
                        </figure>
                    </section>
                </article>
            </div>
        </div>
        <footer>
            Depelov and Design By <a href="http://twitter/Syem_9">Syem</a> and <a>KOKO</a>
        </footer>
    </body>
</html>

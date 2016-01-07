<html>
    <head>
        <style type="text/css">@import url("<?php echo base_url().'include/CSS/layoutNew.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSS/ribbons.css'; ?>");</style>
        <style type="text/css">@import url("<?php echo base_url().'include/CSS/kotak.css'; ?>");</style>
        <script type="text/javascript" src="<?php echo base_url(); ?>include/javascript/jquery.js"></script>
        <title>Tugas Rekayasa Web</title>
    </head>
    <body>
            <?php echo $this->load->view('login/view_form_login'); ?>
        <div id="konten">                      
            <h1 class="left">Preorder KaosOblong</h1>
            <?php echo $this->load->view($main_view);?>
        </div>
    </body>
    <footer>
        <article>Develop and Desing By Gainza Mandarko Jimantoro and Syamsul Mujahidin</article>
    </footer>
</html>

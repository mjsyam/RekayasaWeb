<style type="text/css">@import url("<?php echo base_url() . 'include/CSS/transition.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'include/CSS/smartColumn.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url().  'include/CSS/button.css';?>");</style>
<script type="text/javascript" src="<?php echo base_url(); ?>include/javascript/jquery.js"></script>    
<script type="text/javascript">
    $(document).ready(function(){
        function smartColumns() {
            $("ul.column").css({ 'width' : "100%"});

            var colWrap = $("ul.column").width(); 
            var colNum = Math.floor(colWrap / 200); 
            var colFixed = Math.floor(colWrap / colNum); 

            $("ul.column").css({ 'width' : colWrap}); 
            $("ul.column li").css({ 'width' : colFixed}); 
        }	
        smartColumns();

        $(window).resize(function () { 
            smartColumns();
        });
    })
</script>
<ul class="column">
    <?php
        $quantity = array(
                    'name'        => 'quantity',
                    'maxlength'   => '3',
                    'size'        => '3',
                    );
        foreach ($produk as $value) {
            $harga = number_format($value->harga,0,",",".");
            echo "<li>   <div id='merek'>$value->nama_produk</div>
                         <div class='block'>
                            <img src=".base_url()."include/gambar/$value->gambar>
                            <span class='harga'>IDR $harga</span>
                         </div>";   
            echo form_open('member/control_crud_produk/masuk_cart');
            echo form_label('Quantity');
            echo " ".form_input($quantity);
            echo form_hidden('idprdk', $value->id_produk); 
            echo form_submit('submit','Beli', 'class="button"');
            echo form_close();
            echo "         </li>";
        }
    ?>
</ul>
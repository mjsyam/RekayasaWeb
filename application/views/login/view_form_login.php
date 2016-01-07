<style type="text/css">@import url("<?php echo base_url().'include/CSS/login.css'; ?>");</style>
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
<header class="cf">
    <nav>
        <ul>
            <li id="login">
                <a id="login-trigger" href="#">
                    Login <span>&#x25BC</span>
                </a>
                <div id="login-content">  
                    <fieldset id="inputs">   
                        <?php
                        echo form_open('login/control_crud_login');
                        $dataU = array('name' => 'usernamex',
                            'id' => 'username',
                            'placeholder' => 'Usernama');
                        echo form_input($dataU);
                        ?>                            
                        <?php
                        $dataP = array('name' => 'passwordx',
                            'id' => 'password',
                            'placeholder' => 'Password');
                        echo form_password($dataP);
                        ?>
                    </fieldset>
                    <fieldset id="actions">
                        <?php
                        $login = array('name' => 'submit',
                            'value' => 'Login',
                            'id' => 'submit');
                        echo form_submit($login);
                        
                        ?>
                    </fieldset>
                </div>
            </li>
            <li id="signup">
                <?php echo anchor('/login/register', 'Daftar'); ?>                
            </li>
        </ul>
    </nav>
</header>
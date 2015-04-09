<?php
$username = array('name' => 'username', 'id' => 'username', 'placeholder' => 'Anote su correo electrónico aquí');
$password = array('name' => 'password',	'id' => 'password', 'placeholder' => 'Anote su clave aquí');
$submit = array('name' => 'submit', 'id' => 'loginboton', 'content' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'onclick' => "loginUser();");
$form = array('id' => 'loginform');
?>
<?php include ("headeradmin.php") ;?>
<?php 
if($this->session->userdata('usuario')== TRUE){ ?>
<script src=<?php echo base_url().'script/mapadmin.js'?> ></script>

<?php  } ?>
<style>
.content-padding {
    margin: 0 auto;
    width: 95%;
}
#google_map {
    display: inline-table;
    width: 75%;
    margin-left: 225px;
}
.h1{margin-left: 150px}
.bienvenida{
    font-size: 32px;
    line-height: 29px;
    margin-left: 175px;
    position: absolute;
    text-align: center;
    width: 700px;
}

.favor > span {
    margin-left: 14px;
}
#publi-categorias {
    margin-top: 15px;
    position: absolute;
    width: 23%;
}
sanp {
    margin-left: 225px;
}
</style>

<div id="siteframe">
	<div id="content">
            <div class="content-padding">
             <?php 
                            if($this->session->userdata('usuario')== TRUE){ ?>
                <?php if($bienvenida == TRUE ){ ?>
                <h1 class="h1"> ¡Bienvenido a la comunidad Geovalores!</h1>
                <span class="bienvenida">Le invitamos a disfrutar de nuestros servicios en geolocalización de propiedades, navegue en nuestro mapa y 
                      encuentre oportunidades en una forma más ágil y sencilla.
                      Además mapee su anuncio en forma gratuita ahora!!!</span>
                            <?php } else { ?>
                <?php include_once('columnMenu.php') ;?>
                <sanp>Los iconos con el color verde son las publicaciones que me gustan </sanp></br>
                <sanp>Los iconos con el color amarillo son mis publicaciones</sanp>
                <div id="google_map"></div>
                            <?php }?>
             <?php } else {?>
                
                    
                        <div id="login-content">
                            <h1>Inicio de Sesión</h1>
                          <?=form_open('Login/new_user', $form)?>
                            <fieldset id="inputs">
                              <?=form_input($username)?><p><?=form_error('username')?>   
                              <?=form_password($password)?><p><?=form_error('password')?>
                            </fieldset>
                            <fieldset id="actions">
                              <?=  form_button($submit)?>
                              <a href="<?php echo base_url(); ?>index.php/Login/olvidoclave">Olvidó su clave</a>
                                <label><input type="hidden" name="dondeestoy" id="dondeestoy" value="<?php echo @$dondeestoy ?>" ></label>
                            </fieldset>
                          <?=form_close()?>
                        </div>                     
                      
             <?php } ?>
            </div>			
        </div>
</div>
<style>
    #siteframe {
    background: none repeat scroll 0 0 #f0f0f0;
    min-height: 450px;}
    .content-padding > #login-content {
    margin: 0 auto;
    width: 300px;
    
}
</style>

<?php include ("footer.php") ;?>
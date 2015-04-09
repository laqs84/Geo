<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <?php echo link_tag("css/reset.css");  ?>
    <?php echo link_tag("css/global.css");  ?>
    <?php echo link_tag("css/template.css");  ?>
    
    

    <script type="text/javascript" src="<?php echo base_url().'script/jquery-1.10.2.min.js' ?>"></script>
    
    <script src=<?php echo base_url().'script/login.js'?> ></script>
    
    
    
    <script type="text/javascript">
	$(document).ready(
	function () {
	$('#precio1').change(function() {
		var val = $(this).val();
            
       
        $('#spanvalue').text(val);});
	}
	);
	</script>
        
        <style>
            #login .inicida{
                color: #ffffff;
                display: inline-block;
                font-weight: bold;
                height: 25px;
                line-height: 25px;
                padding: 0 8px;
                text-decoration: none;
                
            }
            .inicida > a{
                color: #d16500;
                margin-left: 7px;
            }
            /* Submenu */

.mainmenu ul {

position:absolute;

left:-9999px;

top:-9999px;

list-style-type:none;

}



.mainmenu li:hover ul {

left:0px;

top:35px;

background:#33302f;

padding:0px;

}

 

.mainmenu li:hover ul li a {

padding:5px;

display:block;

width:109px;

text-indent:15px;

background-color:#33302f;

color: white;
}

.mainmenu li:hover ul li a:hover { background:#439a00; }
        </style>
</head>
<body>

<?php 
$logo = array(
          'src' => 'images/logo.png',
          'alt' => 'Logo de GeoValores',
          'class' => 'logo',
          
          'title' => 'Logo de GeoValores',
          
);


$username = array('name' => 'username', 'id' => 'username', 'placeholder' => 'Correo');
$password = array('name' => 'password',	'id' => 'password', 'placeholder' => 'Introduce tu password');
$submit = array('name' => 'submit', 'id' => 'loginboton', 'content' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'onclick' => "loginUser();");
$form = array('id' => 'loginform');
?>
<div id="headerframe">
	<div id="header">
            <nav>
                    <ul>
                      <?php if ($this->session->userdata('usuario_id')) {?>
                        <li id="login"> <span class="inicida"> En la sesion de  <a href="<?php echo base_url(); ?>index.php/Login/adminuser"?><?=$this->session->userdata('usuario_name');?> </a></span> </li> 
                        <li id="signup"><?=anchor(base_url().'index.php/Login/logout', 'Cerrar sesión'); ?></li>
                        <input type="hidden" name="dondeestoy" id="dondeestoy" value="<?php echo @$dondeestoy ?>" >
                      <?php } else { ?>
                      <li id="login">
                        <a id="login-trigger" href="#">
                          Inicio de sesion<span>▼</span>
                        </a>
                        <div id="login-content">
                          <?=form_open('Login/new_user', $form)?>
                            <fieldset id="inputs">
                              <?=form_input($username)?><p><?=form_error('username')?>   
                              <?=form_password($password)?><p><?=form_error('password')?>
                            </fieldset>
                            <fieldset id="actions">
                              <?=  form_button($submit)?>
                              <a href="<?php echo base_url(); ?>index.php/Login/olvidoclave">Olvidó su clave</a>
                                <label><input type="hidden" name="dondeestoy" id="dondeestoy" value="<?php echo @$dondeestoy ?>" ></label>
                                <label><input type="hidden" name="verporpiedad" id="verporpiedad" value="<?php echo @$verporpiedad ?>" ></label>
                            </fieldset>
                          <?=form_close()?>
                        </div>                     
                      </li>
                      <li id="signup">
                        <a href="<?php echo base_url(); ?>index.php/Register/register">Registrarse</a>
                      </li>
                      <?php } ?>
                    </ul>
                  </nav>
		<div id="header-logo">
			<a href="<?php echo base_url(); ?>index.php"><?php echo img($logo);?></a>
                </div>
		<!-- main nav -->
		<div id="mainnavigation">
			<div id="nav-gutter">
				<ul id="nav" class="mainmenu">
					<li class="mainmenu-item mainmenu-item-5346 <?php if ($dondeestoy == 'Inicio'){echo 'active';} ?>  first"><a href="<?php echo base_url(); ?>index.php"><span>Inicio</span></a></li>
					<li class="mainmenu-item mainmenu-item-5381 <?php if ($dondeestoy == 'compra'){echo 'active';} ?> "><a href="<?php  echo base_url(); ?>index.php/Publicadas/propiedades"><span>Todas las propiedades</span></a></li>
                                        <li class="mainmenu-item mainmenu-item-5441 <?php if ($dondeestoy == 'buscar'){echo 'active';} ?> "><a href="<?php echo base_url(); ?>index.php/Inicio/busquedaava"><span>Búsqueda</span></a></li>
                                        <li class="mainmenu-item mainmenu-item-5380 <?php if ($dondeestoy == 'Quienes Somos'){echo 'active';} ?>  "><a href="<?php echo base_url(); ?>index.php/Quienessomos/quienessomos"><span>Quienes Somos</span></a></li>
                                        <li class="mainmenu-item mainmenu-item-5384 <?php if ($dondeestoy == 'Favoritos'){echo 'active';} ?> last"><a href="<?php echo base_url(); ?>index.php/Inicio/favoritos"><span>Favoritos <span style="color: #E13300">❤</span></span></a>					
					<li class="mainmenu-item mainmenu-item-5382 <?php if ($dondeestoy == 'Contacto'){echo 'active';} ?> "><a href="<?php echo base_url(); ?>index.php/Contacto"><span>Contacto</span></a></li>
                                        
                                        <ul>

                                        <li><a href='<?php echo base_url(); ?>index.php/Inicio/favoritos#tabs-2'>Listado</a></li>

                                        <li><a href='<?php echo base_url(); ?>index.php/Inicio/favoritos'>Mapa</a></li>

                                        </ul>
                                        </li>
				</ul>
				<div style="clear: left"></div>
			</div>
		</div>
                <div id="responsive-nav-button" style="display: none">
			<div>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div id="responsive-navigation" style="display: none">
			<div class="padding">
				<ul id="responsive-nav" class="responsivemenu">
					<li class="responsivemenu-item responsivemenu-item-5346 active first"><a href="/"><span>Home</span></a></li>
					<li class="responsivemenu-item responsivemenu-item-5380  "><a href="/portfolio/"><span>Portfolio</span></a></li>
					<li class="responsivemenu-item responsivemenu-item-5381  "><a href="/packages/"><span>Packages</span></a></li>
					<li class="responsivemenu-item responsivemenu-item-5441  "><a href="/services/"><span>Services</span></a></li>
					<li class="responsivemenu-item responsivemenu-item-5357  "><a href="/about-us/"><span>About&nbsp;Us</span></a></li>
					<li class="responsivemenu-item responsivemenu-item-5382  last"><a href="/contact-us/"><span>Contact&nbsp;Us</span></a></li>
				</ul>
			</div>
		</div>
                <?php if ($this->session->userdata('usuario_id')) {?>
                <style>
                    #header .publicar {
                        margin-right: -265px;
                    }
                </style>
		<a class="publicar" href="<?php echo base_url(); ?>index.php/Publicar/construcciones">Mapee gratis su anuncio</a>
                <?php } else { ?>
                <a class="publicar" href="<?php echo base_url(); ?>index.php/Register/register">Mapee gratis su anuncio</a>
                <?php } ?>
	</div>
</div>
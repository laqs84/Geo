<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user = $this->session->userdata('usuariosuper_name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <?php echo link_tag("css/styles.css");  ?>
    <style>
        /* footer */
#footer { position: relative; color: #000; margin: 0 auto; padding: 10px 0 30px 0; font-size: .9em; line-height: 16px; text-align: left; max-width: 960px;}
#footer p { color: #000; margin: 0 auto; text-align: left; opacity: .6;}
#footer a:link, #footer a:visited {color: #000; text-decoration: none; font-weight: normal; opacity: .8;}
#footer a:hover { color: #000; text-decoration: none; opacity: 1;}
.grid_7 {
width: 56.333%;
}

.grid_4 > a {
    float: right;
    margin-top: 10px;
}
    </style>
    
<script type="text/javascript" src="<?php echo base_url().'script/jquery-1.10.2.min.js' ?>"></script>

</head>
<body>
<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
			 <h1 style="float: right;font-size: 13px;width: 150px;">Bienvenido, <?= $user; ?></h1><a class="button" href="#" ></a>
                        
                    </div>
                    <div class="grid_4">
                        <a href="" id="logout">
                        <?=anchor(base_url().'index.php/Administrador/logout', 'Cerrar sesión'); ?>
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li <?php if ($dondeestoy == 'Inicio'){echo 'id="current"';} ?> ><a href="<?php  echo base_url(); ?>index.php/administrador">Dashboard</a></li>
                                <li <?php if ($dondeestoy == 'Usuarios'){echo 'id="current"';} ?>><a href="<?php  echo base_url(); ?>index.php/administrador/usuarios">Usuarios</a></li>
                                <li <?php if ($dondeestoy == 'Publicaciones'){echo 'id="current"';} ?>><a href="<?php  echo base_url(); ?>index.php/administrador/propiedades">Propiedades</a></li>
                                <li <?php if ($dondeestoy == 'Visitas'){echo 'id="current"';} ?>><a href="<?php  echo base_url(); ?>index.php/administrador/visitas">Visitas</a></li>
                               
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        

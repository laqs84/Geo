<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <?php echo link_tag("css/reset.css"); ?>
        <?php echo link_tag("css/global.css"); ?>
        <?php echo link_tag("css/template.css"); ?>
        <?php echo link_tag("css/bootstrap.css"); ?>
        <?php echo link_tag("css/bootstrap-table.css"); ?>
        <?php echo link_tag("css/column_menu.css"); ?>

        <script type="text/javascript" src="<?php echo base_url() . 'script/jquery-1.10.2.min.js' ?>"></script>
        <script src=<?php echo base_url() . 'script/login.js' ?> ></script>


        <script src=<?php echo base_url() . 'script/ventas.js' ?> ></script>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'script/bootstrap-table.js' ?>"></script>
        <script>
            $(document).ready(function () {
                $("#popup").hide();
                $(".button").click(function () {
                    $(".popup").each(function () {
                        displaying = $(this).css("display");
                        if (displaying == "block") {
                            $(this).fadeOut('slow', function () {
                                $(this).css("display", "none");
                            });
                        } else {
                            $(this).fadeIn('slow', function () {
                                $(this).css("display", "block");
                            });
                        }
                    });
                });
            });
            $(document).ready(function () {
                $('#cssmenu li.has-sub>a').click(function () {
                    $(this).removeAttr('href');
                    var element = $(this).parent('li');
                    if (element.hasClass('open')) {
                        element.removeClass('open');
                        element.find('li').removeClass('open');
                        element.find('ul').slideUp();
                    }
                    else {
                        element.addClass('open');
                        element.children('ul').slideDown();
                        element.siblings('li').children('ul').slideUp();
                        element.siblings('li').removeClass('open');
                        element.siblings('li').find('li').removeClass('open');
                        element.siblings('li').find('ul').slideUp();
                    }
                });
            });

        </script>
        <script type='text/javascript'>
            var map = null;
            var infoWindow = null;

            function openInfoWindow(marker) {
                var markerLatLng = marker.getPosition();
                infoWindow.setContent([
                    '<strong>La posicion del marcador es:</strong><br/>',
                    markerLatLng.lat(),
                    ', ',
                    markerLatLng.lng(),
                    '<br/>Arrástrame para actualizar la posición.'
                ].join(''));
                $('#lng').val(markerLatLng.lng());
                $('#lat').val(markerLatLng.lat());
                infoWindow.open(map, marker);
            }

            function initialize() {
                var myLatlng = new google.maps.LatLng(9.633931465220899, -84.25418434999995);
                var myOptions = {
                    zoom: 8,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                map = new google.maps.Map($("#google_map").get(0), myOptions);

                infoWindow = new google.maps.InfoWindow();

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    draggable: true,
                    map: map,
                    title: "Aqui esta el marcador arrastrable"
                });
                google.maps.event.addListener(marker, 'dragend', function () {
                    openInfoWindow(marker);
                });
                google.maps.event.addListener(marker, 'click', function () {
                    openInfoWindow(marker);
                });
            }
<?php if ($dondeestoy == 'Publicar' || $dondeestoy == 'Publicaciones') { ?>
                $(document).ready(function () {
                    initialize();

                });
<?php } ?>
        </script>

        <style>
            form.info-venta > ul  > li > .images{ overflow:hidden; margin:0 auto 20px auto; width:590px; height:110px; }
            form.info-venta > ul  > li > .images > figure{ position:relative; float:left; margin-right:10px; width:104px; height:104px; border:3px solid #e5e5e5; }
            form.info-venta > ul  > li > .images > figure:last-child{ margin-right:0; }
            form.info-venta > ul  > li > .images > figure > img{ width:104px; height:104px; }
            form.info-venta > ul  > li > .images > figure > img.upload{ cursor:pointer; }
            form.info-venta > ul  > li > .images > figure > img.loading{ z-index:-1; }
            form.info-venta > ul  > li > .images > figure > img.preview{ z-index:-2; }

            #uploadImage, #myFrame{ display:none; }
            #moneda {
                width: 70px;
            }
            #header > .bienvenido > h1 {
                font-size: 32px;
                line-height: 32px;
                color: #ffffff;
            }
            #header > .bienvenido {
                float: right;
                text-align: right;
                width: 402px;
            }
            .button {
                float: right;
                margin-top: -45px;
            }
            
            .form-input {
                height: 40px;
            }
            .popup{
                background: none repeat scroll 0 0 #fff;
                border-radius: 3px 0 3px 3px;
                box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.9);
                display: none;
                padding: 15px;
                position: absolute;
                right: 0;
                top: 42px;
                z-index: 9999;
            }
            #mainnavigation ul#nav, #mainnavigation ul#nav > li {
               margin: -4px -8px 0 11px;
            }
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
$configuracion = array(
    'src' => 'images/config.png',
    'alt' => 'Logo de GeoValores',
    'class' => '',
    'title' => 'Mi perfil',
);
?>
        <div id="headerframe">
            <div id="header">

                <div id="header-logo">
                    <a href="<?php echo base_url(); ?>index.php"><?php echo img($logo); ?></a>
                </div>
                <div class="bienvenido">
<?php
$user = $this->session->userdata('usuario_name');
if ($this->session->userdata('usuario') == TRUE) {
    ?>
                        <h1 style="text-align: center">Bienvenido, <?= $user; ?></h1><a class="button" href="#" ><?php echo img($configuracion); ?></a>
                        <div class="popup">
                            <a href="<?php echo base_url(); ?>index.php/Register/perfil">Mi perfil</a><br>
                        <?= anchor(base_url() . 'index.php/Login/logout', 'Cerrar sesión'); ?>

                        </div>           
                        <?php } ?>		
                </div>

                <!-- main nav -->
                <div id="mainnavigation">
                    <div id="nav-gutter">
<?php if ($this->session->userdata('usuario') == TRUE) { ?>
                            <ul id="nav" class="mainmenu">
                                <li class="mainmenu-item mainmenu-item-5346 <?php if ($dondeestoy == 'admin') {
        echo 'active';
    } ?>  first"><a href="<?php echo base_url(); ?>index.php/Login/adminuser"><span>Inicio</span></a></li>

                                <li class="mainmenu-item mainmenu-item-5381 <?php if ($dondeestoy == 'Publicaciones') {
                            echo 'active';
                        } ?>  "><a href="<?php echo base_url(); ?>index.php/Publicadas/publicacion"><span>Mis Publicaciones</span></a></li>
                                <li class="mainmenu-item mainmenu-item-5381 <?php if ($dondeestoy == 'Favoritos') {
                            echo 'active';
                        } ?>  "><a href="<?php echo base_url(); ?>index.php/Publicadas/favorito"><span>Mis Favoritos</span></a></li>
                                <li class="mainmenu-item mainmenu-item-5441 <?php if ($dondeestoy == 'Publicar') {
                            echo 'active';
                        } ?>  "><a href="<?php echo base_url(); ?>index.php/Publicar/construcciones"><span>Mapee Su Anuncio</span></a></li>

                            </ul>
<?php } ?>
                        <div style="clear: left"></div>
                    </div>
                </div>

            </div>
        </div>
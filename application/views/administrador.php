<?php include ("headeradministrador.php") ;

$visitas = array(
          'src' => 'images/visitas.gif',
          'alt' => 'Visitas de GeoValores',
          'class' => '',
          
          'title' => 'Visitas de GeoValores',
          
);
$usuarios = array(
          'src' => 'images/usuarios.gif',
          'alt' => 'Usuarios de GeoValores',
          'class' => '',
          
          'title' => 'Usuarios de GeoValores',
          
);
$casa = array(
          'src' => 'images/casa.png',
          'alt' => 'Propiedades de GeoValores',
          'class' => '',
          
          'title' => 'Propiedades de GeoValores',
          
);


?>

<div id="siteframe">
	<div id="content">
            <div class="content-padding">
              <div class="grid_7">
            	<a href="" class="dashboard-module">
                	<?php echo img($usuarios);?>
                	<span>Usuarios</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<?php echo img($casa);?>
                	<span>Popiedades</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<?php echo img($visitas);?>
                	<span>Visitas</span>
                </a>
                
                
                <div style="clear: both"></div>
            </div>  
            </div>
        </div>
</div>
 <?php include ("footeradministrador.php") ;?>
<?php include_once('headeradmin.php') ;

$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
    
   
    
?>

<script src="//code.jquery.com/jquery-latest.min.js"></script>

<script src=<?php echo base_url().'script/bjqs-1.3.min.js' ?>></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
$(document).ready(function() {
   
                initialize();
               $('.banner').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 3000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: false              //  Support responsive design. May break non-responsive designs
});
            }); 

</script>
<style>

.imagenes {
    height: 300px;
    width: 100%;
}
.usercontacto {
    border: 2px solid;
    height: 281px;
    margin-bottom: 45px;
    margin-left: 520px;
    margin-top: -303px;
    padding-left: 32px;
    padding-top: 25px;
    width: 43.5%;
}
.specs-property  {
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    margin-bottom: 15px;
    margin-top: 15px;
    padding-bottom: 5px;
}
.description {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: justify;
}
.usercontacto > label {
    font-size: 24px;
    margin-left: 100px;
}
.usercontacto > div {
    margin-bottom: 20px;
    margin-left: 155px;
    margin-top: 20px;
}
#publi-detalles label {
    font-size: 20px;
}
.favorita {
    margin-left: 460px;
    margin-top: 10px;
    position: absolute;
    z-index: 999;
}
@-moz-document url-prefix() {
    
    
.favorita {
    margin-left: 422px;
    margin-top: 310px;
    position: absolute;
    z-index: 999;
}

}
.banner { position: relative; overflow: auto; width: 450px; height: 382px;}
    .banner li { list-style: none; }
        .banner ul li { float: left; }
        
.notification-message {
  background: #efc;
  border-color: #cd7;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  padding: 20px 20px 20px 100px;
  margin-bottom: 20px;
  position: relative;
  min-height: 50px;
  width: 84.5%;
  margin-left: 25px ;
}
#publi-detalles {
  width: auto;
}
.box-publicar {
  display: block;
}
.editardiv {
  margin: 20px auto;
  text-align: center;
  width: 84.5%;
}
#posting {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background: #f70;
  
  
  border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  border-style: solid;
  
  color: #fff;
  padding: 15px 15px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
  
  font-weight: bold;
  line-height: 1;
}
</style>

<div id="siteframe">
    <div id="content">
        <div class="content-padding">
           
<aside id="notification-message" class="notification-message icons icon-time">
<h4>Bien hecho! Tu anuncio ha sido creado con éxito.</h4>
<p>Si es publicado, recibirás un email de confirmación con el link a tu anuncio.</p>

</aside>
            <div class="editardiv"><a href="<?php echo base_url(); ?>index.php/Publicadas/editar/<?php echo $idpublicacion?>" class="btn btn-default btn-lg active" role="button">Editar tu anuncio</a> o <a href="<?php echo base_url(); ?>index.php/Publicar/construcciones" rel="nofollow" class="posting " role="button" data-qa="post-button" data-increment="true" data-increment-category="dgd" data-increment-action="home" id="posting">Publica un anuncio gratis</a></div> 
            <div class="box-publicar" id="publi-detalles">
               
                
                <?php $tipoPublicacion = "";
                	$c = 0 ;
                	$map = true;
                ?>	
                
               
                
                       
                       <div class="banner">     
                <ul class="bjqs">
                                      
                        <?php foreach ($publicacion as $value ){
                        if($value['field_name'] == "imagen1" && $value['field_value'] != ''){ 
                        $imagen1 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 1',
                                'class' => 'imagenes',
                                'id' => 'imagen1',
                                'title' => 'Su imagen 1',

                      );    
                        ?>
                                
                                <li><?php echo img(@$imagen1);?></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen2" && $value['field_value'] != ''){ 
                        $imagen2 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 2',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 2',

                      );    
                        ?>
                    		
                                <li><?php echo img(@$imagen2);?>  </li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen3" && $value['field_value'] != ''){ 
                        $imagen3 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 3',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 3',

                      );    
                        ?>
                    		
                                <li><?php echo img(@$imagen3);?>  </li>
                    	<?php } ?> 
                        <?php if($value['field_name'] == "imagen4" && $value['field_value'] != ''){ 
                        $imagen4 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 4',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 4',

                      );    
                        ?>
                    		
                                    <li><?php echo img(@$imagen4);?>  </li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen5" && $value['field_value'] != ''){ 
                        $imagen5 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 5',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 5',

                      );    
                        ?>
                                    <li><?php echo img(@$imagen5);?> </li>
                                  
                    	<?php } }?>
                       
                             </ul>
                       </div>
                
                <div class="usercontacto">
                        <label>Nombre del vendedor</label>
                        <div><?php echo $usercontacto[0]['nombre'].' '.$usercontacto[0]['apellidos'] ?></div>
                        <label>Correo del vendedor</label>
                        <div><a href="mailito:<?php echo $usercontacto[0]['correo'] ?>"><?php echo $usercontacto[0]['correo'] ?></a></div>
                        <label>Telefono del vendedor</label>
                        <div><?php echo $usercontacto[0]['telefono']?></div>
                </div>
                        <?php 
                	 foreach ($publicacion as $value ){?>
                	
                	
                	<?php if (!empty($value['field_name'])) { ?>
                	 
                    	<?php if($value['field_name'] == "name"){ ?>
                    		<div><label>Titulo</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
                    	<?php } ?>
                         
                         <?php if($value['field_name'] == "tipo-construccion"){ ?>
                    		<div><label>Tipo Construccion</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-dolar" && !empty($value['field_value'])){ ?>
                    		<div><label>Precio Dolares</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-colones" && !empty($value['field_value'])){ ?>
                    		<div><label>Precio Colones</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
                        	
						 <?php } ?>
                         <?php if($value['field_name'] == "lat"){ ?>
                        	
						 	
                        	
	                            <?php $lat = $value['field_value']; ?>
	                         
	                      <?php } ?>
	                     <?php if($value['field_name'] == "lng"){ ?>
	                     		
	                            	<?php $lng = $value['field_value']; ?>
	                       
	                      <?php } ?>
                        <?php if($value['field_name'] == "address"){ ?>
                    		<div><label>Direccion</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
                        
                        <?php if(($value['field_name'] == "tamano-terreno" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<div><label>Tamaño del Terreno</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "tamano-terreno" ){ ?>
	                            	<?php echo $value['field_value']; ?>
	                           	<?php } ?>
	                            <?php if($value['field_name'] == "tipe-tamano-terreno"){ ?>
		                            <?php echo $value['field_value']; ?>
		                        <?php } ?>
	                        </div>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="alquileres"){?>
                        <?php if(($value['field_name'] == "tamano-contruccion" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<div><label>Tamaño Construcción</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "tamano-contruccion" ){ ?>
	                            	<?php echo $value['field_value']; ?>
	                           	 <?php } ?>
	                            <?php if( $value['field_name'] == "metro-cuadrado"){ ?> 
		                            <?php echo $value['field_value']; ?>
		                        <?php } ?>
	                        </div>
						 <?php } ?>
						 <?php } ?>
                       	<?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
	                        <?php if($value['field_name'] == "edad-contruccion"){ ?>
	                    		<div><label>Edad De la Contruccion</label></div>
	                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
							 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "tamano-frente"){ ?>
                    		<div><label>Tamaño del Frente</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" ){?>
                        <?php if($value['field_name'] == "cantidad-pisos"){ ?>
                    		<div><label>Cantidad de Pisos</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cantidad-cuartos"){ ?>
                    		<div><label>Cantidad Cuartos</label></div>
	                        <div class="specs-property">
	                           <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "closet"){ ?>
                    		<div><label>Closet</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
						 <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if(($value['field_name'] == "cantidad-banos" || $value['field_name'] == "tipo-bano")){ ?>
                    		<div><label>Baños</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "cantidad-banos"){ ?>
	                            <?php echo $value['field_value']; ?>
	                            
	                            <?php } ?>
	                            <?php if($value['field_name'] == "tipo-bano"){ ?>
	                            <?php echo $value['field_value']; ?>
	                            <?php } ?>
	                        </div>
						 <?php } ?>
                        <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cochera"){ ?>
                    		<div><label>Cochera</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
                        <?php }?>
                        <?php if($value['field_name'] == "cantidad-carros"){ ?>
                    		<div class="cant-carros"><label>Cantidad de Carros</label></div>
	                        <div class="cant-carros specs-property" >
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "cuarto-lavado"){ ?>
                    		<div><label>Cuarto de Lavado</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						<?php if($value['field_name'] == "porton-electrico"){ ?>
                    		<div><label>Porton Eléctrico</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "acondicionado"){ ?>
                    		<div><label>Aire Acondicionado</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "jardin"){ ?>
                    		<div><label>Jardin</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
						 <?php } ?>
						 <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						 <?php if($value['field_name'] == "bodega"){ ?>
                    		<div><label>Bodega</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                       	<?php } ?>
                       	
                     	<?php if($tipoPublicacion ==="terreno" || $tipoPublicacion !=="alquileres" ){?>
					 	<?php if($value['field_name'] == "topografia"){ ?>
                       	<div><label>Topografia</label></div>
                        <div class="specs-property"><?php echo $value['field_value']; ?>
                        </div>
                       	<?php } ?>
                       	<?php } ?>
                       	
                        <?php if($value['field_name'] == "observacion"){ ?>
                    		<div><label>Observaciones</label></div>
                                <div class="description">
	                           <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                    <?php $c +=1; } ?>
                    		<?php if(!empty($value['tipo_categoria']) ){ ?>
                                
                                
                    		  
                    	<?php  $tipoPublicacion = $value['tipo_categoria']; } ?>
                          
           
	                    		
		                        
	                        
						 
		<?php }?>
                    <script type='text/javascript'>
            var map = null;
            var infoWindow = null;
            
            <?php if(!empty($lat)) {?>
               var lat = <?php echo @$lat; ?>;
             
            <?php }?>
                 <?php if(!empty($lng)) {?>
               var lng =  <?php echo @$lng; ?>;
                         <?php }?>
            function initialize() {
                var myLatlng = new google.maps.LatLng(lat, lng);
                var myOptions = {
                  zoom: 8,
                  center: myLatlng,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                map = new google.maps.Map($("#google_map").get(0), myOptions);

                infoWindow = new google.maps.InfoWindow();

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    draggable: false,
                    map: map,
                    title:"Aqui esta"
                });
                    
            }
            </script>
                   <div>
                        <div class="local-map">
                            <div id="google_map"></div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>


<?php include_once('footer.php') ;?>
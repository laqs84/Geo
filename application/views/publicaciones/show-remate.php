<?php include_once('/../header.php') ;?>

<?php echo link_tag("css/jquery.bxslider.css");  ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
$(document).ready(function() {
                initialize();
                $('.bxslider').bxSlider();
            }); 
 function nouser(){
     alert('Usted no esta con una sesion activa');
     return false;
 }           
function agregar(iduser, idpublicacion){
	
	
		
		$.ajax({
	            type:'POST',
	            url: '../agregarfavorito',
                    dataType		: 'json',
	            data:{
	                data:iduser,
                        data1:idpublicacion
	            },
			success		: function (data)
			{
				
				if (data.status === "success")
				{
					alert(data.msg);
                                        location.reload();
				}
				else
				{
					alert(data.msg);
				}
			}
		});
	
        }
function deletefavorito2(id){
	
	if (confirm('¿Seguro que quieres eliminar esta propiedad en sus favoritos?'))
	{
		
		$.ajax({
	            type:'POST',
	            url: '../deletefavorito',
                    dataType		: 'json',
	            data:{
	                data:id
	            },
			success		: function (data)
			{
				
				if (data.status === "success")
				{
					alert(data.msg);
                                        location.reload();
				}
				else
				{
					alert(data.msg);
				}
			}
		});
	}
        }
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
    margin-top: 25px;
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
    margin-left: -60px;
    margin-top: 10px;
    position: absolute;
    z-index: 999;
}
}
</style>

<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
            
            <div class="box-publicar" id="publi-detalles">
               
                    
                    	<?php $map = true;
                   
                        if(empty($favorita)){ 
                        $imafavorita = array(
                                'src' => 'images/gusta.png',
                                'alt' => 'No esta en mis favoritos',
                                'class' => 'favorita',
                                'id' => 'noesta',
                                'title' => 'No esta en mis favoritos'

                      );    
                        $idUsuario =  $this->session->userdata('idUsuario');
                        if(empty($idUsuario))
                            {
                            $funcion = "nouser();return false;";
                            }
                            else{
                                $funcion = "agregar(".$idUsuario.", ".$idpublicacion.");return false;"; 
                                
                            }
                        ?>
                        <?php echo '<a href="" onclick="'.$funcion.'">'.img($imafavorita).'</a>';  }
                        else {
                                $imafavorita = array(
                                'src' => 'images/nogusta.png',
                                'alt' => 'Esta en mis favoritos',
                                'class' => 'favorita',
                                'id' => 'esta',
                                'title' => 'Esta en mis favoritos'

                      );    
                        ?>
                        <?php echo '<a href="" onclick="deletefavorito2('.$favorita[0]['idMarcadas'].');return false;">'.img($imafavorita).'</a>'; }?>
                             <ul class="bxslider">
                                      
                        <?php foreach ($publicacion as $value ){
                        if(@$value['field_name'] == "imagen1" && $value['field_value'] != ''){ 
                        $imagen1 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 1',
                                'class' => 'imagenes',
                                'id' => 'imagen1',
                                'title' => 'Su imagen 1',

                      );    
                        ?>
                                
                                <div><?php echo img($imagen1);?></div>
                    	<?php } ?>
                        <?php if(@$value['field_name'] == "imagen2" && $value['field_value'] != ''){ 
                        $imagen2 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 2',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 2',

                      );    
                        ?>
                    		
                                <div><?php echo img($imagen2);?>  </div>
                    	<?php } ?>
                        <?php if(@$value['field_name'] == "imagen3" && $value['field_value'] != ''){ 
                        $imagen3 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 3',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 3',

                      );    
                        ?>
                    		
                                <div><?php echo img($imagen3);?>  </div>
                    	<?php } ?> 
                        <?php if(@$value['field_name'] == "imagen4" && $value['field_value'] != ''){ 
                        $imagen4 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 4',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 4',

                      );    
                        ?>
                    		
                                    <div><?php echo img($imagen4);?>  </div>
                    	<?php } ?>
                        <?php if(@$value['field_name'] == "imagen5" && $value['field_value'] != ''){ 
                        $imagen5 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 5',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 5',

                      );    
                        ?>
                                    <div><?php echo img($imagen5);?> </div>
                                  
                    	<?php } }?>
                       
                             </ul>
                <div class="usercontacto">
                        <label>Nombre del vendedor</label>
                        <div><?php echo $usercontacto[0]['nombre'].' '.$usercontacto[0]['apellidos'] ?></div>
                        <label>Correo del vendedor</label>
                        <div><a href="mailito:<?php echo $usercontacto[0]['correo'] ?>"><?php echo $usercontacto[0]['correo'] ?></a></div>
                        <label>Telefono del vendedor</label>
                        <div><?php echo $usercontacto[0]['telefono']?></div>
                </div>
                    	 <?php foreach ($publicacion as $value ){
                    	?>
                        <?php if(@$value['field_name'] == "name"){ ?>
	                        <div><label>Titulo</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
                        <?php }?>
                        
                        <?php if(@$value['field_name'] == "tiempo"){ ?>
	                         <div><label>Tiempo de la Publicacion</label></div>
	                       <div class="specs-property"><?php echo $value['field_value']; ?></div>
                        <?php }?>
                        <?php if(@$value['field_name'] == "tipo-Terreno"){ ?>
	                        <div><label>Tipo Remate</label></div>
	                        <div class="specs-property">
	                          <?php echo $value['field_value'] ?>
	                        </div>
                        <?php }?>
                        <?php if(@$value['field_name'] == "numero-expediente"){ ?>
	                        <div><label>Número Expediente</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
                        <?php }?>
                        <?php if(@$value['field_name'] == "precio-remate"){ ?>
	                        <div><label>Precio Remate</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
	                        
                        <?php }?>
                        
                        	<?php if(@$value['field_name'] == "lat"){ ?>
                        	
						 	
                        	
	                            <?php $lat = $value['field_value']; ?>
	                         
	                      <?php } ?>
	                     <?php if(@$value['field_name'] == "lng"){ ?>
	                     		
	                            	<?php $lng = $value['field_value']; ?>
	                       
	                      <?php } ?>
                        
                        <?php if(@$value['field_name'] == "address"){ ?>
	                        <div><label>Direccion</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
                        <?php }?>
                       
	                        
	                        <div>
	                        	<?php if(@$value['field_name'] == "tamano-propiedad" ){ ?>
	                        		<div><label>Tamaño de la Propiedad</label></div>
	                            	<div class="specs-property"><?php echo $value['field_value']; ?></div>
                                
	                            <?php }?>
	                            <?php if( @$value['field_name'] == "tipe-tamano-terreno"){ ?> 
		                           <div class="specs-property"><?php echo $value['field_value']; ?></div>
	                            <?php }?>
	                        </div>
                     
                        <?php if(@$value['field_name'] == "lugar-remate"){ ?>
	                        <div><label>Lugar del Remate</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
	                    <?php }?>
                        <?php if(@$value['field_name'] == "fecha-remate"){ ?>
	                        <div><label>Fecha del Remate</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
	                    <?php }?>
                        <?php if(@$value['field_name'] == "observacion"){ ?>
	                        <div><label>Observaciones</label></div>
	                        <div class="description">
	                           <?php echo $value['field_value'] ?>
	                        </div>
                        <?php }
                        	
                        ?>
                        
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

<?php include_once('/../footer.php') ;?>
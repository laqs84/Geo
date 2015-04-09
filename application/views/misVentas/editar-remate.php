<?php include_once('/../headeradmin.php') ;?>
<style>
    
.imagenes {
    height: 75px;
    display: inline-block;
}

.imagen2 {
    color: red;
    font-size: 18px;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
}

.imagen3 {
    color: red;
    font-size: 18px;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
}

.imagen4 {
    color: red;
    font-size: 18px;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
}

.imagen5 {
    color: red;
    font-size: 18px;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
}
form.info-venta > ul > li  > .images{ overflow:hidden; margin:0 auto 20px auto; width:590px; height:110px; }
form.info-venta > ul > li   >  .images > figure{ position:relative; float:left; margin-right:10px; width:104px; height:104px; border:3px solid #e5e5e5; }
form.info-venta > ul > li  >  .images > figure:last-child{ margin-right:0; }
form.info-venta > ul > li  >  .images > figure > img{ width:104px; height:104px; }
form.info-venta > ul > li >  .images > figure > img.upload{ cursor:pointer; }
form.info-venta > ul > li  >  .images > figure > img.loading{ z-index:-1; }
form.info-venta > ul  > li  >  .images > figure > img.preview{ z-index:-2; }

#uploadImage, #myFrame{ display:none; }
</style>


<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
            <?php include_once('/../columnMenu.php') ;?>
            <div class="box-publicar" id="publi-detalles">
                <form name="info-venta" class="info-venta">
                    <ul>
                    	<?php $map = true;
                    	 foreach ($publicacion as $value ){?>
                    	 <?php if (!empty($value['field_name'])) { ?>
                        <?php if($value['field_name'] == "name"){ ?>
	                        <li><label>Titulo</label></li>
	                        <li><input type="text" name="name" id="name" value="<?= $value['field_value']?>" required></li>
                        <?php }?>
                	
                	
                	
                        <?php if($value['field_name'] == "imagen1" && $value['field_value'] != ''){ 
                        $imagen1 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 1',
                                'class' => 'imagenes',
                                'id' => 'imagen1',
                                'title' => 'Su imagen 1',

                      );    
                        ?>
                                <li class=""><label>Fotos</label></li>
                                <li class="imagenes imagen1"><?php echo img($imagen1);?></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen2" && $value['field_value'] != ''){ 
                        $imagen2 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 2',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 2',

                      );    
                        ?>
                    		
                                <li class="imagenes"><?php echo img($imagen2);?>  <a class="imagen2"  onclick="deleteimage(<?php echo $value['idField']; ?>)">x</a></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen3" && $value['field_value'] != ''){ 
                        $imagen3 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 3',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 3',

                      );    
                        ?>
                    		
                                <li class="imagenes"><?php echo img($imagen3);?>  <a class="imagen3"  onclick="deleteimage(<?php echo $value['idField']; ?>)">x</a></li>
                    	<?php } ?> 
                        <?php if($value['field_name'] == "imagen4"  && $value['field_value'] != ''){ 
                        $imagen4 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 4',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 4',

                      );    
                        ?>
                    		
                                <li class="imagenes"><?php echo img($imagen4);?>  <a class="imagen4"  onclick="deleteimage(<?php echo $value['idField']; ?>)">x</a></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen5" && $value['field_value'] != ''){ 
                        $imagen5 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 5',
                                'class' => '',

                                'title' => 'Su imagen 5',

                      );    
                        ?>
                    		
                                <li><?php echo img($imagen5);?> <a class="imagen5"  onclick="deleteimage(<?php echo $value['idField']; ?>)">x</a></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "tiempo"){ ?>
	                         <li><label>Tiempo de la Publicacion</label></li>
	                        <li>
	                            <select name="tiempo" id="tiempo">
	                                <optgroup>
	                                    <option value="1mes">1 Mes</option>
	                                    <option value="2meses">2 Meses</option>
	                                </optgroup>
	                            </select>
	                        </li>
                        <?php }?>
                        <?php if($value['field_name'] == "tipo-Terreno"){ ?>
	                        <li><label>Tipo Remate</label></li>
	                        <li>
	                            <select name="tipo-Terreno" id="tipo-Terreno">
	                                <optgroup>
	                                    <option value="casa" <?php if($value['field_value']== "casa") echo 'selected="selected"';?> >Casa</option>
	                                    <option value="apartamento"<?php if($value['field_value']== "Casa") echo 'selected="selected"'; ?>>Apartamentos</option>
	                                    <option value="terreno" <?php if($value['field_value']== "Casa") echo 'selected="selected"'; ?>>Terreno</option>
	                                </optgroup>
	                            </select>
	                        </li>
                        <?php }?>
                        <?php if($value['field_name'] == "numero-expediente"){ ?>
	                        <li><label>Número Expediente</label></li>
	                        <li><input type="text" name="numero-expediente" id="numero-expediente" value="<?= $value['field_value']?>" required></li>
                        <?php }?>
                        <?php if($value['field_name'] == "precio-remate"){ ?>
	                        <li><label>Precio Remate</label></li>
	                        <li><input type="text" name="precio-remate" id="precio-remate" value="<?= $value['field_value']?>" class="numbersOnly"></li>
	                        <li style="display: none;"><input type="text" name="precio-old" id="precio-remate-old" value="<?= $value['field_value']?>" class="numbersOnly"></li>	                        
                        <?php }?>
                         <?php if($value['field_name'] == "lat"){ ?>
                        <?php $lat = $value['field_value']; ?>
                        	  
	                      <?php } ?>
	                     <?php if($value['field_name'] == "lng"){ ?>
	                     		<?php $lng = $value['field_value']; ?>
                                        
	                      <?php } ?>
                        
                        <?php if($value['field_name'] == "address"){ ?>
	                        <li><label>Direccion</label></li>
	                        <li><select name="address" id="address"  style="">
	                             <option value="San Jose" <?php if($value['field_value']== "San Jose") echo 'selected="selected"'; ?>>San José</option>
	                            <option value="Alajuela" <?php if($value['field_value']== "Alajuela") echo 'selected="selected"'; ?>>Alajuela</option>
	                            <option value="Cartago" <?php if($value['field_value']== "Cartago") echo 'selected="selected"'; ?>>Cartago</option>
	                            <option value="Guanacaste" <?php if($value['field_value']== "Guanacaste") echo 'selected="selected"'; ?>>Guanacaste</option>
	                            <option value="Heredia" <?php if($value['field_value']== "Heredia") echo 'selected="selected"'; ?>>Heredia</option>
	                            <option value="Puntarenas" <?php if($value['field_value']== "Puntarenas") echo 'selected="selected"'; ?>>Puntarenas</option>
	                            <option value="Limon" <?php if($value['field_value']== "Limon") echo 'selected="selected"'; ?>>Limón</option>
	                        </select>
                                <?php if($value['field_name'] == "exacta"){ ?>
                                    <input style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="exacta" id="exacta" value="<?php echo $value['field_value']; ?>" class="form-input">
                                <?php } ?>
                                </li>
                        <?php }?>
                        <?php if($value['field_name'] == "tamano-propiedad" || $value['field_name'] == "tipe-tamano-terreno"){ ?>
	                        
	                        <li>
	                        	<?php if($value['field_name'] == "tamano-propiedad" ){ ?>
	                        		<li><label>Tamaño Propiedad</label></li>
	                            	<input type="text" name="tamano-propiedad" id="tamano-propiedad" value="<?= $value['field_value'] ?>" class="numbersOnly">
	                            <?php }?>
	                            <?php if( $value['field_name'] == "tipe-tamano-terreno"){ ?> 
		                            <select name="tipe-tamano-terreno" id="tipe-tamano-terreno">
		                                <optgroup>
		                                    <option value="metro-cuadrado" selected>m²</option>
		                                    <option value="pie">Pie</option>
		                                </optgroup>
		                            </select>
	                            <?php }?>
	                        </li>
                        <?php }?>
                        <?php if($value['field_name'] == "lugar-remate"){ ?>
	                        <li><label>Lugar del Remate</label></li>
	                        <li><input type="text" name="lugar-remate" id="lugar-remate" value="<?= $value['field_value']?>" required></li>
	                    <?php }?>
                        <?php if($value['field_name'] == "fecha-remate"){ ?>
	                        <li><label>Fecha del Remate</label></li>
	                        <li><input type="datetime" name="fecha-remate" id="fecha-remate" value="<?= $value['field_value']?>" required></li>
	                    <?php }?>
                        <?php if($value['field_name'] == "observacion"){ ?>
	                        <li><label>Observaciones</label></li>
	                        <li>
	                            <textarea rows="5" name="observacion" id="observacion"> <?= $value['field_value']?></textarea>
	                        </li>
                        <?php }
                        	}
                        ?>
                        <?php if(!empty($value['tipo_categoria']) ){ ?>
                    		 <li><input type="text" name="tipo_categoria" id="tipo_categoria" value="<?= $value['tipo_categoria']?>" style="display: none;" ></li>
                    		 <li><input type="text" name="idPublicacion" id="idPublicacion" value="<?= $value['idPublicacion']?>" style="display: none;" ></li>
                    		 <li><input type="text" name="count" id="count" value="<?= $count?>" style="display: none;" ></li> 
                    	<?php }?>
                        <?php }?>
                         <li>
                    <div class="images">
                            <?php if ($count == 1) {?>
                                        <figure>
						<img class="upload" id="2" alt="Cargar imagen" src="<?php echo base_url()?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                        <figure>
						<img class="upload" id="3" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                        <figure>
						<img class="upload" id="4" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                  
                                        <figure>
						<img class="upload" id="5" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                       
                        <?php }?>
					
                                 <?php if ($count == 4) {?>       
                                        <figure>
						<img class="upload" id="5" alt="Cargar imagen" src="<?php echo base_url()?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                 <?php }?> 
                                 <?php if ($count == 3) {?>  
                                        <figure>
						<img class="upload" id="4" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                  
                                        <figure>
						<img class="upload" id="5" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                <?php }?> 
                                <?php if ($count == 2) {?> 
                                        <figure>
						<img class="upload" id="3" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                        <figure>
						<img class="upload" id="4" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                  
                                        <figure>
						<img class="upload" id="5" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
                                <?php }?>
                        
				</div>
                                </li>
                            <input type="hidden" id="imagen2" name="imagen2" />
                            <input type="hidden" id="imagen3" name="imagen3" />
                            <input type="hidden" id="imagen4" name="imagen4" />
                            <input type="hidden" id="imagen5" name="imagen5" />
                                <li><label>Latitud</label></li>
                                <li>
	                            <input type="text" name="lat" id="lat" value="<?= $lat ?>" class="numbersOnly"/>
	                        </li> 
                                <li><label>Longuitud</label></li>
	                     		<li>
	                            	<input type="text" name="lng" id="lng" value="<?= $lng ?>" class="numbersOnly"/>
	                        </li>
                                </ul>
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
                    draggable: true,
                    map: map,
                    title:"Aqui esta"
                });
                     google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
                    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
            }
            </script>
                   <div>
                        <div class="local-map">
                            <div id="google_map"></div>
                        </div>
                    </div>
                    <div id="btn-save-info">
                    <input type="submit" name="submit" value="Guardar" id="submit" />
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>

<?php include_once('/../footer.php') ;?>
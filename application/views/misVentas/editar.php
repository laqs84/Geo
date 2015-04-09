<?php include_once('/../headeradmin.php') ;?>
<?php

// Desactivar toda notificación de error
error_reporting(0);

// Notificar solamente errores de ejecución


?>
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
                <form enctype="multipart/form-data" name="info-venta" class="info-venta">
                <ul>
                <?php $tipoPublicacion = "";
                	$c = 0 ;
                	$map = true;
                	
                	 foreach ($publicacion as $value ){?>
                	
                	
                	<?php if (!empty($value['field_name'])) { ?>
                	 
                    	<?php if($value['field_name'] == "name"){ ?>
                    		<li><label>Titulo</label></li>
                        	<li><input type="text" name="name" id="name" value="<?= $value['field_value']?>" required></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen1" && $value['field_value'] != ''){ 
                        $imagen1 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 1',
                                'class' => 'imagenes',
                                'id' => 'imagen1',
                                'title' => 'Su imagen 1',

                      );    
                        $imagen1n = $value['field_value'];
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
                        $imagen2n = $value['field_value'];
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
                        $imagen3n = $value['field_value'];
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
                        $imagen4n = $value['field_value'];
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
                        $imagen5n = $value['field_value'];
                        ?>
                    		
                                <li><?php echo img($imagen5);?> <a class="imagen5"  onclick="deleteimage(<?php echo $value['idField']; ?>)">x</a></li>
                    	<?php } ?>
                        
                        <?php if($value['field_name'] == "tiempo"){ ?>
                    		<li><label>Tiempo de la Publicacion</label></li>
	                        <li>
	                            <select name="tiempo" id="tiempo">
	                                <optgroup>
	                                    <option value="1mes" <?php if($value['field_value']== "1mes") echo 'selected="selected"'; ?>>1 Mes</option>
	                                    <option value="2meses" <?php if($value['field_value']== "2meses") echo 'selected="selected"'; ?>>2 Meses</option>
	                                </optgroup>
	                            </select>
	                        </li>
                    	<?php } ?>
                         <?php if($value['field_name'] == "tipo-construccion"){ ?>
                    		<li><label>Tipo Construccion</label></li>
	                        <li>
	                            <select name="tipo-construccion" id="tipo-construccion">
	                                <optgroup>
	                                    <option value="Casa" <?php if($value['field_value']== "Casa") echo 'selected="selected"'; ?>>Casa</option>
	                                    <option value="Apartamento" <?php if($value['field_value']== "Apartamento") echo 'selected="selected"'; ?>>Apartamento</option>
	                                    <option value="Condonimio" <?php if($value['field_value']== "Condonimio") echo 'selected="selected"'; ?>>Condominio</option>
	                                    <option value="Oficina" <?php if($value['field_value']== "Oficina") echo 'selected="selected"'; ?>>Oficina</option>
	                                    <option value="Edificio" <?php if($value['field_value']== "Edificio") echo 'selected="selected"'; ?>>Edificio</option>
	                                    <option value="Industria" <?php if($value['field_value']== "Industria") echo 'selected="selected"'; ?>>Industria</option>
	                                    <option value="Bodega" <?php if($value['field_value']== "Bodega") echo 'selected="selected"'; ?>>Bodega</option>
	                                </optgroup>
	                            </select>
	                        </li>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-dolar" && !empty($value['field_value'])){ ?>
                    		<li><label>Precio Dolares</label></li>
                        	<li><input type="text" name="precio-dolar" id="precio-dolar" value="<?= $value['field_value'] ?>"  class="numbersOnly"></li>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-colones" && !empty($value['field_value'])){ ?>
                    		<li><label>Precio Colones</label></li>
                        	<li><input type="text" name="precio-colones" id="precio-colones" value="<?= $value['field_value'] ?>" class="numbersOnly" ></li>
                        	<li style="display: none;"><input type="text" name="precio-old" id="precio-remate-old" value="<?= $value['field_value']?>" class="numbersOnly"></li>
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
						 <?php } ?>
                        
                        <?php if(($value['field_name'] == "tamano-terreno" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<li><label>Tamaño del Terreno</label></li>
	                        <li>
	                        	<?php if($value['field_name'] == "tamano-terreno" ){ ?>
	                            	<input type="text" name="tamano-terreno" id="tamano-terreno" value="<?= $value['field_value'] ?>" class="numbersOnly"> 
	                           	<?php } ?>
	                            <?php if($value['field_name'] == "tipe-tamano-terreno"){ ?>
		                            <select name="tipe-tamano-terreno" id="tipe-tamano-terreno">
		                                <optgroup>
		                                    <option value="metro-cuadrado" <?php if($value['field_value']== "metro-cuadrado") echo 'selected="selected"'; ?>>m²</option>
		                                    <option value="pie" <?php if($value['field_value']== "pie") echo 'selected="selected"'; ?>>Pie</option>
		                                </optgroup>
		                            </select>
		                        <?php } ?>
	                        </li>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="alquileres"){?>
                        <?php if(($value['field_name'] == "tamano-contruccion" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<li><label>Tamaño Construcción</label></li>
	                        <li>
	                        	<?php if($value['field_name'] == "tamano-contruccion" ){ ?>
	                            	<input type="text" name="tamano-contruccion" id="tamano-contruccion" value="<?= $value['field_value'] ?>" class="numbersOnly">
	                           	 <?php } ?>
	                            <?php if( $value['field_name'] == "metro-cuadrado"){ ?> 
		                            <select name="tipe-tamano-contruccion" id="tipe-tamano-contruccion">
		                                <optgroup>
		                                    <option value="metro-cuadrado" <?php if($value['field_value']== "metro-cuadrado") echo 'selected="selected"'; ?>>m²</option>
		                                    <option value="pie" <?php if($value['field_value']== "pie") echo 'selected="selected"'; ?>>Pie</option>
		                                </optgroup>
		                            </select>
		                        <?php } ?>
	                        </li>
						 <?php } ?>
						 <?php } ?>
                       	<?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
	                        <?php if($value['field_name'] == "edad-contruccion"){ ?>
	                    		<li><label>Edad De la Construcción</label></li>
	                        	<li><input type="text" name="edad-contruccion" id="edad-contruccion" value="<?= $value['field_value'] ?>" class="numbersOnly" ></li>
							 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "tamano-frente"){ ?>
                    		<li><label>Tamaño del Frente</label></li>
                        	<li><input type="text" name="tamano-frente" id="tamano-frente" value="<?= $value['field_value'] ?>" required class="numbersOnly"></li>
						 <?php } ?>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" ){?>
                        <?php if($value['field_name'] == "cantidad-pisos"){ ?>
                    		<li><label>Cantidad de Pisos</label></li>
	                        <li>
	                            <select name="cantidad-pisos" id="cantidad-pisos">
	                                <?php
	                                    for ($i=0; $i<=10; $i++)
	                                    {
	                                         if($i === 0){
	                                        ?>
	                                        <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }else{
	                                            ?>
	                                            <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }
	                                    }
	                                ?>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cantidad-cuartos"){ ?>
                    		<li><label>Cantidad Cuartos</label></li>
	                        <li>
	                            <select name="cantidad-cuartos" id="cantidad-cuartos">
	                                <?php
	                                    for ($i=0; $i<=50; $i++)
	                                    {
	                                         if($i === 0){
	                                        ?>
	                                        <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }else{
	                                            ?>
	                                            <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?> ><?php echo $i;?></option>
	                                        <?php  
	                                        }
	                                    }
	                                ?>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "closet"){ ?>
                    		<li><label>Closet</label></li>
	                        <li>
	                            <select name="closet" id="closet">
	                            <?php
	                                    for ($i=0; $i<=10; $i++)
	                                    {
	                                         if($i === 0){
	                                        ?>
	                                        <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }else{
	                                            ?>
	                                            <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }
	                                    }
	                                ?>
	                            </select>
	                        </li>
						 <?php } ?>
						 <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if(($value['field_name'] == "cantidad-banos" || $value['field_name'] == "tipo-bano")){ ?>
                    		<li><label>Baños</label></li>
	                        <li>
	                        	<?php if($value['field_name'] == "cantidad-banos"){ ?>
	                            <select name="cantidad-banos" id="cantidad-banos">
	                                <?php
	                                    for ($i=0; $i<=10; $i++)
	                                    {
	                                         if($i === 0){
	                                        ?>
	                                        <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }else{
	                                            ?>
	                                            <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }
	                                    }
	                                ?>
	                            </select>
	                            <?php } ?>
	                            <?php if($value['field_name'] == "tipo-bano"){ ?>
	                            <select name="tipo-bano" id="tipo-bano" >
	                                <option value="normal" <?php if($value['field_value']== "normal") echo 'selected="selected"'; ?>>Normal</option>
	                                <option value="tina" <?php if($value['field_value']== "tina") echo 'selected="selected"'; ?>>Tina</option>
	                                <option value="jaccussi" <?php if($value['field_value']== "jaccussi") echo 'selected="selected"'; ?>>Jaccussi</option>
	                            </select>
	                            <?php } ?>
	                        </li>
						 <?php } ?>
                        <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cochera"){ ?>
                    		<li><label>Cochera</label></li>
                        	<li><input type="radio" name="cochera"  value="con-cochera" <?php if($value['field_value']== "con-cochera") echo 'checked="checked"'; ?>>Si <input type="radio" name="cochera" value="sin-cochera" <?php if($value['field_value']== "sin-cochera") echo 'checked="checked"'; ?>>No</li>
						 <?php } ?>
                        <?php }?>
                        <?php if($value['field_name'] == "cantidad-carros"){ ?>
                    		<li class="cant-carros"><label>Cantidad de Carros</label></li>
	                        <li class="cant-carros" >
	                            <select name="cantidad-carros" id="cantidad-carros">
	                                <?php
	                                    for ($i=0; $i<=10; $i++)
	                                    {
	                                        if($i === 0){
	                                        ?>
	                                        <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        }else{
	                                            ?>
	                                            <option value="<?php echo $i;?>" <?php if($value['field_value']== $i) echo 'selected="selected"'; ?>><?php echo $i;?></option>
	                                        <?php  
	                                        } 
	
	                                    }
	                                ?>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "cuarto-lavado"){ ?>
                    		<li><label>Cuarto de Lavado</label></li>
	                        <li>
	                            <select name="cuarto-lavado" id="cuarto-lavado" >
	                                <option value="interior" <?php if($value['field_value']== "interior") echo 'selected="selected"'; ?>>Interior</option>
	                                <option value="exterior" <?php if($value['field_value']== "exterior") echo 'selected="selected"'; ?>>Exterior</option>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						<?php if($value['field_name'] == "porton-electrico"){ ?>
                    		<li><label>Porton Eléctrico</label></li>
	                        <li>
	                            <select name="porton-electrico" id="cuarto-lavado" >
	                                <option value="con-porton" <?php if($value['field_value']== "con-porton") echo 'selected="selected"'; ?>>Si</option>
	                                <option value="sin-porton" <?php if($value['field_value']== "sin-porton") echo 'selected="selected"'; ?>>No</option>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "acondicionado"){ ?>
                    		<li><label>Aire Acondicionado</label></li>
	                        <li><select name="acondicionado" id="acondicionado" >
	                                <option value="con-aire" <?php if($value['field_value']== "con-aire") echo 'selected="selected"'; ?>>Si</option>
	                                <option value="sin-aire" <?php if($value['field_value']== "sin-aire") echo 'selected="selected"'; ?>>No</option>
	                            </select>
	                        </li>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "jardin"){ ?>
                    		<li><label>Jardin</label></li>
	                        <li><select name="jardin" id="jardin" >
	                                <option value="con-jardin" <?php if($value['field_value']== "con-jardin") echo 'selected="selected"'; ?>>Si</option>
	                                <option value="sin-jardin" <?php if($value['field_value']== "sin-jardin") echo 'selected="selected"'; ?>>No</option>
	                            </select>
	                        </li>
						 <?php } ?>
						 <?php } ?>
						 <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						 <?php if($value['field_name'] == "bodega"){ ?>
                    		<li><label>Bodega</label></li>
	                        <li><select name="bodega" id="bodega" >
	                                <option value="exterior-bodega" <?php if($value['field_value']== "exterior-bodega") echo 'selected="selected"'; ?>>Exterior</option>
	                                <option value="interior-bodega" <?php if($value['field_value']== "interior-bodega") echo 'selected="selected"'; ?>>Interior</option>
	                            </select>
	                        </li>
						 <?php } ?>
                       	<?php } ?>
                       	
                     	<?php if($tipoPublicacion ==="terreno" || $tipoPublicacion !=="alquileres" ){?>
					 	<?php if($value['field_name'] == "topografia"){ ?>
                       	<li><label>Topografia</label></li>
                        <li> 
                            <select name="topografia" id="topografia">
                                <optgroup>
                                    <option value="plano" <?php if($value['field_value']== "plano") echo 'selected="selected"'; ?>>Plano</option>
                                    <option value="poco_inclinado" <?php if($value['field_value']== "poco_inclinado") echo 'selected="selected"'; ?>>Poco Inclinado</option>
                                    <option value="ondulado" <?php if($value['field_value']== "ondulado") echo 'selected="selected"'; ?>>Ondulado</option>
                                    <option value="fuertemente_ondulado" <?php if($value['']== "fuertemente_ondulado") echo 'selected="selected"'; ?>>Fuertemente Ondulado</option>
                                    <option value="quebrado" <?php if($value['field_value']== "quebrado") echo 'selected="selected"'; ?>>quebrado</option>
                                    <option value="turistica" <?php if($value['field_value']== "turistica") echo 'selected="selected"'; ?>>Turística</option>
                                    <option value="muy_quebrado" <?php if($value['field_value']== "muy_quebrado") echo 'selected="selected"'; ?>>Muy Quebrado</option>
                                </optgroup>
                            </select>
                        </li>
                       	<?php } ?>
                       	<?php } ?>
                       	
                        <?php if($value['field_name'] == "observacion"){ ?>
                    		<li><label>Observaciones</label></li>
	                        <li>
	                            <textarea rows="5" name="observacion" id="observacion"> <?=$value['field_value'] ?></textarea>
	                        </li>
						 <?php } ?>
                    <?php $c +=1; } ?>
                    		<?php if(!empty($value['tipo_categoria']) ){ ?>
                                <li><input type="hidden" name="tipo_categoria" id="tipo_categoria" value="<?= $value['tipo_categoria']?>" ></li>
                                <li><input type="hidden" name="idPublicacion" id="idPublicacion" value="<?= $value['idPublicacion']?>"  ></li>
                                <li><input type="hidden" name="count" id="count" value="<?= $count?>" ></li>
                    		  
                    	<?php  $tipoPublicacion = $value['tipo_categoria']; } ?>
                            <?php if($value['field_name'] == "lat"){ ?>
                        <?php $lat = $value['field_value']; ?>
                        	  
	                      <?php } ?>
	                     <?php if($value['field_name'] == "lng"){ ?>
	                     		<?php $lng = $value['field_value']; ?>
                                        
	                      <?php } ?>
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
                            <?php if($imagen1n){ ?>
                            <input type="hidden" id="imagen1" name="imagen1" value="<?php echo $imagen1n ?>"/>
                            <?php } ?>
                            <?php if($imagen2n){ ?>
                            <input type="hidden" id="imagen2" name="imagen2" value="<?php echo $imagen2n ?>" />
                            <?php } else { ?>
                            <input type="hidden" id="imagen2" name="imagen2" />
                            <?php } ?>
                            <?php if($imagen3n){ ?>
                            <input type="hidden" id="imagen3" name="imagen3" value="<?php echo $imagen3n ?>" />
                            <?php } else {?>
                            <input type="hidden" id="imagen3" name="imagen3" />
                            <?php } ?>
                            <?php if($imagen4n){ ?>
                            <input type="hidden" id="imagen4" name="imagen4" value="<?php echo $imagen4n ?>"/>
                            <?php } else {?>
                            <input type="hidden" id="imagen4" name="imagen4" />
                            <?php } ?>
                            <?php if($imagen5n){ ?>
                            <input type="hidden" id="imagen5" name="imagen5" value="<?php echo $imagen5n ?>" />
                            <?php } else {?>
                            <input type="hidden" id="imagen5" name="imagen5" />
                            <?php } ?>
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
                    <input type="submit" name="submit" value="Editar" id="submit" />
                    </div>
                </form>
                <form enctype="multipart/form-data" method="post" action="../../Publicar/guardarimagenes" id="uploadImage" target="myFrame">
                <input type="file" id="guardar_fotos" name="guardar_fotos" />
                <input type="text" id="imagen" name="imagen" value=""/>
                <input type="text" id="idpublicar" name="idpublicar" value="lleno"/>
                </form>


                <iframe name="myFrame" id="myFrame"></iframe>
            </div>
        </div>
    </div>
</div>


<?php include_once('/../footer.php') ;?>
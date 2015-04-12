<?php include_once('/../headeradmin.php') ;?>

<style>
    select{
        height: 40px;
    }
</style>
<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
            <?php include_once('/../columnMenu.php') ;?>
            <div class="box-publicar" id="publi-detalles">
                <form name="info-venta" class="info-venta">
                    <ul>
                        <li><input type="hidden" name="tipo_categoria" id="tipo_categoria" value="construcciones" ></li>
                        <li><label>Titulo</label></li>
                        <li><input type="text" maxlength="50" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="name" id="name" value="" required></li>
                        <li><label>Fotos</label></li>
                        <li>
                             <div class="images">
					<figure>
                                                <img class="upload" id="1" alt="Cargar imagen" src="<?php echo base_url()?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url()?>images/loader.gif" />
						<img alt="Vista previa" id="imagePreview1" class="preview" />
					</figure><figure>
						<img class="upload" id="2" alt="Cargar imagen" src="<?php echo base_url()?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure><figure>
						<img class="upload" id="3" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure><figure>
						<img class="upload" id="4" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure><figure>
						<img class="upload" id="5" alt="Cargar imagen" src="<?php echo base_url();?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url();?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
					</figure>
				</div>
                            <input type="hidden" id="imagen1" name="imagen1" />
                            <input type="hidden" id="imagen2" name="imagen2" />
                            <input type="hidden" id="imagen3" name="imagen3" />
                            <input type="hidden" id="imagen4" name="imagen4" />
                            <input type="hidden" id="imagen5" name="imagen5" />
                        </li>
                         <li><label>Tiempo de la Publicacion</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="tiempo" id="tiempo">
                                <optgroup>
                                    <option value="1mes">1 Mes</option>
                                    <option value="2meses">2 Meses</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Tipo Construccion</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="tipo-construccion" id="tipo-construccion">
                                <optgroup>
                                    <option value="Casa">Casa</option>
                                    <option value="Apartamento">Apartamento</option>
                                    <option value="Condonimio">Condominio</option>
                                    <option value="Oficina">Oficina</option>
                                    <option value="Edificio">Edificio</option>
                                    <option value="Industria">Industria</option>
                                    <option value="Bodega">Bodega</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Precio</label></li>
                        <li>
                            <select style="float: left" class="form-input" name="moneda" id="moneda">
                                <optgroup>
                                    <option value="colones">₡</option>
                                    <option value="dolares">$</option>
                                </optgroup>
                            </select>
                            <input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="precio-dolar" id="precio-dolar" value="" class="form-input numbersOnly"><input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="precio-colones" id="precio-colones" value="" class="form-input numbersOnly" ></li>
                        <li><label>Direccion (Arrastrar el marcador para actualizar la posición  y para mejorar la posición debe acercar el mapa</label></li>
                        <li>
                            <div class="local-map">
                                <div id="google_map"></div>
                            </div>
                        </li>
                        <li><label style="display: inline-block">Coordenadas Geográficas (Anote aquí las coordenadas o mueva el ícono <img src="<?php echo base_url()?>images/coordinates-finder.png" alt="Selector de Coordenadas" style="width: 25px;height: 25px; display: inline-block"> que se encuentra en el mapa de arriba para que se agreguen automáticamente)</label></li>
                        <li><label style="display: inline-block; margin-right: 240px;">Coordenadas X</label><label style="display: inline-block">Coordenadas Y</label></li>
                        <li>
                            <input type="text" style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="lat" id="lat" value="" class="numbersOnly"/>
                            <input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="lng" id="lng" value="" class="numbersOnly"/>
                        </li>
                        <li><label>Direccion</label></li>
                        <li><select  style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="address" id="address" value="" required style="">
                            <option value="San Jose">San José</option>
                            <option value="Alajuela">Alajuela</option>
                            <option value="Cartago">Cartago</option>
                            <option value="Guanacaste">Guanacaste</option>
                            <option value="Heredia">Heredia</option>
                            <option value="Puntarenas">Puntarenas</option>
                            <option value="Limon">Limón</option>
                        </select>
                        <input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="exacta" id="exacta" value="" class="form-input">
                        </li>
                        <li><label>Tamaño del Terreno</label></li>
                        <li>
                            <input type="text" style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="tamano-terreno" id="tamano-terreno" value="" class="numbersOnly"> 
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 83px;'name="tipe-tamano-terreno" id="tipe-tamano-terreno">
                                <optgroup>
                                    <option value="metro-cuadrado" selected>m²</option>
                                    <option value="pie">Pie</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Tamaño Construccion</label></li>
                        <li>
                            <input type="text" style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="tamano-contruccion" id="tamano-contruccion" value="" class="numbersOnly"> 
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 83px;'name="tipe-tamano-contruccion" id="tipe-tamano-contruccion">
                                <optgroup>
                                    <option value="metro-cuadrado" selected>m²</option>
                                    <option value="pie">Pie</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Edad De la Construccion</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="edad-contruccion" id="edad-contruccion" value="" class="numbersOnly" ></li>
                        <li><label>Distancia del frente</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' name="tamano-frente" id="tamano-frente" value="" required class="numbersOnly"></li>
                        <li><label style="display: inline-block; margin-right: 60px;">Tipo de Piso</label><label style="display: inline-block">Tipo de Cielo Raso</label>
                        </li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: inline-block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-right: 50px;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 100px;'name="tipo-piso" id="tipo-piso">
                                <optgroup>
                                    <option value="tipo-1">Tipo 1</option>
                                    <option value="tipo-2">Tipo 2</option>
                                </optgroup>
                            </select>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: inline-block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 100px;'name="tipo-cielo-raso" id="tipo-cielo-raso">
                                <optgroup>
                                    <option value="tipo-1">Tipo 1</option>
                                    <option value="tipo-2">Tipo 2</option>
                                </optgroup>
                            </select>
                            
                        </li>
                        <li><label>Cantidad de Pisos</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="cantidad-pisos" id="cantidad-pisos">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                         if($i === 0){
                                        ?>
                                        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                        <?php  
                                        }else{
                                            ?>
                                            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php  
                                        }
                                    }
                                ?>
                            </select>
                        </li>
                        <li><label>Cantidad Cuartos</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="cantidad-cuartos" id="cantidad-cuartos">
                                <?php
                                    for ($i=0; $i<=50; $i++)
                                    {
                                         if($i === 0){
                                        ?>
                                        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                        <?php  
                                        }else{
                                            ?>
                                            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php  
                                        }
                                    }
                                ?>
                            </select>
                        </li>
                        <li><label>Closet</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="closet" id="closet">
                            <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                         if($i === 0){
                                        ?>
                                        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                        <?php  
                                        }else{
                                            ?>
                                            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php  
                                        }
                                    }
                                ?>
                            </select>
                        </li>
                        <li><label>Baños</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="cantidad-banos" id="cantidad-banos">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                         if($i === 0){
                                        ?>
                                        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                        <?php  
                                        }else{
                                            ?>
                                            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php  
                                        }
                                    }
                                ?>
                            </select>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="tipo-bano" id="tipo-bano" >
                                <option value="normal" selected>Normal</option>
                                <option value="tina">Con Tina</option>
                                <option value="jaccussi">Con Jacuzzi</option>
                            </select>
                        </li>
                        <li><label>Cochera</label></li>
                        <li><input type="radio" name="cochera"  value="con-cochera">Si <input type="radio" name="cochera" value="sin-cochera" checked="checked">No</li>
                        <li class="cant-carros" style="display: none;"><label>Cantidad de Carros</label></li>
                        <li class="cant-carros" style="display: none;">
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="cantidad-carros" id="cantidad-carros">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        if($i === 0){
                                        ?>
                                        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                                        <?php  
                                        }else{
                                            ?>
                                            <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php  
                                        }

                                    }
                                ?>
                            </select>
                        </li>
                        <li><label>Cuarto de Lavado</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="cuarto-lavado" id="cuarto-lavado" >
                                <option value="interior" selected>Interior</option>
                                <option value="exterior">Exterior</option>
                            </select>
                        </li>

                        <li><label>Porton Eléctrico</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="porton-electrico" id="cuarto-lavado" >
                                <option value="con-porton" selected>Si</option>
                                <option value="sin-porton">No</option>
                            </select>
                        </li>
                        <li><label>Aire Acondicionado</label></li>
                        <li><select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="acondicionado" id="acondicionado" >
                                <option value="con-aire" selected>Si</option>
                                <option value="sin-aire">No</option>
                            </select>
                        </li>
                        <li><label>Bodega</label></li>
                        <li><select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="bodega" id="bodega" >
                                <option value="exterior-bodega" selected>Exterior</option>
                                <option value="interior-bodega">Interior</option>
                                <option value="no-bodega">Sin Bodega</option>
                            </select>
                        </li>
                        <li><label>Jardin</label></li>
                        <li><select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="jardin" id="jardin" >
                                <option value="con-jardin" selected>Si</option>
                                <option value="sin-jardin">No</option>
                            </select>
                        </li>
                        <li><label>Observaciones</label></li>
                        <li>
                            <textarea  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'rows="5" name="observacion" id="observacion"> </textarea>
                        </li>
                    </ul>
                   <div id="btn-save-info">
                    <input type="submit" name="submit" value="Guardar" id="submit" />
                    </div>
                </form>
                <form enctype="multipart/form-data" method="post" action="../Publicar/guardarimagenes" id="uploadImage" target="myFrame">
                    <input type="file" id="guardar_fotos" name="guardar_fotos" />
                    <input type="text" id="imagen" name="imagen" value=""/>
                    <input type="text" id="idpublicar" name="idpublicar" value=""/>

                </form>


                <iframe name="myFrame" id="myFrame"></iframe>
                
            </div>
        </div>
    </div>
</div>


<?php include_once('/../footer.php') ;?>
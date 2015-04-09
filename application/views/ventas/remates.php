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
                <form enctype="multipart/form-data" name="info-venta" class="info-venta">
                    <ul>
                        <li><input type="hidden" name="tipo_categoria" id="tipo_categoria" value="remate" ></li>
                        <li><label>Titulo</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="name" id="name" value="" required></li>
                        <li><label>Fotos</label></li>
                        <li>
                             <div class="images">
					<figure>
                                            <img class="upload" id="1" alt="Cargar imagen" src="<?php echo base_url()?>images/picture-save.png" />
						<img class="loading" alt="Cargando..." src="<?php echo base_url()?>images/loader.gif" />
						<img alt="Vista previa" class="preview" />
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
                        <li><label>Tipo Remate</label></li>
                        <li>
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="tipo-Terreno" id="tipo-Terreno">
                                <optgroup>
                                    <option value="casa">Casa</option>
                                    <option value="apartamento">Apartamentos</option>
                                    <option value="terreno">Terreno</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Número Expediente</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="numero-expediente" id="numero-expediente" value="" required></li>
                        <li><label>Precio Remate</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="precio-remate" id="precio-remate" value="" class="numbersOnly"></li>
                        <li><label>Dirección (Arrastrar el marcador para actualizar la posición  y para mejorar la posición debe acercar el mapa)</label></li>
                        <li>
                            <div class="local-map">
                                <div id="google_map"></div>
                            </div>
                        </li>
                        <li>
                            <input type="text" style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="lat" id="lat" value="" class="numbersOnly"/>
                            <input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="lng" id="lng" value="" class="numbersOnly"/>
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
                        <li><label>Tamaño Propiedad</label></li>
                        <li>
                            <input type="text" style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="tamano-propiedad" id="tamano-propiedad" value="" class="numbersOnly"> 
                            <select  style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 83px;'name="tipe-tamano-terreno" id="tipe-tamano-terreno">
                                <optgroup>
                                    <option value="metro-cuadrado" selected>m²</option>
                                    <option value="pie">Pie</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Lugar del Remate</label></li>
                        <li><input type="text" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'name="lugar-remate" id="lugar-remate" value="" required></li>
                        <li><label>Fecha del Remate</label></li>
                        <li><input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="datetime" name="fecha-remate" id="fecha-remate" value="" required></li>
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


                <iframe name="myFrame" id="myFrame"></iframe><form enctype="multipart/form-data" method="post" action="../Publicar/guardarimagenes" id="uploadImage" target="myFrame">
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
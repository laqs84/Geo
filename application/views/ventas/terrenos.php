<?php include '/../headeradmin.php';?>


<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
            <?php include '/../columnMenu.php' ;?>
           <div class="box-publicar" id="publi-detalles">
            
                <form enctype="multipart/form-data" name="info-venta" class="info-venta">
                    <ul>
                        <li><input type="hidden" name="tipo_categoria" id="tipo_categoria" value="terreno" ></li>
                        <li><label>Titulo</label></li>
                        <li><input  type="text" name="name" maxlength="50" style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' id="name" value="" required class="form-input"></li>
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
                            <select class="form-input" name="tiempo" id="tiempo">
                                <optgroup>
                                    <option value="1mes">1 Mes</option>
                                    <option value="2meses">2 Meses</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Tipo Terreno</label></li>
                        <li>
                            <select class="form-input" name="tipo-Terreno" id="tipo-Terreno">
                                <optgroup>
                                    <option value="Urbano">Urbano</option>
                                    <option value="Agricola">Agricola</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Condominio">Condominio</option>
                                    <option value="Quinta">Quinta</option>
                                    <option value="Turistica">Turística</option>
                                    <option value="Forestal">Forestal</option>
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
                            <input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="precio-dolar" id="precio-dolar" value="" class="form-input numbersOnly"><input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;'  type="text" name="precio-colones" id="precio-colones" value="" class="form-input numbersOnly" ></li>
                        <li><label>Direccion (Arrastrar el marcador para actualizar la posición  y para mejorar la posición debe acercar el mapa)</label></li>
                        <li>
                            <div class="local-map">
                                <div id="google_map"></div>
                            </div>
                        </li>
                        <li><label style="display: inline-block">Coordenadas Geográficas (Anote aquí las coordenadas o mueva el ícono <img src="<?php echo base_url()?>images/coordinates-finder.png" alt="Selector de Coordenadas" style="width: 25px;height: 25px; display: inline-block"> que se encuentra en el mapa de arriba para que se agreguen automáticamente)</label></li>
                        <li><label style="display: inline-block; margin-right: 240px;">Coordenadas X</label><label style="display: inline-block">Coordenadas Y</label></li>
                        <li>
                            <input style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px; float: left;' type="text" name="lat" id="lat" value="" class="form-input numbersOnly"/>
                            <input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="lng" id="lng" value="" class="form-input numbersOnly"/>
                        </li>
                        <li><label>Direccion</label></li>
                        <li><select class="form-input" name="address" id="address" value="" required style="float: left">
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
                            <input style='float: left;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="tamano-terreno" id="tamano-terreno" value="" class="numbersOnly form-input"> 
                            <select class="form-input" name="tipe-tamano-terreno" id="tipe-tamano-terreno">
                                <optgroup>
                                    <option value="metro-cuadrado" selected>m²</option>
                                    <option value="pie">Pie</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Tamaño del Frente</label></li>
                        <li><input style='border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: inline-block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;' type="text" name="tamano-frente" id="tamano-frente" value="" class="numbersOnly form-input">
                            <label style="display: inline-block">metros</label>                        </li>
                        <li><label>Topografia</label></li>
                        <li> 
                            <select class="form-input" name="topografia" id="topografia">
                                <optgroup>
                                    <option value="plano">Plano</option>
                                    <option value="poco_inclinado">Poco Inclinado</option>
                                    <option value="ondulado">Ondulado</option>
                                    <option value="fuertemente_ondulado">Fuertemente Ondulado</option>
                                    <option value="quebrado">quebrado</option>
                                    <option value="turistica">Turística</option>
                                    <option value="muy_quebrado">Muy Quebrado</option>
                                </optgroup>
                            </select>
                        </li>
                        <li><label>Observaciones</label></li>
                        <li>
                            <textarea class="form-input" rows="5" name="observacion" id="observacion"> </textarea>
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

<?php include '/../footer.php' ;?>
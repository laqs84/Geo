<?php include ("header.php") ;?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src=<?php echo base_url().'script/googleMaP.js'?> ></script>
<script type="text/javascript" src=<?php echo base_url().'script/jquery.ui.core.js'?>></script>
		<script type="text/javascript" src=<?php echo base_url().'script/jquery.ui.widget.js'?>></script>
		<script type="text/javascript" src=<?php echo base_url().'script/jquery.ui.rcarousel.js'?>></script>
		<script type="text/javascript">
			jQuery(function( $ ) {
				$( "#carousel" ).rcarousel({
					auto: {
						enabled: true,
						interval: 3000,
						direction: "prev"
					}
				});
				
				$( "#ui-carousel-next" )
					.add( "#ui-carousel-prev" )
					.hover(
						function() {
							$( this ).css( "opacity", 0.7 );
						},
						function() {
							$( this ).css( "opacity", 1.0 );
						}
					);				
			});
		</script>
<style>
    
.mensajebienvenida {
    
    height: 150px;
}
    .imagenes {
   margin-left: 31px;
    width: 75%;
    
}
.read-more {
    float: right;
    margin-top: 33px;
    width: 70px;
}

.newContent > p {
    width: 180px;
}

.newContent > p {
    
    width: 180px;
}
.newContent > .pinicio3 {
    height: 40px;
    margin-top: 15px;
}
.moreNews hr {
    margin-top: 26px;
    width: 268px;
}
.content-rigth > #msjerrror {
    background: none repeat scroll 0 0 white;
    color: red;
    height: 65px;
    margin: 226px;
    padding: 20px;
    position: absolute;
    width: 194px;
    z-index: 1;
}
.pequenos.precio1 {
    height: 14px;
    width: 80px;
}
/**** SECOND LEVEL MENU ****/
/* We make the position to absolute for flyout menu and hidden the ul until the user hover the parent li item */
.nav-content-left > ul > li > ul{
    display: none;
    margin-left: 120px;
    position: absolute;
    z-index: 999;
}

/* When user has hovered the li item, we show the ul list by applying display:block, note: 150px is the individual menu width.  */
/* for IE < 9 we using class .iehover */
.nav-content-left > ul > li:hover > ul, 
.nav-content-left > ul > li.iehover > ul{
    left:150px;
    top:0px;
    display:block;
}

/* we apply different background color to 2nd level menu items*/
.nav-content-left > ul > li > ul > li{
    background-color:#fff;
    height: 20px;
}

/* We change the background color for the level 2 submenu when hovering the menu */
/* for IE < 9 we using class .iehover */
.nav-content-left > ul > li:hover > ul > li:hover,
.nav-content-left > ul > li.iehover > ul > li.iehover{
    background: linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(254, 254, 254, 1) 0%, rgba(209, 209, 209, 1) 51%, rgba(209, 209, 209, 1) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: white;
}

/* We style the color of level 2 links */
.nav-content-left > ul > li > ul > li > a{
    color:white;
    display:inline-block;
    width:120px;
}
.nav-content-left ul li:hover,
.nav-content-left ul li.iehover{
    
    position:relative;
}
#carousel img {
				border: 0;
			}

			#ui-carousel-next, #ui-carousel-prev {
				width: 60px;
				height: 100px;
				background: url(images/arrow-left.png) #fff center center no-repeat;
				display: block;
				position: absolute;
				top: 0;
				z-index: 100;
			}

			#ui-carousel-next {
				right: 0;
				background-image: url(images/arrow-right.png);
			}

			#ui-carousel-prev {
				left: 0;
			}
			
			#ui-carousel-next > span, #ui-carousel-prev > span {
				display: none;
			}	
                        .precio > a#ocultar {
  cursor: pointer;
}
.banos {
  float: left;
  margin-left: 20px;
  width: 288px;
}
</style>
	<!-- content -->
<div id="siteframe">
	<div id="content">
		<div class="content-padding">
                    <div class="content-left">
                        <div class="padding-left">
                            <div class="nav-content-left">
                                <ul>
                                    <li  class="send1 mainmenu-itemvertical active"><a href="<?php echo base_url(); ?>index.php"><?php echo img('images/flechamenu.png');?> <span>Inicio</span></a></li>
                                    <li id='construcciones' class=" send1 mainmenu-itemvertical"><a href="#"  id='construcciones'><?php echo img('images/flechamenu.png');?> <span>Construcciones</span></a></li>
                                    <li id='terreno' class="send1 mainmenu-itemvertical"><a href="#"  id='terreno'><?php echo img('images/flechamenu.png');?> <span>Terrenos</span></a></li>
                                    <li id='alquileres' class="send1 mainmenu-itemvertical"><a href="#"  id='alquileres'><?php echo img('images/flechamenu.png');?> <span>Alquileres</span></a></li>
                                <!--      <li id='remate1' class="mainmenu-itemvertical"><a href="#" class="send1" id='remate'><?php // img('images/flechamenu.png');?> <span>Remates</span></a></li-->
                                    <li class="mainmenu-itemvertical"><a href="<?php echo base_url(); ?>index.php/Contacto"><?php echo img('images/flechamenu.png');?> <span>Contacto</span></a></li>
                                  <!--  <li class="mainmenu-itemvertical"><a href=""><?php echo img('images/flechamenu.png');?> <span>Favoritos</span></a><ul>
                                        <li><a href="#">Listado</a></li>
                                        <li><a href="#">Mapa</a></li>
                                       
                                    </ul></li>-->
                                    
                                     
                                </ul>
                            </div>
                            
                            <div class="moreNews">
                                <div class="titles">
                                    <h3>Destacadas</h3>
                                </div>
                                
                               <?php
                               function recortar_texto($texto, $limite=60){   
                                    $texto = trim($texto);
                                    $texto = strip_tags($texto);
                                    $tamano = strlen($texto);
                                    $resultado = '';
                                    if($tamano <= $limite){
                                        return $texto;
                                    }else{
                                        $texto = substr($texto, 0, $limite);
                                        $palabras = explode(' ', $texto);
                                        $resultado = implode(' ', $palabras);
                                        $resultado .= '...';
                                    }   
                                    return $resultado;
                                }
                                $i = 0;
                               $id = '';
                               $id2 = '';
                               $print = false;
                               $print_ob = false;
                              if (!empty($publicaciones)){
                               foreach ($publicaciones as $key => $value){
                               
                                   if($id !== $value['idPublicacion']){
                                   $i++;
                                       
                                   }
                              $id = $value['idPublicacion'];     
                             if($id == $value['idPublicacion']){
                                   $arraynuevo[$i][$key] = $value; 	
                               	   }
                               	}?>    
                                
                                    <?php
                                    $a = 0;
                                   foreach ($arraynuevo as $valor){
                                   if($a < 4){
                                      if($a < $i) {
                                          
                                          $ab = $a;
                                      
                                   ?>    
                              
                    <div class="news">
                                  
                                    <div class="newContent">
                                      <?php } 
                                      foreach ($valor as $valor1){
                                      if($id2 !== $valor1['idPublicacion']){$print = false;}
                                      if ($valor1['field_name'] == "imagen1") { 
                                          
                                      $imagen1 = array(
                                     'src' => 'files/'.$valor1['field_value'],
                                                'alt' => 'Imagen 1',
                                                'class' => 'imagenes',

                                                'title' => 'Imagen 1',

                                      );     
                                      ?>          
                                        <a href="<?php  echo base_url(); ?>index.php/Publicadas/show/<?php echo $valor1['idPublicacion'] ?>" > <?php echo img($imagen1);?></a>
                                       <?php  } 
                                      if ($valor1['field_name'] == "observacion") {  ?>  
                                      
                                        <a href="<?php  echo base_url(); ?>index.php/Publicadas/show/<?php echo $valor1['idPublicacion'] ?>" > <p  class="pinicio<?php echo $ab ?>"><?php echo recortar_texto($valor1['field_value'], 50);?></p></a>
                                      <?php  } ?> 
                                     
                                   
                                                <?php if ($valor1['field_name'] == "address") {  ?>  
                                        <a href="<?php  echo base_url(); ?>index.php/Publicadas/show/<?php echo $valor1['idPublicacion'] ?>" ><h4><?php echo $valor1['field_value'];?></h4></a>
                                                <?php  } ?> 
	                             
                                    
                                     <?php if ($print == false) {
                                     $id2 = $valor1['idPublicacion'];
                                         ?>
                                                
	                                    <div class="read-more">
	                                        <a href="<?php  echo base_url(); ?>index.php/Publicadas/show/<?php echo $valor1['idPublicacion'] ?>" ><span>leer Más</span></a>
	                                    </div>
                                    <?php $print = true;  } ?>
                                
                             
                               <?php 
                                   }
                               if($a < $i) {
                               	?>
                                    </div></div> <hr>
                                     <?php 
                               }
                                   $a++;    }
                               } } ?>
                            </div>
                            
                        </div>   
                    </div>
                    <div class="content-rigth">
                        <div class="mensajebienvenida">
                            <div id="carousel">
					<img src="images/001.jpg" />
                                        <img src="images/002.jpg" />
					<img src="images/006.jpg" />
					<img src="images/003.jpg" />
					<img src="images/004.jpg" />
                                        <img src="images/005.jpg" />
					
					
				</div>
                        </div>
                    <div class="form-search content-description">
                                <form id="formbuscar" action="" method="post">
                                     <h2>Busqueda</h2>
                                     <a id="mostrar">Avanzadas</a>
                                     <div class="ciudad">
                                            <label for="tamaño" >Tamaño Frente</label>
                                            <input class="pequenos" type="text" name="tamano-frente" id="tamano-frente" />
                                     </div> 
                                     <div class="tipos">
                                            <label for="tipo" >Tipo</label>
                                    <select name="tipo_categoria" id="tipo_categoria">
	                                <optgroup>
	                                    <option value="alquileres">Alquileres</option>
	                                    <option value="construcciones">Construcciones</option>
	                                    <option value="remate">Remates</option>
	                                    <option value="terreno">Terrenos</option>
	                                    
	                                </optgroup>
	                            </select>
                                     </div> 
                                     <div class="precio">
                                            <label for="precio" >Precio</label>
                                            <select class="moneda" name="moneda" id="moneda">
                                                <optgroup>
                                                    <option value="colones">₡</option>
                                                    <option value="dolares">$</option>
                                                </optgroup>
                                            </select>
                                           De <input class="pequenos precio1" type="text" name="precio1" id="precio1" value="0"/> a
                                            <input class="pequenos precio1" type="text" name="precio2" id="precio2" />
                                     </div>  
                                     <div class="send">
                                         <input type="button" id="send" name="buscar" value="Buscar">
                                     </div>  
                                     <div id="cmenu">
                                     <div class="banos">
                                     <label for="moneda" >Cantidad de Baños</label>
                                     <input class="pequeñas" type="text" name="cantidad-banos" id="cantidad-banos" />
                                     </div>
                                     <div class="cochera">
                                     <label for="cochera" >Cantidad de Cochera</label>
                                     <input class="pequeñas" type="text" name="cantidad-carros" id="cantidad-carros" />
                                     </div>
                                     <div class="precio">
                                     <a id="ocultar">X</a>
                                     </div>
                                     </div>
                                </form>
                            </div>
                        <div id="msjerrror"></div>
                        <div id="google_map"></div>
                        
                    </div>
                        
                    </div>
	</div>
</div>
	<!-- end content -->	


<?php include ("footer.php") ;?>


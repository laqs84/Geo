<?php include ("header.php") ;?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src=<?php echo base_url().'script/googleMaP.js'?> ></script>
<style>
    
.form-search h2 {
    color: white;
    float: left;
    font-size: 18px;
    padding-left: 20px;
    padding-top: 5px;
}


.read-more {
    color: #cc6600;
    float: none;
    margin-left: 267px;
    margin-top: 70px;
}
#newbuscar {
    float: left;
    margin-left: -743px;
    margin-top: 55px;
    
}

#send {
    background: none repeat scroll 0 0 #fd8900;
    border: medium none;
    border-radius: 15px;
    float: right;
    margin-right: 20px;
    margin-top: 30px;
    text-align: center;
    width: 69px;
}
.trescolum {
  float: right;
  margin-right: -70px;
  margin-top: -75px;
}
.cantidad-cuartos {
  margin-left: 795px;
  margin-top: -31px;
}
.cantidad-cuartos label {
    margin-bottom: 5px;
}
.banos {
  float: left;
  margin-left: 67px;
  width: 309px;
}
.cochera {
  float: none;
  margin-right: 0;
}
</style>
	<!-- content -->
<div id="siteframe">
	<div id="content">
		<div class="content-padding">
                    
                    
                    <div class="form-search content-description">
                                <form id="formbuscar" action="" method="post">
                                                                        
                                     <div class="ciudad">
                                            <label for="ciudad" >Ciudad</label>
                                            <input class="pequenos" type="text" name="address" id="address" />
                                     </div> 
                                     <div class="tipos">
                                            <label for="tipo" >Tipo</label>
                                    <select name="tipo_categoria" id="tipo_categoria">
	                                <optgroup>
	                                    <option value="alquileres">Alquileres</option>
	                                    <option value="construcciones">Contrucciones</option>
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
                                     <div id="newbuscar">
                                     <div class="banos">
                                     <label for="moneda" >Cantidad de Baños</label>
                                     <input class="pequeñas" type="text" name="cantidad-banos" id="cantidad-banos" />
                                     </div>
                                     <div class="cochera">
                                     <label for="cochera" >Cantidad de Cocheras</label>
                                     <input class="pequeñas" type="text" name="cantidad-carros" id="cantidad-carros" />
                                     </div>
                                         <div class="trescolum">
                                     <label for="jardin" >Jardín</label>
                                     <select class="pequeñas" name="jardin" id="jardin" >
                                         <option value="">Seleccionar una opcion</option>
	                                <option value="con-jardin">Si</option>
	                                <option value="sin-jardin">No</option>
	                            </select>
                                     
                                     </div>
                                     <div class="cantidad-cuartos">
                                     <label for="cantidad-cuartos" >Cuartos</label>
                                     <select class="pequeñas" name="cantidad-cuartos" id="cantidad-cuartos">
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
                                     </div>
                                     
                                     </div>
                                    <input type="hidden" id="busquedaavance" value="1">
                                </form>
                            </div>
                    <div id="msjerrror"></div>
                        <div id="google_map"></div>
                        
                   
                        
                    </div>
	</div>
</div>
	<!-- end content -->	


<?php include ("footer.php") ;?>


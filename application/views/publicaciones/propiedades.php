<?php include ("/../header.php") ;?>
<style>
    .news {
background: #fff;
height: 128px;
margin-bottom: 20px;
-webkit-box-shadow: 1px 1px 1px rgba(50, 50, 50, 0.1);
-moz-box-shadow: 1px 1px 1px rgba(50, 50, 50, 0.1);
box-shadow: 1px 1px 1px rgba(50, 50, 50, 0.1);

width: 370px;
float: left;
    margin-left: 100px;
}
.sale {
background: #33CC00;
color: #fff;
padding: 5px 10px 5px 10px;
}
.small-list span {
display: block;
}
.small-list .label {
position: absolute;
z-index: 100;
margin: 10px 0 0 10px;
}
.small-list img {
position: absolute;
}
img.propiedad {

height: 128px;
max-width: 128px;
vertical-align: middle;
border: 0;
-ms-interpolation-mode: bicubic;
}
.small-list .arrow {
float: right;
margin-top: 100px;
background: url(../img/small-arrow-right.png) center no-repeat;
width: 30px;
height: 16px;
display: block;
}
.small-list .info {
padding: 10px;
padding-left: 185px;
}
.small-list h2 {
font-size: 16px;
margin: 0;
line-height: normal;
}
.small-list .price {
display: inline-block;
font-size: 16px;
margin: 2px 0 2px 0;
}
#siteframe {
    background: none repeat scroll 0 0 #f0f0f0;
    min-height: auto;
    overflow: hidden;
}
#content {
    padding: 25px 0;
    width: 982px;
}
.imagenes {
    height: 128px;
    width: 128px;
    float: left;
    margin-right: 30px;
}

.read-more {
    float: right;
    margin-top: 105px;
    width: 70px;
    
}

h4 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 20px;
}
.newContent > p {
    font-size: 15px;
}
</style>
  
<div id="siteframe">
	<div id="content">
		<div class="content-padding">
		
                
                
                <?php
                               function recortar_texto($texto, $limite=100){   
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
                                   
                                      if($a < $i) {
                                          $ab = $a;
                                   ?>    
                               
                    <div class="news">
                                  
                                    <div class="newContent">
                                      <?php } 
                                      foreach ($valor as $valor1){
                                      if($id2 !== $valor1['idPublicacion']){$print = false;}
                                      if ($valor1['field_name'] == "observacion") {  ?>  
                                      <p><?php echo recortar_texto($valor1['field_value'], 50);?></p>
                                      <?php  } ?> 
                                      <?php if ($valor1['field_name'] == "imagen1") { 
                                          
                                      $imagen1 = array(
                                     'src' => 'files/'.$valor1['field_value'],
                                                'alt' => 'Imagen 1',
                                                'class' => 'imagenes',

                                                'title' => 'Imagen 1',

                                      );     
                                      ?>          
                                               <?php echo img($imagen1);?>
                                       <?php  } ?> 
                                   
                                                <?php if ($valor1['field_name'] == "address") {  ?>  
	                                        <h4><?php echo $valor1['field_value']?></h4>
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
                                      </div></div>
                                     <?php 
                               }
                                   $a++;    }
                                      }else {echo 'No hay Propiedades';}?>
                
		
		
		
		</div>
	</div>
</div>







<?php include ("/../footer.php") ;?>

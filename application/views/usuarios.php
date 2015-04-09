<?php include_once('headeradministrador.php') ;?>
<style>
    #estado{
        width: 79%;
    }
</style>


<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
           
            <div class="module" id="publi-detalles">
				<table class="table">
				   <thead>
				      <tr>
				         <th>Nombre Completo</th>
				         <th>Telefono</th>
				         <th>Direccion</th>
                                         <th>Correo</th>
                                         
				         
				         
				      </tr>
				   </thead>
				   <tbody>
				   <?php 
                        if($publicaciones){
                       


				   		$color = array('active','danger','warning','success');
				   		$cont = 0;
				   		foreach ($publicaciones as $value){
                                                    
				   	?>		
						<tr class="<?php echo $color[$cont]?>">
                                                    <td><?php echo $value['nombre']. ' ' .$value['apellidos']?></td>
							<td><?php echo $value['telefono']?></td>
							<td><?php echo $value['direccion']?></td>
                                                        <td><?php echo $value['correo'];?></td>
                                                        
								
						</tr>
					<?php 
							$cont++;
							if($cont == 2)
							{
								$cont = 0;
							}			
				   		}
                                   }
				   ?>   
				   </tbody>
				</table>
            </div>
        </div>
    </div>
</div>


<?php include_once('footeradministrador.php') ;?>
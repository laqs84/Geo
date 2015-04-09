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
				         <th>ID</th>
				         <th>Propiedad</th>
                                         <th>Total</th>
                                         
				         
				         
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
                                                    
                                                    <td><?php echo $value->idMarcadas?></td>
						   <td><?php echo $value->idPublicacion?></td>
                                                   <td><?php echo $value->total_com?></td>
							
                                                        
								
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
<?php include_once('/../headeradmin.php') ;?>
<style>
    #estado{
        width: 79%;
    }
</style>
<script>
function estado(id,idpublicar){
	
	if (confirm('¿Seguro que quieres cambiar el estado de esta propiedad?'))
	{
		
		$.ajax({
	            type:'POST',
	            url: '../Publicadas/cambiarestado',
                    dataType		: 'json',
	            data:{
	                data:id.value,
                        idpublicar:idpublicar
	            },
			success		: function (data)
			{
				
				if (data.status === "success")
				{
                                        location.reload();
				}
				else
				{
					alert(data.msg);
				}
			}
		});
	}
        }
        
function fecha(id){
	
	
		
		$.ajax({
	            type:'POST',
	            url: '../Publicadas/cfecha',
                    dataType		: 'json',
	            data:{
	                data:id
	            },
			success		: function (data1)
			{
				
				if (data1.status === "success")
				{
					alert(data1.msg);
                                       
				}
				else
				{
					alert(data1.msg);
				}
			}
		});
	
        }
</script>
<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
            <?php include_once('/../columnMenu.php') ;?>
            <div class="box-publicar" id="publi-detalles">
				<table class="table">
				   <thead>
				      <tr>
				         <th>Categoría</th>
				         <th>Tiempo</th>
				         <th>Fecha Publicación</th>
                                         <th>Cuanto le queda</th>
                                         <th>Estado</th>
				         <th>Editar</th>
				         
				      </tr>
				   </thead>
				   <tbody>
				   <?php 
                        if($publicaciones){
                       


				   		$color = array('active','danger','warning','success');
				   		$cont = 0;
				   		foreach ($publicaciones as $value){
                                                    $fecha=$value['date_publicacion'];
                                                    if($value['tiempo'] == '1mes'){
                                                        $fecha1 = date("Y-m-d", strtotime($fecha));
                                                        $dt_1MesesDespues = date("Y-m-d", strtotime($fecha1.'+1 month'));
                                                        $fecha2 = $dt_1MesesDespues.' 00:00:00';
                                                    }
                                                    if($value['tiempo'] == '2meses'){
                                                        
                                                        $fecha1 = date("Y-m-d", strtotime($fecha));
                                                        
                                                        $dt_1MesesDespues = date("Y-m-d", strtotime($fecha1.'+2 month'));
                                                        $fecha2 = $dt_1MesesDespues.' 00:00:00';
                                                    }
                                                    
                                                    $segundos=strtotime($fecha2) - strtotime('now');
                                                   $diferencia_dias=intval($segundos/60/60/24);
				   	?>		
						<tr class="<?php echo $color[$cont]?>">
                                                    <td><a href="<?php  echo base_url(); ?>index.php/Publicadas/show/<?php echo $value['idPublicacion'] ?>"><?php echo $value['tipo_categoria']?></a></td>
							<td><?php echo $value['tiempo']?></td>
							<td><?php echo $value['date_publicacion']?></td>
                                                        <td><?php echo $diferencia_dias;?></td>
                                                        <td>
                                                        <?php if($diferencia_dias <= 1) { ?>
                                                            <a href="" onclick="fecha(<?php echo $value['idPublicacion'] ?>)">Tu publicacion esta vencida, ¿Quiere ponerla activa?</a>
                                                        
                                                        <?php } else {?>
                                                        <select onchange="estado(this,<?php echo $value['idPublicacion'] ?>);" name="estado" id="estado">
                                                        <optgroup>
                                                            <option value="1" <?php if($value['status']== "1") echo 'selected="selected"'; ?>>Activo</option>
                                                            <option value="0" <?php if($value['status']== "0") echo 'selected="selected"'; ?>>Desactivo</option>
                                                        </optgroup>
                                                        </select
                                                        <?php }?>
                                                        </td>
							<td><a href="<?php echo base_url(); ?>index.php/Publicadas/editar/<?php echo $value['idPublicacion']?>" class="btn btn-default btn-lg active" role="button">Editar</a></td>	
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


<?php include_once('/../footer.php') ;?>
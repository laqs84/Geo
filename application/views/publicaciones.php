<?php include_once('headeradministrador.php') ;?>
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
	            url: '../Administrador/cambiarestado',
                    dataType		: 'json',
	            data:{
	                data:id.value,
                        idpublicar:idpublicar
	            },
			success		: function (data)
			{
				
				if (data.status === "success")
				{
					alert(data.msg);
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
        

</script>
<div id="siteframe">
    <div id="content">
        <div class="content-padding">
            <div class="title-page"><h1><?php echo $title_page ?></h1></div>
           
            <div class="module" id="publi-detalles">
				<table class="table">
				   <thead>
				      <tr>
				         <th>Categoría</th>
				         <th>Tiempo</th>
				         <th>Fecha Publicación</th>
                                         <th>Cuanto le queda</th>
                                         <th>Estado</th>
				         
				         
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
                                                       
                                                        <select onchange="estado(this,<?php echo $value['idPublicacion'] ?>);" name="estado" id="estado">
                                                        <optgroup>
                                                            <option value="1" <?php if($value['permiso']== "1") echo 'selected="selected"'; ?>>Activo</option>
                                                            <option value="0" <?php if($value['permiso']== "0" || empty($value['permiso']) ) echo 'selected="selected"'; ?>>Desactivo</option>
                                                        </optgroup>
                                                        </select
                                                    
                                                        </td>
								
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
<?php
		
	class Iniciomodel extends CI_Model{
    
    public function __construct(){
		parent::__construct();
	}
    public function selectactivas($table){
                	$sql = "SELECT * FROM " .$table.";" ;
                	$query = $this->db->query($sql);
                
                	$arr=null;
                	if($query->num_rows() > 0){
                		foreach($query->result() as $obj){
                			$arr[] = get_object_vars($obj);
                		}
                	}else{
                		return null;
                	}
                	return $arr;
                }
     public function UpdateTable($tabla ,$data, $idPublicacion){
                	try {
                		$this->db->where('idPublicacion',$idPublicacion);
                		$this->db->update($tabla, $data);
                		return true;
                	} catch (Exception $e) {
                		return 'error';
                	}
                }

    public function getmapainicio(){
    $this->load->database();

	############### Continue generating Map XML #################

	//Create a new DOMDocument object
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers"); //Create new element node
	$parnode = $dom->appendChild($node); //make the node show up 

	// Select all the rows in the markers table
	
	$query1="SELECT * FROM publicaciones WHERE permiso = 1 AND 1 and status = 1";
	$results1 = $this->db->query($query1);
	$query="SELECT * FROM details_fields WHERE 1";
	$results = $this->db->query($query);
	if (!$results) {  
		header('HTTP/1.1 500 Error: Could not get markers!'); 
		exit();
	} 

	//set document header to text/xml
	header("Content-type: text/xml"); 

	// Iterate through the rows, adding XML nodes for each
	if($results->num_rows() > 0){
			
			 
				foreach($results1->result() as $obj1){
				$node = $dom->createElement("marker");  
					  $newnode = $parnode->appendChild($node); 	
				foreach($results->result() as $obj){
					$arr[] = get_object_vars($obj);
					$i = 0;
					  if ($obj1->idPublicacion == $obj->idPublicacion) {
					 
					  
					 
					  if ($obj->field_name == 'name') {  
					  $newnode->setAttribute("name",$obj->field_value);
					  }
					  if ($obj->field_name == 'address') {  
					  $newnode->setAttribute("address", $obj->field_value);  
					  }
					  if ($obj->field_name == 'lat') { 
					  $newnode->setAttribute("lat", $obj->field_value);
					  }
					  if ($obj->field_name == 'lng') {   
					  $newnode->setAttribute("lng", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'imagen1') {   
					  $newnode->setAttribute("photo", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'observacion') {   
                                            $newnode->setAttribute("observacion", $obj->field_value);  
                                            }
					  if ($i == 0) {
                                                $newnode->setAttribute("id", $obj1->idPublicacion);
					  	$newnode->setAttribute("type", $obj1->tipo_categoria);
					  }
					  	
					  $i++;
					}
				}
			}

			}else{
				return null;
			}
			return $dom->saveXML();
	
		
		
	}

	public function nueva_busqueda($data)
	{
		$this->load->database();

		
			

	################ Continue generating Map XML #################

	//Create a new DOMDocument object
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers"); //Create new element node
	$parnode = $dom->appendChild($node); //make the node show up 
		//definimos si descripción viene vacio o no para utilizar el operador and or
		
			
		$condiciones = array();
		
		//recorremos los campos del formulario
		foreach($data as $campo){
                    
                     if($campo['name'] == "moneda" && $campo['value'] !== '')
                     {
                        $moneda =  $campo['value'];
                     }
                    
                  if($campo['name'] == "precio1" && $campo['value'] !== '')
                        {
                      $precio1 = $campo['value'];
                    
                        }
                   if($campo['name'] == "precio2" && $campo['value'] !== '' && $campo['value'] !== '0')
                        {  
                      
                      if($moneda == 'colones'){
                      $condiciones[] = "t1.field_value = 'precio-colones' >= ".$precio1." AND 'precio-colones' <= ". $campo['value'] ."";
                      }
                      else{
                      $condiciones[] = "t1.field_value = 'precio-dolar' >= ".$precio1." AND 'precio-dolar' <= ". $campo['value'] ."";   
                      }
                        }      
                   if($campo['name'] == "address" && $campo['value'] !== '')
                        {
                        
                      $condiciones[] = "t1.field_value LIKE '%" . $campo['value'] . "%'";
                        
                        }
                        
                    if($campo['name'] == "tipo_categoria" && $campo['value'] !== '')
                        {
                        $t2 = TRUE;
                       $condiciones[] = "t2.tipo_categoria LIKE '%" . $campo['value'] . "%'";
                        
                        }
                    if($campo['name'] == "cantidad-banos" && $campo['value'] !== '')
                        {
                        
                       $condiciones[] = "t1.field_value LIKE '%" . $campo['value'] . "%'";
                        
                        }
                    if($campo['name'] == "cantidad-carros" && $campo['value'] !== '')
                        {
                        
                       $condiciones[] = "t1.field_value LIKE '%" . $campo['value'] . "%'";
                        
                        }
                    if($campo['name'] == "jardin" && $campo['value'] !== '')
                        {
                        
                      $condiciones[] = "t1.field_value LIKE '%" . $campo['value'] . "%'";
                        
                        }
                    if($campo['name'] == "cantidad-cuartos" && $campo['value'] !== '' && $campo['value'] !== '0')
                        {
                        
                      $condiciones[] = "t1.field_value LIKE '%" . $campo['value'] . "%'";
                        
                        }
			//si llegan las variables y no están vacias
		
			
		}
                $t2 = TRUE;
                    $condiciones[] = "t2.permiso = 1 AND t2.status = 1";
                if($t2){
                   $sql = 'SELECT * FROM details_fields AS t1 INNER JOIN publicaciones AS t2 ON t1.idPublicacion = t2.idPublicacion';
                   
                }	
		//la consulta base a la que concatenaremos la búsqueda
                else{
		$sql = "SELECT * FROM details_fields as t1";
                }
                
                
		//si existen condiciones entramos
		if(count($condiciones) > 0) 
		{
			
		    //aquí creamos la condición y la concatenamos a $query
                    $sql .= " WHERE " . implode(" AND ", $condiciones);
		   // $sql .= "WHERE " . implode ($and_or, $condiciones);
			
		}

		//asignamos a $query la consulta final
		$query = $this->db->query($sql);
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//; exit;
                
		
                
	
        
	//$results = $this->db->query($query1);
	

	//set document header to text/xml
	header("Content-type: text/xml"); 

	// Iterate through the rows, adding XML nodes for each
	if($query->num_rows() > 0){
        $i = 0; 
        $id = 0; 
        foreach($query->result() as $obj2){
       $arr[] = get_object_vars($obj2);
       $query1 = "SELECT * FROM details_fields where idPublicacion = ".$obj2->idPublicacion;
       if($id == $obj2->idPublicacion){
      $i++;
      }
      else{
      $i = 0;
      }
       $results1 = $this->db->query($query1);
       foreach($results1->result() as $obj1){
       if ($i == 0) {
       $node = $dom->createElement("marker");  
       $newnode = $parnode->appendChild($node);
       }
      if ($obj1->field_name == 'name') {  
      $newnode->setAttribute("name",$obj1->field_value);
      }
      if ($obj1->field_name == 'address') {  
      $newnode->setAttribute("address", $obj1->field_value);  
      }
      if ($obj1->field_name == 'lat') { 
      $newnode->setAttribute("lat", $obj1->field_value);
      }
      if ($obj1->field_name == 'lng') {   
      $newnode->setAttribute("lng", $obj1->field_value);  
      }
      if ($obj1->field_name == 'imagen1') {   
        $newnode->setAttribute("photo", $obj1->field_value);  
        }
      if ($obj1->field_name == 'observacion') {   
        $newnode->setAttribute("observacion", $obj1->field_value);  
        }
      if ($i == 0) {
          $id = $obj2->idPublicacion;
            $newnode->setAttribute("id", $obj2->idPublicacion);
            $newnode->setAttribute("type", $obj2->tipo_categoria);
            $i++;
      }
     
       }
 }
			}else{
				return null;
			}
			return $dom->saveXML();



		//si se ha encontrado algo 
	
		
	}
        
          
         public function selectJoinPropiedades($table1){
                      
                	$sql = "select * from {$table1} as t1 left join publicaciones as t2  on t1.idPublicacion = t2.idPublicacion join publicaciones_marcadas as t3 on t3.idPublicacion = t1.idPublicacion  where permiso = 1 AND status = 1" ;
                        
                	$query = $this->db->query($sql);
                
                
	                $arr=null;
	                if($query->num_rows() > 0){
	                	foreach($query->result() as $obj){
	                		$arr[] = get_object_vars($obj);
	                	}
	                }else{
	                	return null;
	                }
	                return $arr;
                }
                
                
                
                public function getmapainicioadmin(){
    $this->load->database();

	############### Continue generating Map XML #################

	//Create a new DOMDocument object
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers"); //Create new element node
	$parnode = $dom->appendChild($node); //make the node show up 

	// Select all the rows in the markers table
        $idUsuario =  $this->session->userdata('idUsuario');
                   $query1="SELECT * FROM publicaciones AS t1 RIGHT JOIN publicaciones_marcadas AS t2 ON t1.idPublicacion = t2.idPublicacion where permiso = 1 AND status = 1 AND  idUsuario =  ". $idUsuario;

	//$query1="SELECT * FROM publicaciones WHERE 1 and status = 1";
        
	$results1 = $this->db->query($query1);
	$query="SELECT * FROM details_fields WHERE 1";
	$results = $this->db->query($query);
	if (!$results) {  
		header('HTTP/1.1 500 Error: Could not get markers!'); 
		exit();
	} 

	//set document header to text/xml
	header("Content-type: text/xml"); 

	// Iterate through the rows, adding XML nodes for each
	if($results->num_rows() > 0){
			
			 
				foreach($results1->result() as $obj1){
				$node = $dom->createElement("marker");  
					  $newnode = $parnode->appendChild($node); 	
				foreach($results->result() as $obj){
					$arr[] = get_object_vars($obj);
					$i = 0;
					  if ($obj1->idPublicacion == $obj->idPublicacion) {
					 
					  
					 
					  if ($obj->field_name == 'name') {  
					  $newnode->setAttribute("name",$obj->field_value);
					  }
					  if ($obj->field_name == 'address') {  
					  $newnode->setAttribute("address", $obj->field_value);  
					  }
					  if ($obj->field_name == 'lat') { 
					  $newnode->setAttribute("lat", $obj->field_value);
					  }
					  if ($obj->field_name == 'lng') {   
					  $newnode->setAttribute("lng", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'imagen1') {   
					  $newnode->setAttribute("photo", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'observacion') {   
                                            $newnode->setAttribute("observacion", $obj->field_value);  
                                            }
					  if ($i == 0) {
                                                $newnode->setAttribute("id", $obj1->idPublicacion);
					  	$newnode->setAttribute("type", $obj1->tipo_categoria);
					  }
					  	
					  $i++;
					}
				}
			}

			}else{
				return null;
			}
			return $dom->saveXML();
	
		
		
	}

        
        
            public function getmapainicioadminno(){
    $this->load->database();

	############### Continue generating Map XML #################

	//Create a new DOMDocument object
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers"); //Create new element node
	$parnode = $dom->appendChild($node); //make the node show up 

	// Select all the rows in the markers table
                //   $query1="SELECT * FROM publicaciones AS t1 RIGHT JOIN publicaciones_marcadas AS t2 ON t1.idPublicacion = t2.idPublicacion where status = 1";
        $idUsuario =  $this->session->userdata('idUsuario');
	$query1="SELECT * FROM publicaciones WHERE usuarios_idUsuario = ".$idUsuario." and permiso = 1 and status = 1";
        
	$results1 = $this->db->query($query1);
	$query="SELECT * FROM details_fields WHERE 1";
	$results = $this->db->query($query);
	if (!$results) {  
		header('HTTP/1.1 500 Error: Could not get markers!'); 
		exit();
	} 

	//set document header to text/xml
	header("Content-type: text/xml"); 

	// Iterate through the rows, adding XML nodes for each
	if($results->num_rows() > 0){
			
			 
				foreach($results1->result() as $obj1){
				$node = $dom->createElement("marker");  
					  $newnode = $parnode->appendChild($node); 	
				foreach($results->result() as $obj){
					$arr[] = get_object_vars($obj);
					$i = 0;
					  if ($obj1->idPublicacion == $obj->idPublicacion) {
					 
					  
					 
					  if ($obj->field_name == 'name') {  
					  $newnode->setAttribute("name",$obj->field_value);
					  }
					  if ($obj->field_name == 'address') {  
					  $newnode->setAttribute("address", $obj->field_value);  
					  }
					  if ($obj->field_name == 'lat') { 
					  $newnode->setAttribute("lat", $obj->field_value);
					  }
					  if ($obj->field_name == 'lng') {   
					  $newnode->setAttribute("lng", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'imagen1') {   
					  $newnode->setAttribute("photo", $obj->field_value);  
					  }
                                          if ($obj->field_name == 'observacion') {   
                                            $newnode->setAttribute("observacion", $obj->field_value);  
                                            }
					  if ($i == 0) {
                                                $newnode->setAttribute("id", $obj1->idPublicacion);
					  	$newnode->setAttribute("type", $obj1->tipo_categoria);
					  }
					  	
					  $i++;
					}
				}
			}

			}else{
				return null;
			}
			return $dom->saveXML();
	
		
		
	}
        public function selectfavorita($table,$idUser){
                	//$sql = "SELECT * FROM " .$table." where idUsuario = ".$idUser."" ;
                        $sql = "SELECT   *
    FROM details_fields INNER JOIN publicaciones 
            ON details_fields.idPublicacion = publicaciones.idPublicacion
         INNER JOIN {$table} 
            ON details_fields.idPublicacion = {$table}.idPublicacion where idUsuario = ".$idUser." AND permiso = 1 AND status = 1" ;
                	
                        $query = $this->db->query($sql);

                	$arr=null;
                	if($query->num_rows() > 0){
                		foreach($query->result() as $obj){
                		$arr[] = get_object_vars($obj);
	                	}
	                }else{
	                	return null;
	                }
	                return $arr;
                }

}
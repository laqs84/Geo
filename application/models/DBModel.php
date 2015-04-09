<?php


	class DBModel extends CI_Model{

		var $limite=17;
		public function __construct(){
			parent::__construct();         
                        $this->load->database();
                        date_default_timezone_set('America/Los_Angeles');
		}

		public function insert($tabla, $columnas, $valores, $condicion){
			
			$query="";
			if( $condicion !=""){
				$query="INSERT INTO $tabla ($columnas) VALUES($valores) WHERE($condicion)";
				$this->db->query($query);
			}else{
			    $query="INSERT INTO $tabla ($columnas) VALUES($valores)";
				$this->db->query($query);
			}
			
			$filas = $this->db->affected_rows();
			return $filas;
		}

		public function select($tabla, $valores, $condicion, $pagina){
			//
			//
			//pagination
			$desde = ceil($pagina)*$this->limite;

			$query="";
			if(!$condicion==""){
				$query="SELECT $valores FROM $tabla WHERE($condicion) LIMIT $desde, $this->limite";
				$query = $this->db->query($query);
			}else{
				$query="SELECT $valores FROM $tabla LIMIT $desde, $this->limite";
				$query = $this->db->query($query);
			}

			//TOTAL COUNT
			if(!$condicion==""){
				$query2="SELECT COUNT(*) AS 'total' FROM $tabla WHERE($condicion)";
				$query2 = $this->db->query($query2);
			}else{
				$query2="SELECT COUNT(*) AS 'total' FROM $tabla ";
				$query2 = $this->db->query($query2);
			}

			$arr=null;
			//LIMIT
			if($query->num_rows() > 0){
				foreach($query->result() as $obj){
					$arr[] = $obj;
				}
			}else{
				return null;
			}

			//COUNT
			if($query2->num_rows() > 0){
				$obj = $query2->result();
				$obj = get_object_vars($obj[0]);
				$obj = $obj['total'];
				$total = ceil($obj/$this->limite);
				$total = array('total'=>$total);
				array_push($arr, $total);
			}else{
				return null;
			}

			return $arr;
		}
		public function select_last($tabla, $valores, $condicion, $orden){
			
			$query="";
			if(!$condicion==""){
				$query="SELECT $valores FROM $tabla WHERE($condicion) ORDER BY $orden DESC LIMIT 1";
				$query = $this->db->query($query);
			}else{
				$query="SELECT $valores FROM $tabla ORDER BY $orden DESC LIMIT 1";
				$query = $this->db->query($query);
			}

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


		public function select_by_order($tabla, $valores, $condicion, $orden, $pagina){
			//
			//
			//pagination
			$desde = ceil($pagina)*$this->limite;
			$query="";
			if(!$condicion==""){
				$query="SELECT DISTINCT $valores FROM $tabla WHERE($condicion) ORDER BY $orden ASC LIMIT $desde, $this->limite";
				$query = $this->db->query($query);
			}else{
				$query="SELECT $valores FROM $tabla ORDER BY $orden ASC LIMIT $desde, $this->limite";
				$query = $this->db->query($query);
			}

			//TOTAL COUNT
			if(!$condicion==""){
				$query2="SELECT COUNT(*) AS 'total' FROM $tabla WHERE($condicion)";
				$query2 = $this->db->query($query2);

			}else{
				$query2="SELECT COUNT(*) AS 'total' FROM $tabla ";
				$query2 = $this->db->query($query2);
			}
			
		
			$arr=null;
			//LIMIT
			if($query->num_rows() > 0){
				foreach($query->result() as $obj){
					$arr[] = get_object_vars($obj);
				}
			}else{
				return null;
			}

			//COUN
			if($query2->num_rows() > 0){
				$obj = $query2->result();
				$obj = get_object_vars($obj[0]);
				$obj = $obj['total'];
				$total = ceil($obj/$this->limite);
				$total = array('total'=>$total);
				array_push($arr, $total);
			}else{
				return null;
			}

			return $arr;

		}
		public function select_all($tabla, $valores, $condicion, $orden){
		
			$query="";
			if(!$condicion==""){
				$query="SELECT $valores FROM $tabla WHERE($condicion) ORDER BY $orden ASC";
				$query = $this->db->query($query);
			}else{
				$query="SELECT $valores FROM $tabla ORDER BY $orden ASC";
				$query = $this->db->query($query);
			}

			
			$arr=null;
			//LIMIT
			if($query->num_rows() > 0){
				foreach($query->result() as $obj){
					$arr[] = get_object_vars($obj);
				}
			}else{
				return null;
			}

			return $arr;
		}

		public function update($tabla, $valores, $condicion){
			try {
                		$this->db->where($condicion);
                		$this->db->update($tabla, $valores);
                		return true;
                	} catch (Exception $e) {
                		return 'error';
                	}

		}

		public function delete($tabla, $condicion){
			$query="DELETE FROM $tabla WHERE  $condicion";
			$this->db->query($query);
			$errtxt = $this->db->_error_message();
			$errno = $this->db->_error_number();			
			$filas = $this->db->affected_rows();
			if ($errno == 1451) {
				return "Error";
			}else{
				return $filas;
			}
		}
                
                public function deletefavorito1($condicion){
			$query="DELETE FROM publicaciones_marcadas WHERE idMarcadas = $condicion";
			$this->db->query($query);
			$filas = $this->db->affected_rows();
			if (!$filas) {
				return "Error";
			}else{
				return TRUE;
			}
		}

		public function count($tabla, $condicion){

			$query="";
                        if ($condicion== 'visitas'){
                           $query=" SELECT publicaciones_marcadas.*, COUNT(*) AS total_com 
                                    FROM publicaciones_marcadas 
                                    LEFT JOIN publicaciones 
                                    ON publicaciones_marcadas.idPublicacion=publicaciones.idPublicacion 
                                    GROUP BY publicaciones_marcadas.idPublicacion  ";
                           $query = $this->db->query($query);
                        }
			else if(!$condicion==""){
				$query="SELECT COUNT(*) AS 'count' FROM $tabla WHERE($condicion)";
				$query = $this->db->query($query);
			}else{
				$query="SELECT COUNT(*) AS 'count' FROM $tabla";
				$query = $this->db->query($query);
			}

			
			$arr=null;
			//LIMIT
			if($query->num_rows() > 0){
				$arr = $query->result();
				
				if ($condicion== 'visitas'){
                                
                                    return $arr;
                                }
                                else{
                                    $arr = get_object_vars($arr[0]);
                                return $arr['count'];
                                }
			}else{
				return null;
			}

			
		}
		
		
                
                public function InsertTable($tabla,$data) {
                    try {
                        $this->db->insert($tabla, $data); 
                        return $this->db->insert_id();;
                    } catch (Exception $exc) {
                        return 'error';
                    }
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
                
                public function UpdateFieldPublicacion($field_value,$field_name, $idPublicacion, $price=''){
                	
                	if(empty($price)){
                		$query="UPDATE details_fields SET field_value = '$field_value' WHERE field_name = '$field_name' and idPublicacion = $idPublicacion  ";
                	}
                	else{
                		$query="UPDATE details_fields SET field_value = '$field_value',newPrice=$price  WHERE field_name = '$field_name' and idPublicacion = $idPublicacion  ";
                	}
                	
                	$this->db->query($query);
                	$filas = $this->db->affected_rows();
                	return $filas;
				
                }
                
                public function selectPublicaciones($table,$idUser){
                	$sql = "SELECT * FROM " .$table." where  usuarios_idUsuario = ".$idUser.";" ;
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
                
                public function selectPublicacionesadmin($table){
                	$sql = "SELECT * FROM " .$table."" ;
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
                public function selectfavorita($table,$idUser, $idPublicacion){
                	$sql = "SELECT * FROM " .$table." where idUsuario = ".$idUser." AND idPublicacion = {$idPublicacion};" ;
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
                
                public  function selectDetailsPublicacion($table,$idPublicacion)
                {
                	$sql = "SELECT *
                				FROM {$table}
                						where idPublicacion = {$idPublicacion}	ORDER BY FIELD(field_name, 'imagen1', 'imagen2', 'imagen3', 'imagen4', 'imagen5') ASC;" ;
                                                                
                                                                
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
                
                public function selectPublicacion($table,$idPublicacion){
                	$sql = "SELECT * FROM " .$table." where idPublicacion = ".$idPublicacion.";" ;
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
                
                public function selectuser($table,$idUsuario){
                	$sql = "SELECT * FROM " .$table." where idUsuario = ".$idUsuario.";" ;
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
                
                
                
                public function selectJoinPublicaciones($table1,$table2,$idUser){
                	$sql = "SELECT *
							FROM {$table1} T1
							INNER JOIN {$table2} T2 ON T1.idPublicacion = T2.idPublicacion
                			where T2.idUsuario = {$idUser} AND T1.permiso = 1 AND T1.status = 1	;" ;
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
            public function delete_file($file_id)
            {
                $file = $this->get_file($file_id);
                if (!$this->db->where('idField', $file_id)->delete('details_fields'))
                {
                    return FALSE;
                }
                unlink('./files/' . $file->field_value);    
               switch ($file->field_name)
                {
                case 'imagen2':
                    $image3 = $this->imagen3($file);
                    if(!empty($image3)){
                  $this->db->set('field_name','imagen2')
                    ->where('idField', $image3->idField)
                   ->update('details_fields');
                    }
                    $image4 = $this->imagen4($file);
                    if(!empty($image4)){
                    $this->db->set('field_name','imagen3')
                    ->where('idField', $image4->idField)
                   ->update('details_fields');
                    }
                    $image5 = $this->imagen5($file);
                    if(!empty($image5)){
                    $this->db->set('field_name','imagen4')
                    ->where('idField', $image5->idField)
                   ->update('details_fields');
                    
                    
                    }
                    
                  break;
                case 'imagen3':
                  $image4 = $this->imagen4($file);
                    if(!empty($image4)){
                    $this->db->set('field_name','imagen3')
                    ->where('idField', $image4->idField)
                   ->update('details_fields');
                    }
                    $image5 = $this->imagen5($file);
                    if(!empty($image5)){
                    $this->db->set('field_name','imagen4')
                    ->where('idField', $image5->idField)
                   ->update('details_fields');
                    
                    
                    }
                  break;
                case 'imagen4':
                    $image5 = $this->imagen5($file);
                    if(!empty($image5)){
                    $this->db->set('field_name','imagen4')
                    ->where('idField', $image5->idField)
                   ->update('details_fields');
                    
                    
                    }   
                  break;
              
                
                }
                
                return TRUE;
            }

            public function get_file($file_id)
            {
                return $this->db->select()
                        ->from('details_fields')
                        ->where('idField', $file_id)
                        ->get()
                        ->row();
            }
           public function imagen3($file) {
                return $this->db->select()
                        ->from('details_fields')
                    ->where('field_name','imagen3')
                    ->where('idPublicacion', $file->idPublicacion)
                        ->get()
                        ->row();
            }
           public function imagen4($file) {
                return $this->db->select()
                        ->from('details_fields')
                    ->where('field_name','imagen4')
                    ->where('idPublicacion', $file->idPublicacion)
                        ->get()
                        ->row();
            }
           public function imagen5($file) {
                return $this->db->select()
                    ->from('details_fields')
                    ->where('field_name','imagen5')
                    ->where('idPublicacion', $file->idPublicacion)
                        ->get()
                        ->row();
            }
            
            public function selectJoinPropiedades($table1){
                	$sql = "SELECT * FROM {$table1} AS t1 INNER JOIN publicaciones AS t2 ON t1.idPublicacion = t2.idPublicacion where permiso = 1 AND status = 1" ;
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
?>
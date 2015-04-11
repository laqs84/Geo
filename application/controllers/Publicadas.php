<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicadas extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
               $this->load->helper(array('form','url','date','html'));
               $this->load->model('DBModel');
               $this->load->library('session');
	}
	
	public function publicacion()
	{
		$idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Publicaciones";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Mis Publicaciones";
			$data["publicaciones"] = $this->DBModel->selectPublicaciones('publicaciones',$this->session->userdata('idUsuario'));
			$this->load->view('misVentas/publicaciones', $data);
		}
		else {
			redirect(base_url().'index.php/Login/adminuser');
		}
		
	}
	
	
	public function editar($id)
	{
		$idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
			$this->session->set_userdata('idPublicacion',$id);
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Mis Publicaciones";
                        $data["dondeestoy"] = "Publicaciones";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $useractivo = $publicacion[0]['usuarios_idUsuario'];
                        if($useractivo != $idUsuario){
                          $data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                    $data['nopuede'] = 'Usted no es el dueño de esta propiedad';
                     $this->load->view('publicaciones/desactiva', $data); 
                       }
			$fields= $this->DBModel->selectDetailsPublicacion('details_fields',$id);
                        foreach ($fields as $value ){
                        if($value['field_name'] == "imagen1" && $value['field_value'] != ''){ $count = 1;} 
                        if($value['field_name'] == "imagen2" && $value['field_value'] != ''){ $count = 2;} 
                        if($value['field_name'] == "imagen3" && $value['field_value'] != ''){ $count = 3;} 
                        if($value['field_name'] == "imagen4" && $value['field_value'] != ''){ $count = 4;} 
                        if($value['field_name'] == "imagen5" && $value['field_value'] != ''){ $count = 5;}


                     }
                        $data['count'] = $count;
			array_unshift($fields, array('field_name'=>'tiempo','field_value'=>$publicacion[0]['tiempo']  ));
			$data["publicacion"] = array_merge ( $fields ,$publicacion );
			if($publicacion[0]['tipo_categoria'] == "remate"){
				$this->load->view('misVentas/editar-remate', $data);
			}else{
				$this->load->view('misVentas/editar', $data);
			}
		}
		else {
			redirect(base_url().'index.php/Login/adminuser');
		}
		
	}
    
	
	public function show($id){
		       
                $idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
                
                
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                        if($status == 0){
                            $this->load->view('publicaciones/desactiva', $data);
                        }
                        else {
			$fields= $this->DBModel->selectDetailsPublicacion('details_fields',$id);
                        
                        $idUsuario =  $this->session->userdata('idUsuario');
                        $userid = $publicacion[0]['usuarios_idUsuario'];
                        $idpublicacion = $id;
                        $usercontacto =  $this->DBModel->selectuser('usuarios',$userid);
                        if(!empty($idUsuario)){
                        $favorita =  $this->DBModel->selectfavorita('publicaciones_marcadas',$idUsuario,$id);
                        $data['favorita'] = $favorita;
                        $data['idpublicacion'] = $idpublicacion;
                        }
                        foreach ($fields as $value ){
                        if($value['field_name'] == "imagen1"){ $count = 1;} 
                        if($value['field_name'] == "imagen2"){ $count = 2;} 
                        if($value['field_name'] == "imagen3"){ $count = 3;} 
                        if($value['field_name'] == "imagen4"){ $count = 4;} 
                        if($value['field_name'] == "imagen5"){ $count = 5;}
                        if($value['field_name'] == "name"){$titulo = $value['field_value'];}
                        
                     }
                        $data['count'] = $count;
                        $data['usercontacto'] = $usercontacto;
                        $data['verporpiedad'] = 'si';
                        $data['titulo'] = $titulo;
			array_unshift($fields, array('field_name'=>'tiempo','field_value'=>$publicacion[0]['tiempo']  ));
			$data["publicacion"] = array_merge ( $fields ,$publicacion );
                        
			if($publicacion[0]['tipo_categoria'] == "remate"){
				$this->load->view('publicaciones/show-remate', $data);
			}else{
				$this->load->view('publicaciones/show', $data);
			}
                        }
                }
                else {
                    $data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                    $data['nopuede'] = 'Usted no esta con una sesion activa, Si quiere ver alguna propiedad, puede crear una cuenta con nosotros o si ya tiene una cuenta con nosotros puede iniciar sesión';
                     $this->load->view('publicaciones/desactiva', $data);
                }
	}
        
	
    public function propiedades()
        {
            $data["dondeestoy"] = "compra";
	    $this->load->helper(array('form','url','date','html'));
	    $data["title"] = "GeoValores";
	    $data["title_page"] = "Publicaciones";
	    $data["publicaciones"] = $this->DBModel->selectJoinPropiedades('details_fields');
            
	    $this->load->view('publicaciones/propiedades', $data);
        }
    public function favorito()
	{
		$idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Favoritos";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Mis Favoritos";
                        $this->load->model('InicioModel');
                        $favorita =  $this->InicioModel->selectfavorita('publicaciones_marcadas',$idUsuario);
                        $data['favorita'] = $favorita;
			
			$this->load->view('misVentas/favoritos', $data);
		}
		else {
			redirect(base_url().'index.php/Login/adminuser');
		}
		
	}
	
	
	
	public function saveInfoEditada() {
		$this->load->model('DBModel');
		$data = $_POST['data'];
		$idPublicacion = $_POST['idPublicacion'];
		$price_old = '';
		
		$array_data = array();
		$array_publicacion = array();
               
		$c=0;
		foreach ( $data as $dat)
		{
			if($dat['name'] == "tipo_categoria" || $dat['name'] == "tiempo")
			{
				$array_publicacion[$dat['name']] =  $dat['value'];
			}
			else
			{
				if($dat['name'] !== "idPublicacion"){
					if($dat['name'] !== "precio-old"){
						$array_data[$dat['name']] = $dat['value'];
					}
					else{
						$price_old = $dat['value'];
					}
					
					
				}
				
			}
			$c++;
		}
		$array_publicacion['usuarios_idUsuario'] =  $this->session->userdata('usuario_id');
		$array_publicacion['date_publicacion'] = date('Y-m-d H:i:s');
	
		$publicacion = $this->DBModel->UpdateTable('publicaciones',$array_publicacion,$idPublicacion );
		$msj = '';
		if($publicacion !== 'error'){
			foreach ($array_data as $key => $value) {
                            
				try {
					if($value == 'precio-colones'){
						
						if($price_old > $key){ //precio mayor se guarda 1
							$this->DBModel->UpdateFieldPublicacion($value,$key, $idPublicacion, 1);
						}
						else if ($price_old < $key) {// precio menor se guarda 0
							$this->DBModel->UpdateFieldPublicacion($value,$key, $idPublicacion, 0);
						}
						else{// se guarda normal
							$this->DBModel->UpdateFieldPublicacion($value,$key, $idPublicacion);
						}
						
					}
					else{
						$this->DBModel->UpdateFieldPublicacion($value,$key, $idPublicacion);
					}
					
				} catch (Exception $exc) {
					$msj = false;
				}
				$msj = true;
			}
		}else{
			echo false;
		}
	
		if($msj == true){
			echo true;
		}else{
			echo false;
		}
	}
	
public function delete_file()
{
    $file_id = $_POST['data'];
    if ($this->DBModel->delete_file($file_id))
    {
        $status = 'success';
        $msg = 'Imagen eliminado correctamente';
        
        
    }
    else
    {
        $status = 'error';
        $msg = 'Algo salió mal al borrar la imagen, por favor, inténtalo de nuevo';
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}	



public function agregarfavorito()
{
    $iduser = $_POST['data'];
    $idpublicacion = $_POST['data1'];
   
    $data = array('idUsuario' => $iduser, 'idPublicacion' => $idpublicacion);
    if ($this->DBModel->InsertTable("publicaciones_marcadas",$data))
    {
        $status = 'success';
        $msg = 'Esta propiedad es parte de sus favoritas';
        
        
    }
    else
    {
        $status = 'error';
        $msg = 'Algo salió mal al agregar a sus favoritas, por favor, inténtalo de nuevo';
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}


public function deletefavorito()
{
    $file_id = $_POST['data'];
    if ($this->DBModel->deletefavorito1($file_id))
    {
        $status = 'success';
        $msg = 'Ya no esta sus favoritos';
        
        
    }
    else
    {
        $status = 'error';
        $msg = 'Algo salió mal al borrar el favorito, por favor, inténtalo de nuevo';
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}

public function cambiarestado(){
    $tabla = "publicaciones";
    $idPublicacion = $_POST['idpublicar'];
    $data = array (
      'status' => $_POST['data'],
   
    );
    if( $this->DBModel->UpdateTable($tabla ,$data, $idPublicacion))
     {
        $status = 'success';
        $msg = 'Ya se cambio la propiedad'.$_POST['data'];
        
        
    }
    else
    {
        $status = 'error';
        $msg = 'Algo salió mal al cambiar la propiedad, por favor, inténtalo de nuevo';
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}

public function cfecha(){
    $tabla = "publicaciones";
    $idPublicacion = $_POST['data'];
    $data = array (
      'status' => 1,
      'date_publicacion' => date("Y-m-d H:i:s")
   
    );
     $this->DBModel->UpdateTable($tabla ,$data, $idPublicacion);
}

public function exito($id){
		       
                $idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
                
                
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                        $useractivo = $publicacion[0]['usuarios_idUsuario'];
                       if($useractivo != $idUsuario){
                          $data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                    $data['nopuede'] = 'Usted no es el dueño de esta propiedad';
                     $this->load->view('publicaciones/desactiva', $data); 
                       }
			$fields= $this->DBModel->selectDetailsPublicacion('details_fields',$id);
                        
                        $idUsuario =  $this->session->userdata('idUsuario');
                        $userid = $publicacion[0]['usuarios_idUsuario'];
                        $idpublicacion = $id;
                        $usercontacto =  $this->DBModel->selectuser('usuarios',$userid);
                        if(!empty($idUsuario)){
                        $favorita =  $this->DBModel->selectfavorita('publicaciones_marcadas',$idUsuario,$id);
                        $data['favorita'] = $favorita;
                        $data['idpublicacion'] = $idpublicacion;
                        }
                        foreach ($fields as $value ){
                        if($value['field_name'] == "imagen1"){ $count = 1;} 
                        if($value['field_name'] == "imagen2"){ $count = 2;} 
                        if($value['field_name'] == "imagen3"){ $count = 3;} 
                        if($value['field_name'] == "imagen4"){ $count = 4;} 
                        if($value['field_name'] == "imagen5"){ $count = 5;}
                        if($value['field_name'] == "name"){$titulo = $value['field_value'];}
                        
                     }
                        $data['count'] = $count;
                        $data['usercontacto'] = $usercontacto;
                        $data['verporpiedad'] = 'si';
                        $data['titulo'] = $titulo;
			array_unshift($fields, array('field_name'=>'tiempo','field_value'=>$publicacion[0]['tiempo']  ));
			$data["publicacion"] = array_merge ( $fields ,$publicacion );
                        
			if($publicacion[0]['tipo_categoria'] == "remate"){
				$this->load->view('publicaciones/show-remate', $data);
			}else{
				$this->load->view('exito', $data);
			}
                        
                }
                else {
                    $data["title"] = "GeoValores";
			$data["title_page"] = "Publicacion".$id;
                        $data["dondeestoy"] = "compra";
			$publicacion =  $this->DBModel->selectPublicacion('publicaciones',$id);
                        $status = $publicacion[0]['status'];
                    $data['nopuede'] = 'Usted no esta con una sesion activa, Si quiere ver alguna propiedad, puede crear una cuenta con nosotros o si ya tiene una cuenta con nosotros puede iniciar sesión';
                     $this->load->view('publicaciones/desactiva', $data);
                }
	}
}
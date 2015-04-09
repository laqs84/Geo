<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Administrador extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
               $this->load->helper(array('form','url','date','html'));
               $this->load->model('LoginSuperModel');
               $this->load->library('session');
	}
	
	public function index()
	{
		$usuario = $this->session->userdata('idUsuariosuper');
        	
        	if(empty($usuario)){
        		 
        		redirect(base_url().'index.php/Administrador/login');
        	}
		$data["dondeestoy"] = "Inicio";
		$data['title'] = 'Bienvenido Administrador';
		$this->load->view('administrador',$data);
	}
        
        public function new_user()
	{
	
         @$nick = $_POST['username'];
         if (empty($nick)){
           $nick =  $this->input->post('username');
         }
         @$clave = $_POST['password'];
         if (empty($clave)){
           $clave =  $this->input->post('password');
         }
        
 
        
        
        if( !empty($nick) && !empty($clave) ) {
		
			//$this->load->model('loginmodel'); // carregamos o model
			$pass = sha1($clave);
			$verifica = $this->LoginSuperModel->login_user($nick, $pass);
			
			if(!empty($verifica)) {
			
				 foreach ( $verifica as $key => $dat)
                                    {
                                        if($key == 'nombre')
                                        { $user =  $dat; } 

                                        if($key == 'idusers')
                                        { $user_id =  $dat; } 



                                    }
            
                                    $this->session->set_userdata('usuariosuper_name',$user); 
                                    $this->session->set_userdata('usuariosuper_id',$user_id); 
				$status = 'Bienviendo';
                                $msg = 'Bienviendo';
			       echo json_encode(array('status' => $status, 'msg' => $msg));
				//redirect(base_url().'index.php/Login/adminuser');
			
			} else {
			
			$status = 0;
                        $msg = 'Este usuario o esta clave no esta en nuestra base de datos';
			echo json_encode(array('status' => $status, 'msg' => $msg));
			
			}   
			
		} else {
                        $status = 0;
                        $msg = 'El camnpo del usuario o el campo de la clave estan vacios';
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}
            
        }
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/Administrador/login');
	}
        public function login () {
            $data['title'] = 'Bienvenido Administrador';
	    $this->load->view('superlogin',$data);
        }
        public function propiedades () {
            $idUsuario =  $this->session->userdata('idUsuariosuper');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Publicaciones";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Publicaciones";
                        $this->load->model('DBModel');
			$data["publicaciones"] = $this->DBModel->selectPublicacionesadmin('publicaciones');
			$this->load->view('publicaciones', $data);
		}
		else {
			redirect(base_url().'index.php/Administrador/login');
		}
        }
        public function cambiarestado(){
    $tabla = "publicaciones";
    $idPublicacion = $_POST['idpublicar'];
    $data = array (
      'permiso' => $_POST['data'],
   
    );
     $this->load->model('DBModel');

    if ( $this->DBModel->UpdateTable($tabla ,$data, $idPublicacion))
      {
        $status = 'success';
        $msg = 'Ya se cambio la propiedad';
        
        
    }
    else
    {
        $status = 'error';
        $msg = 'Algo salió mal al cambiar la propiedad, por favor, inténtalo de nuevo';
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}
public function usuarios () {
            $idUsuario =  $this->session->userdata('idUsuariosuper');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Usuarios";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Usuarios";
                        $this->load->model('DBModel');
			$data["publicaciones"] = $this->DBModel->selectPublicacionesadmin('usuarios');
			$this->load->view('usuarios', $data);
		}
		else {
			redirect(base_url().'index.php/Administrador/login');
		}
        }
        
      public function visitas () {
            $idUsuario =  $this->session->userdata('idUsuariosuper');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Visitas";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Visitas de las publicaciones";
                        $this->load->model('DBModel');
			$data["publicaciones"] = $this->DBModel->count('publicaciones_marcadas', 'visitas');
			$this->load->view('visitas', $data);
		}
		else {
			redirect(base_url().'index.php/Administrador/login');
		}
        }
        public function prueba() {
         
            $data["dondeestoy"] = "Remates";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Remates";

            $this->load->view('prueba', $data);
        }
}

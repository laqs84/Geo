<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('LoginModel');
                $this->load->library(array('session','form_validation','email'));
                $this->load->helper(array('form','url','date','html'));
		
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
			$verifica = $this->LoginModel->login_user($nick, $pass);
			
			if(!empty($verifica)) {
			
				 foreach ( $verifica as $key => $dat)
                                    {
                                        if($key == 'nombre')
                                        { $user =  $dat; } 

                                        if($key == 'idUsuario')
                                        { $user_id =  $dat; } 



                                    }
            
                                    $this->session->set_userdata('usuario_name',$user); 
                                    $this->session->set_userdata('usuario_id',$user_id); 
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
		redirect(base_url().'index.php');
	}
        
        public function adminuser()
	{
                $bienvenida = $this->session->userdata('bienvenida');  
                if (empty($bienvenida)) {
                    $i = 0;
                }
                else {$i = 1;}
                
                if ($i == 0){
                $title['bienvenida'] = TRUE;
                $i = 1;
                $this->session->set_userdata('bienvenida', $i);
                }
                else {
                    $title['bienvenida'] = FALSE;
                }
		$title['title'] = 'Bienvenido Administrador';
                $title["dondeestoy"] = "admin";
		$this->load->view('admin',$title);
	}
        public function olvidoclave() {
                $title['title'] = 'Bienvenido Administrador';
                $title["dondeestoy"] = "olvidoclave";
		$this->load->view('olvidoclave',$title);
        }
        
       public function doforget()
	{
		$this->load->helper('url');
		$email= $_POST['email'];
                $q = $this->LoginModel->userreset($email);
		//$q = $this->db->query("select * from usuarios where correo='" . $email . "'");
        if ($q) {
             
		$ver	= $this->resetpassword($q);
			
			//redirect('/index.php/login/forget?info=' . $info, 'refresh');
                        
                         $msg = "Contraseña se ha restablecido y se ha enviado a email: ". $ver;
                         $status = 'success';
                         echo json_encode(array('status' => $status, 'msg' => $msg));
                        
        }
        else{

		
                         
                         $msg = "El correo electrónico de identificación que no se hayan registrado encontrado en nuestra base de datos";
                         $status = 'error';
                          echo json_encode(array('status' => $status, 'msg' => $msg));
                
        }
	}
        
        
        private function resetpassword($user)
	{
		date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password= random_string('alnum', 16);
		$this->db->where('idUsuario', $user->idUsuario);
		$this->db->update('usuarios',array('pass'=>  sha1($password)));
		
                 
                     
   // $this->email->set_newline("\r\n");
           $body = '<table width="600" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                      <td style="text-align: center;" width="600">
                      <img src="http://www.geovalores.com/images/logo.png">
                        <h2>Restablecimiento de contraseña</h2>
                        <p>Ha solicitado la nueva contraseña, aquí está tu nueva contraseña:'. $password.'</p>
                      </td>
                    </tr>
                  </table>';    
                
        //cargamos la configuración para enviar con gmail
        
		
		//indicamos las cabeceras del correo
 $this->load->library("email");
 
                        //configuracion para gmail
                        $configGmail = array(
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'laqs84@softteca.com',
                            'smtp_pass' => 'Andresing2012',
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'newline' => "\r\n"
                        );    
 
                        //cargamos la configuración para enviar con gmail
                        $this->email->initialize($configGmail);
                        // Datos para enviar el correo
			$this->email->from('laqs84@softteca.com');
                        $this->email->set_newline("\r\n");  
			$this->email->to($user->correo);
			$this->email->subject('Restablecimiento de contraseña');				
			$this->email->message($body); 
//
	
			if($this->email->send()){
                        $status = 'success';
                       
			return $user->correo;
			 }else{
			 
                         $status = 'error';
                         return $status;
			 
			 } 
	} 
}

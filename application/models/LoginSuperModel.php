<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class LoginSuperModel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
		$this->db->where('user_name',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		if($query->num_rows() == 1)
		{
			$usuario = $query->row();
			$this->session->set_userdata('usuariosuper',TRUE);
			$this->session->set_userdata('idUsuariosuper',$usuario->idusers);
                       // $this->session->set_userdata('correo',$usuario->correo);
                        $query->result();
			return $usuario ;
                        
		}
                else {
                    $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
                    return FALSE;
		}
	}
        public function userreset($email)
	{
                $this->db->where('correo',$email);
		
		$query = $this->db->get('users');
		if($query->num_rows() == 1){
            $user = $query->row();
            $query->result();
            //$r = $q->result();
            
            return $user;
        }
 else {
                        return FALSE;}
        }
}

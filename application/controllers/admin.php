<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->view('admin',$data);
	}
        public function mapa(){
			$obj=$this->getmapainiciomodel();
			
			echo $obj;
		}

	public function _getModel(){
			$this->load->model('InicioModel');
		}

	public function getmapainiciomodel(){
			$this->_getModel();
			$obj = $this->InicioModel->getmapainicioadmin();
			return $obj;
		}
                
         public function mapano(){
			$obj=$this->getmapainiciomodelno();
			
			echo $obj;
		}

	
	public function getmapainiciomodelno(){
			$this->_getModel();
			$obj = $this->InicioModel->getmapainicioadminno();
			return $obj;
		}
}

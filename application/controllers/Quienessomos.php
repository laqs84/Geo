<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quienessomos extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','form_validation'));
                $this->load->helper(array('form','url','date','html'));
	}
        
        public function quienessomos()
	{
		$this->load->helper(array('form','url','date','html'));
		$title["title"] = "GeoValores";
                $title["dondeestoy"] = "Quienes Somos";
                
		$this->load->view('quienessomos', $title);
	}


	


}


/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
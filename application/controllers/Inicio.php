<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		
		parent::__construct();
		//carfamos la base de datos, los helpers
		//librerías y el modelo en el constructor
		$this->load->database('default');
		 $this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','url','date','html'));
		$this->load->model('InicioModel');
		
	}
	public function index()
	{
               
		$title["title"] = "GeoValores";
                $title["dondeestoy"] = "Inicio";
                $title['mapa'] = TRUE;
                        
                $activas = $this->InicioModel->selectactivas('publicaciones');
                
                foreach ($activas as $value){
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
                                                   if($diferencia_dias <= 0) {
                                                      $tabla = "publicaciones";
                                                      $idPublicacion = $value['idPublicacion'];
                                                      $data = array (
                                                        'status' => 0
                                                     );
                                                       $this->InicioModel->UpdateTable($tabla ,$data, $idPublicacion);
                                                   }
				   		}
                $title["publicaciones"] = $this->InicioModel->selectJoinPropiedades('details_fields');
		$this->load->view('Inicio', $title);
	}
        
        public function politicas()
	{
               
		$title["title"] = "GeoValores";
                $title["dondeestoy"] = "Politicas";
                $this->load->view('politicas', $title);
	}

        public function busquedaava()
	{
               
		$title["title"] = "GeoValores";
                $title["dondeestoy"] = "buscar";
                $this->load->view('busqueda', $title);
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
			$obj = $this->InicioModel->getmapainicio();
			return $obj;
		}

	public function busqueda()
	{
		$data = $_POST['data'];
                
              
		if($data)
		{
			
			//limpiamos los campos del formulario, no necesitamos validar
			
			//los campos del formulario deben tener el mismo nombre
			//que los de la base de datos a buscar, esto luego lo 
			//recorremos para comprobar como vienen				
			$campos = array('address', 'precio1', 'tipo_categoria', 'cantidad-banos', 'cantidad-carros');
			
			//envíamos los datos al modelo para hacer la búsqueda
			$resultados = $this->InicioModel->nueva_busqueda($data);
			
			if($resultados !== FALSE)
			{
				
				echo  $resultados;
				
			}
			
		}
		
	}
        public function favoritos()
	{
		$idUsuario =  $this->session->userdata('idUsuario');
		if(!empty($idUsuario)){
			$data["dondeestoy"] = "Favoritos";
			$this->load->helper(array('form','url','date','html'));
			$data["title"] = "GeoValores";
			$data["title_page"] = "Favoritos";
                        $favorita =  $this->InicioModel->selectfavorita('publicaciones_marcadas',$idUsuario);
                        $data['favorita'] = $favorita;
			
			$this->load->view('favoritos', $data);
		}
		else {
			redirect(base_url().'index.php/Login/adminuser');
		}
		
	}
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
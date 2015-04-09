<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	function __construct() { 
		parent::__Construct();
		$this->load->library(array('form_validation','email'));
		$this->load->helper(array('url','html'));
       }

function index(){
           $data["dondeestoy"] = "Contacto";
	   $data['title'] = 'Formulario de Contacto'; 
	   $data['msg'] = NULL;
	   
           
		
		
	if (empty($_POST['message']))
		{
			$this->load->view('contacto', $data);   

			
		    }else{
		    			
			$name = $_POST['name'];
			$mobil = $_POST['phone'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			$address = $_POST['address'];
                        $body = '<table width="600" cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                      <td style="text-align: center;" width="600">
                                      <img src="http://www.geovalores.com/images/logo.png">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Nombre</td>
                                      <td>'.$name.'</td>
                                    </tr>
                                    <tr>
                                      <td>Telefono</td>
                                      <td>'.$mobil.'</td>
                                    </tr>
                                    <tr>
                                      <td>Direccion</td>
                                      <td>'.$address.'</td>
                                    </tr>
                                    <tr>
                                      <td>Email</td>
                                      <td>'.$email.'</td>
                                    </tr>
                                    <tr>
                                      <td>Mensaje</td>
                                      <td>'.$message.'</td>
                                    </tr>
                                  </table>';  
                        $this->load->library("email");
 
                        //configuracion para gmail
                        $configGmail = array(
                            'protocol' => 'smtp',
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
			$this->email->from($email);
			$this->email->to('laqs84@softteca.com');
			$this->email->subject('Email enviado GeoValores');				
			$this->email->message($body); 
			
			if($this->email->send()){
			
			$msg = 'Mensaje enviado';
                        $status = 'success';
                        echo json_encode(array('status' => $status, 'msg' => $msg));
			
			 }else{
			 $msg='El mensaje no se pudo enviar';
                         $status = 'error';
                         echo json_encode(array('status' => $status, 'msg' => $msg));
			 
			 } 
						 
           } 
	    } 
    } 

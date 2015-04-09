<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicar extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
               $this->load->helper(array('form','url','date','html'));
               $this->load->model('DBModel');
               $this->load->library('session');
	}
       
        public function construcciones()
        {
        	$usuario = $this->session->userdata('idUsuario');
        	
        	if(empty($usuario)){
        		 
        		redirect(base_url().'index.php/Login/adminuser');
        	}
            $data["dondeestoy"] = "Publicar";
            $this->load->helper(array('form','url','date','html'));
            $data["title"] = "GeoValores";
            $data["title_page"] = "Publicar Construcciones";
            $this->load->view('ventas/contrucciones', $data);
        }
        
        public function terrenos() {
        	$usuario = $this->session->userdata('idUsuario');
        	
        	if(empty($usuario)){
                 
               redirect(base_url().'index.php/Login/adminuser');
            }
            $data["dondeestoy"] = "Publicar";
            $this->load->helper(array('form','url','date','html'));
            $data["title"] = "GeoValores";
            $data["title_page"] = "Publicar Terrenos";
            $this->load->view('ventas/terrenos', $data);
        }
        
        public function alquileres() {
        	$usuario = $this->session->userdata('idUsuario');
        	
        	if(empty($usuario)){
                 
               redirect(base_url().'index.php/Login/adminuser');
            }
            $data["dondeestoy"] = "Publicar";
            $this->load->helper(array('form','url','date','html'));
            $data["title"] = "GeoValores";
            $data["title_page"] = "Publicar Alquileres";
            $this->load->view('ventas/alquileres', $data);
        }
        
        public function remates() {
        	$usuario = $this->session->userdata('idUsuario');
        	
        	if(empty($usuario)){
                 
              	redirect(base_url().'index.php/Login/adminuser');
            }
            $data["dondeestoy"] = "Publicar";
            $this->load->helper(array('form','url','date','html'));
            $data["title"] = "GeoValores";
            $data["title_page"] = "Publicar Remates";
            $this->load->view('ventas/remates', $data);
        }
        public function guardarimagenes (){
       
       $status = "";
    $msg = "";
    $file_element_name = 'userfile';
    $idPublicacion =  $_POST['idPublicacion'];
    
    if(!empty($idPublicacion)){
    $fields= $this->DBModel->selectDetailsPublicacion('details_fields',$idPublicacion);
    
     foreach ($fields as $value ){
           if($value['field_name'] == "imagen1"){ $count = 2;} 
           if($value['field_name'] == "imagen2"){ $count = 3;} 
           if($value['field_name'] == "imagen3"){ $count = 4;} 
           if($value['field_name'] == "imagen4"){ $count = 5;} 
           
          
        }
        }
    else{
            $count = 1;
        }
       
       
    

            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
        
        
        
            foreach($_FILES as $key => $value)
            {     
                
                if( ! empty($value['name']))
                {
                    
                    if($this->upload->do_upload($key))
                    {                                           
                       $saveimagen = $this->upload->data();
                       $arraynombres['imagen'.$count] = $saveimagen['file_name'];
                       
	
                     }
                }
                $count++;
            }
            $this->session->set_userdata('count',$count);
            $this->session->set_userdata('imagenes',$arraynombres);
            if (!empty($idPublicacion))
            {
             echo '<script>parent.showImagePreview("../../../files/'.$saveimagen['file_name'].'","'.$saveimagen['file_name'].'","'.'imagen'.$_POST['imagen'].'");</script>';   
            }
            else
            {
            echo '<script>parent.showImagePreview("../../files/'.$saveimagen['file_name'].'","'.$saveimagen['file_name'].'","'.'imagen'.$_POST['imagen'].'");</script>';
            }
    echo json_encode(array('status' => $status, 'msg' => $msg));
        }

        public function saveInfo() {
            $this->load->model('DBModel');
            $data = $_POST['data'];
            $array_data = array();
            $array_publicacion = array();
            $imagenes = $this->session->userdata('imagenes');
            if(!empty($imagenes)){
            foreach ( $imagenes as $key => $dat)
            {
                
                $array_data[$key] = $dat;
                
                
            }
            }
            $c=0;
            foreach ( $data as $dat)
            {
                if($dat['name'] == "tipo_categoria" || $dat['name'] == "tiempo")
                {
                        $array_publicacion[$dat['name']] =  $dat['value'];
                }
                else
                {
                       $array_data[$dat['name']] = $dat['value'];
                }
                $c++;
            }
            $array_publicacion['usuarios_idUsuario'] =  $this->session->userdata('usuario_id');
            $array_publicacion['date_publicacion'] = date('Y-m-d H:i:s');
            
          	$id_publicacion = $this->DBModel->InsertTable('publicaciones',$array_publicacion);
          	$msj = '';
             if($id_publicacion !== 'error'){
                 foreach ($array_data as $key => $value) {
                     $data = array(  
                        'field_value' => $value ,
                        'field_name' => $key,
                        'idPublicacion' => $id_publicacion
                 );
                 try {
                     $this->DBModel->InsertTable('details_fields',$data);                    
                 } catch (Exception $exc) {
                     $msj = false;
                 }
                 $msj = true;
                 }
            }else{
                echo false;
            }
            
            if($msj == true){
                echo $id_publicacion;
                $this->mandarcorreo($array_data, $id_publicacion);
            	
            }else{
            	echo false;
            }
        }
        
        private function mandarcorreo($array_data, $id_publicacion)
	{
		date_default_timezone_set('GMT');
		
		 $config = Array(
'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'laqs84@softteca.com',
        'smtp_pass' => 'Andresing2012',
        'mailtype'  => 'html', 
        'charset' => 'utf-8',
        'wordwrap' => TRUE

    );
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
            if(!empty($array_data['precio-remate']))
            {$url = "'.base_url().'/editar/'.$id_publicacion.'";}
            else {$url = "'.base_url().'/editar-remate/'.$id_publicacion.'";}
            if(!empty($array_data['precio-colones'])){
                $precio = '¢'.$array_data['precio-colones'];
            }
            else {
                $precio = '$'.$array_data['precio-dolar'];
            }
           $body = '<table style="border-collapse:collapse;margin:0;padding:0;background-color:#ececec;min-height:100%!important;width:100%!important" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
            <td align="center">
                <table style="border-collapse:collapse;text-align:left;max-width:600px" border="0" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                            <td align="center" style="padding:20px;font-family:Arial,helvetica,sans-serif;color:#666666;font-size:11px">Felicitaciones, su anuncio <b>'.$array_data['name'].'!</b> ya está en línea en GeoValores
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table style="border-collapse:collapse;text-align:left;background-color:#ffffff;min-width:330px;max-width:100%" border="0" cellpadding="0" cellspacing="0">


                                    <tbody><tr>
                                            <td align="left" valign="top">

                                                <table bgcolor="#FAFAFA" width="100%" style="border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:#ececec" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                            <td width="41" valign="middle" style="padding-left:20px;padding-top:10px;padding-bottom:10px">
                                                                <a rel="nofollow" href="http://www.geovalores.com/" target="_blank">
                                                                    <img src="http://www.geovalores.com/images/logo.png">
                                                                </a>
                                                            </td>
                                                            
                                                        </tr>
                                                    </tbody></table>


                                            </td>                                    
                                        </tr>


                                        <tr>
                                            <td align="left" valign="top" width="100%" style="padding-top:0;padding-bottom:0;padding-right:20px;padding-left:20px">
                                                <table width="100%" style="border-collapse:collapse;text-align:left" border="0" cellpadding="0" cellspacing="0">


                                                    <tbody><tr>
                                                            <td valign="top" style="width:100%">



                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody><tr>
                                                                            <td valign="top" style="padding-top:22px;padding-bottom:22px;font-size:31px;font-family:Arial,helvetica,sans-serif">
                                                                                ¡Felicitaciones, su anuncio ya está visible para los compradores en GeoValores!
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td valign="top" style="padding-bottom:30px;font-size:13px;line-height:1.3">
                                                                                Hola :<br>

                                                                                <div>
                                                                                    Gracias por usar GeoValores. Su anuncio:  ya está disponible para los compradores en GeoValores.
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td style="padding-bottom:20px">

                                                                <table border="0" cellpadding="0" cellspacing="0" style="border-top:1px solid #cccccc;border-right:1px solid #cccccc;border-bottom:1px solid #cccccc;border-left:1px solid #cccccc;width:100%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px">
                                                                    <tbody><tr>
                                                                            <td valign="top" width="121">
                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                    <tbody><tr>
                                                                                            <td align="center" height="83" width="110" style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;border-style:solid;border-width:1px;border-color:#cccccc">


                                                                                                <a rel="nofollow" href="'.$url.'" target="_blank">
                                                                                                    <img src="'.base_url().'/files/'.$array_data['imagen1'].'" class="CToWUd">
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody></table>
                                                                            </td>
                                                                            <td valign="top" style="padding-left:10px;padding-right:10px">

                                                                                <a rel="nofollow" href="" target="_blank">'.$array_data['name'].'!</a><br>


                                                                                <strong style="color:#000000;font-size:13px;line-height:15px;font-weight:bold;display:inline-block">'.$precio.'</strong><br>


                                                                                <span style="display:inline-block;color:#cccccc;font-size:12px;line-height:14px;padding-top:5px">'.$array_data['address'].'</span>
                                                                                <br>


                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </tbody></table>
                                </tbody></table>
                </tbody></table>
';    
                
        //cargamos la configuración para enviar con gmail
        
		$this->email->from('laqs84@softteca.com', 'Geovalores');
		$this->email->to($this->session->userdata('correo')); 	
		$this->email->subject('Felicitaciones, su anuncio ya está visible para los compradores en GeoValores');
		$this->email->message($body);	
		$this->email->send();
	}
}
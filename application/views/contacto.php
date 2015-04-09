<?php include ("header.php") ;?>
<script src=<?php echo base_url().'script/contacto.js'?> ></script>
<style>
   #content {
    background-color: #fff;
    border: 1px solid #c9c4c3;
    border-radius: 5px;
    box-shadow: 0 6px 10px -2px rgba(46, 45, 46, 1);
}
#siteframe {
    background: none repeat scroll 0 0 #f0f0f0;
    min-height: 415px;
}

label {
    color: #444;
    font-size: 15px;
    margin-bottom: 20px;
}
#enviar{
    background: none repeat scroll 0 0 #439a00;
    border-radius: 0;
    color: white;
    float: right;
    font-size: 16px;
    height: 42px;
    line-height: 42px;
    margin-right: 20px;
    min-width: 150px;
    padding: 0 24px;
    }

</style>

	<!-- content -->
<div id="siteframe">
	<div id="content">
            <div class="content-padding">
            

            <?php  
              $attributes = array('id' => 'form_email');

               if($msg===NULL){

             echo form_open('Contacto', $attributes);

                   $name = array('name'=>'name', 'id'=>'name','placeholder'=>'Nombre','value'=>set_value('name'), 'size'=> '35', 'class' => 'form-input',);
                   $phone = array('name'=>'phone', 'id'=>'phone','placeholder'=>'Teléfono','value'=>set_value('phone'), 'size'=> '35', 'class' => 'numbersOnly form-input',);
                   $address = array('name'=>'address','id'=>'address','placeholder'=>'Ciudad','value'=>set_value('address'), 'size'=> '35', 'class' => 'form-input',);
                   $email = array('name'=>'email', 'id'=>'email','placeholder'=>'Email', 'value'=>set_value('email'), 'size'=> '35', 'class' => 'form-input',);  
                   $message =array('name'=>'message', 'cols'=>'50', 'id'=>'message','placeholder'=>'Mensaje...','value'=>set_value('message'), 'class' => 'form-input',);
                   $submit = array('name' => 'submit', 'id' => 'enviar', 'content' => 'Enviar', 'title' => 'Enviar', 'onclick' => "contacto();");
             ?> 
                  <div class="column">
                    <div><?php echo form_label('Nombre');?></div>
                    <div><?php echo form_input($name);?></div> 
                    <div><?php echo form_label('Teléfono');?></div>   
                    <div><?php echo form_input($phone);?></div> 
                    <div><?php echo form_label('Ciudad');?></div>  
                    <div><?php echo form_input($address);?></div> 
                    <div><?php echo form_label('Email');?></div> 
                    <div><?php echo form_input($email);?></div>
                  </div>
                  <div class="column">
                    <div><?php echo form_label('Mensaje');?></div>
                    <div><?php echo form_textarea($message)?></div>     
                  </div>
            <div>
                    <?=  form_button($submit)?>
            </div> 
            <?php echo form_close();?>  

             <?php }else
                       { echo anchor('Contacto','Enviar otro mensaje').br(2); 
                   }
             ?>
            <?php if(validation_errors()){ ?>
	
                    <div id="error"><?php echo validation_errors();?></div>

            <?php  }
                    // fin del if que evalua los errores del formulario ?>
            </div>
	</div>
</div>
	<!-- end content -->	


<?php include ("footer.php") ;?>

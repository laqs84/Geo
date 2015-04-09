<?php include_once('./application/views/header.php') ;?>
<style>
    #content {
    background-color: #fff;
    border: 1px solid #c9c4c3;
    border-radius: 5px;
    box-shadow: 0 6px 10px -2px rgba(46, 45, 46, 1);
}

#siteframe {
    background: none repeat scroll 0 0 #f0f0f0;
    min-height: 480px;
}
.form-btn {
    margin-right: 3px;
    margin-top: 0;
}

.box-register {
    float: left;
    padding-left: 92px;
    padding-top: 31px;
}
.msj{display:block;font-size:.8em;margin:0px 0 10px;padding:5px 0 5px 11px;width:200px}
.confirmacion{background:#C6FFD5;border:1px solid green; margin-top: -12px}
.negacion{background:#ffcccc;border:1px solid red; margin-top: -12px}
</style>
<script src=<?php echo base_url().'script/register.js'?> ></script>
<div id="siteframe">
	<div id="content">
            <div class="content-padding">
                <form id="form-register">
                    <div class="content-Register">
                        <div class="box-register">
                            <ul>
                                <li><label>Nombre</label></li>
                                <li><input class="form-input" type="text" name="txt-nombre" id="txt-nombre" value="" required></li>
                                <li><label>Apellidos</label></li>
                                <li><input class="form-input" type="text" name="txt-apellidos" id="txt-apellidos" value="" required></li>
                                <li><label>Teléfono</label></li>
                                <li><input class="form-input" type="text" name="txt-telefono" id="txt-telefono" value="" required></li>
                                <li><label>Dirección</label></li>
                                <li><input class="form-input" type="text" name="txt-direccion" id="txt-direccion" value="" required></li>
                             </ul>
                        </div>
                        <div class="box-register" >
                        <ul>                           
                            <li><label>Correo</label></li>
                            <li><input class="form-input" type="email" name="txt-correo" id="txt-correo" value="" required></li>
                            <li><label>Contraseña</label></li>
                            <li><input class="form-input" type="password" name="txt-pass" id="txt-pass" value="" required></li>
                            <li><label>Confirmar Contraseña</label></li>
                            <li><input class="form-input" type="password" name="txt-confPass" id="txt-confPass" value="" required></li>
                            <li><label>Recibir Notificaciones</label></li>
                            <li>
                                <input type="radio" name="btn-notificacion" value="1" checked>Si
                                <input type="radio" name="btn-notificacion" value="0" >No
                            </li>
                            <li><input type="checkbox" id="leido" /><label for="leido">He leido y acepta las <a href="<?php echo base_url(); ?>index.php/Inicio/politicas">Politicas de Uso</a>.</label></li>
                            <li><input class="form-btn" type="button" value="Registrarse" id="btn-save" onclick="registerUser();"></li>
                            <li><a class="publicar-type" href="<?php echo base_url(); ?>index.php/Publicar/contrucciones" style="display: none">Siguiente</a></li>
                        </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<script>
$(document).ready(function() {
	//variables
	var pass1 = $('[name=txt-pass]');
	var pass2 = $('[name=txt-confPass]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span class="msj"></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion');	
	}
	if(valor1.length<6 || valor1.length>10){
	span.text(longitud).addClass('negacion');
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
</script>
<?php include_once('./application/views/footer.php') ;?>




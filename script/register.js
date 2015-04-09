$(document).ready(function() {
 $('#txt-telefono').keyup(function () { 
	    this.value = this.value.replace(/[^0-9\.]/g,'');
	});
});
function registerUser(){
    $('input').removeClass('errorClas');
    var name = $('#txt-nombre').val();
    var apellidos = $('#txt-apellidos').val();
    var telefono = $('#txt-telefono').val();
    var direccion = $('#txt-direccion').val();
    var pass = $('#txt-pass').val();
    var confPass = $('#txt-confPass').val();
    var notificacion =  $('input:radio[name=btn-notificacion]:checked').val();
    var correo =  $('#txt-correo').val();
    var marcado = $('#leido').is(':checked');
    var error = false;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (marcado == false){
        alert('Debe aceptar la politica de privacidad');
        return false;
    }
    if(name == ""){
        error = true;
        $('#txt-nombre').addClass('errorClas');
    }
    
    if(apellidos == ""){
        error = true;
        $('#txt-apellidos').addClass('errorClas');
    }
    
    if(telefono == ""){
        error = true;
        $('#txt-telefono').addClass('errorClas');
    }
    
    if(direccion == ""){
        error = true;
        $('#txt-direccion').addClass('errorClas');
    }
    
    if (!regex.test($('#txt-correo').val().trim())) {
        error = true;
        alert('La direccion de correo no es valida');
    }
    if(correo == ""){
        error = true;
        $('#txt-correo').addClass('errorClas');
    }
    
     if((pass !== confPass) || (pass == "" || confPass == "") ){
        error = true;
        $('#txt-pass').addClass('errorClas');
        $('#txt-confPass').addClass('errorClas');
        alert('Las claves no coinciden');
    }
    
    
    if(error == false){
        var url = $(location).attr('href');  
         $.ajax({
            type:'POST',
            url: '../Register/saveUser',
            data:{
                txtName:name,
                txtApellidos:apellidos,
                txtTelefono:telefono,
                txtDireccion:direccion,
                txtPass:pass,
                txtNotificacion:notificacion,
                txtCorreo:correo
            },
            success:function(data){
                if(data !== null){
                    alert("Se registro correctamente!!");
                    window.location.href = "../Login/adminuser";
                }else{
                   alert("No se registro correctamente!!");
                }
            },
            error:function(){
                console.log('error1');
            }
        });
    }
    
    
}

function UpdateUser(){
    $('input').removeClass('errorClas');
    var id = $('#txt-id').val();
    var name = $('#txt-nombre').val();
    var apellidos = $('#txt-apellidos').val();
    var telefono = $('#txt-telefono').val();
    var direccion = $('#txt-direccion').val();
    var pass = $('#txt-pass').val();
    var confPass = $('#txt-confPass').val();
    var notificacion =  $('input:radio[name=btn-notificacion]:checked').val();
    var correo =  $('#txt-correo').val();
    
    var error = false;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    
    if(name == ""){
        error = true;
        $('#txt-nombre').addClass('errorClas');
    }
    
    if(apellidos == ""){
        error = true;
        $('#txt-apellidos').addClass('errorClas');
    }
    
    if(telefono == ""){
        error = true;
        $('#txt-telefono').addClass('errorClas');
    }
    
    if(direccion == ""){
        error = true;
        $('#txt-direccion').addClass('errorClas');
    }
    
    if (!regex.test($('#txt-correo').val().trim())) {
        error = true;
        alert('La direccion de correo no es valida');
    }
    if(correo == ""){
        error = true;
        $('#txt-correo').addClass('errorClas');
    }
    
     if((pass !== confPass) || (pass == "" || confPass == "") ){
        error = true;
        $('#txt-pass').addClass('errorClas');
        $('#txt-confPass').addClass('errorClas');
        alert('Las claves no coinciden');
    }
    
    
    if(error == false){
        var url = $(location).attr('href');  
         $.ajax({
            type:'POST',
            url: '../Register/saveUser',
            data:{
                txtid:id,
                txtName:name,
                txtApellidos:apellidos,
                txtTelefono:telefono,
                txtDireccion:direccion,
                txtPass:pass,
                txtNotificacion:notificacion,
                txtCorreo:correo
            },
            success:function(data){
                if(data !== null){
                    alert("Se actualizo correctamente!!");
                   
                }else{
                   alert("No se actualizo correctamente!!");
                }
            },
            error:function(){
                console.log('error1');
            }
        });
    }
    
    
}

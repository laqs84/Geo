 $(document).ready(function() {
 $('.numbersOnly').keyup(function () { 
	    this.value = this.value.replace(/[^0-9\.]/g,'');
	});
        
       
     });
function contacto(){
    $('input').removeClass('errorClas');
   
    var correo =  $('#email').val();
    
    var address =  $('#address').val();
    var name =  $('#name').val();
    var phone =  $('#phone').val();
    var message =  $('#message').val();
    
    var error = false;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    
  
    
    if (!regex.test($('#email').val().trim())) {
        error = true;
        alert('La direccion de correo no es valida');
    }
    if(name == ""){
        error = true;
        alert('El campo de nombre es requerido');
    }
    if(phone == ""){
        error = true;
        alert('El campo de telefono es requerido');
    }
    if(address == ""){
        error = true;
        alert('El campo de direccion es requerido');
    }
    if(correo == ""){
        error = true;
        alert('El campo de correo es requerido');
    }
    if(message == ""){
        error = true;
        alert('El campo de mensaje es requerido');
    }
     
    
    
    if(error == false){
        var url = $(location).attr('href');  
         $.ajax({
            type:'POST',
            url: 'Contacto/index',
            dataType		: 'json',
            data:{
                email:correo,
                message:message,
                phone:phone,
                address:address,
                name:name
                
            },
            success:function(data){
                if (data.status === "success")
                {
                        alert(data.msg);
                        
                        location.reload();
                }
                else
                {
                        alert(data.msg);
                }
            },
            error:function(){
                console.log('error1');
            }
        });
    }
    
    
}

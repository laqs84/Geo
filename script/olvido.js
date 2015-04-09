
function OlvidoUser(){
    $('input').removeClass('errorClas');
   
    var correo =  $('#email').val();
    
    var error = false;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    
  
    
    if (!regex.test($('#email').val().trim())) {
        error = true;
        alert('La direccion de correo no es valida');
    }
    if(correo == ""){
        error = true;
        $('#email').addClass('errorClas');
    }
    
     
    
    
    if(error == false){
        var url = $(location).attr('href');  
         $.ajax({
            type:'POST',
            url: '../Login/doforget',
            dataType		: 'json',
            data:{
                email:correo
            },
            success:function(data){
                if (data.status === "success")
                {
                        alert(data.msg);
                        $('#email').val('');
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

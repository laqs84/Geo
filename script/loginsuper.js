
function loginUser(){
    //$('input').removeClass('errorClas');
    var name = $('#username').val();
   
    var pass = $('#password').val();
    
  //  var dondeestoy = $('#dondeestoy').val();
    
   // var verporpiedad = $('#verporpiedad').val();
   
    var error = false;
    
    if(name == ""){
        error = true;
        $('#username').addClass('errorClas');
    }
    
    if(pass == ""){
        error = true;
        $('#password').addClass('errorClas');
    }
    
    
    
    if(error == false){
        
         $.ajax({
            type:'POST',
            url : '../../index.php/Administrador/new_user',
             dataType		: 'json',
            data:{
                username:name,
                password:pass
            },
            success:function(data){
                if (data.status === "Bienviendo")
                {
                    
                    window.location.href = '../../index.php/Administrador';
                }else{
                   alert(data.msg);
                }
            },
            error:function(){
                console.log('error1');
            }
        });
    }
    
    
}


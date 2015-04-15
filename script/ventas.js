 $(document).ready(function() {
 $('#precio-dolar').hide();
  $('.info-venta').submit(function(e) {
     
		e.preventDefault();
                var lat =  $('#lat').val();
                if(lat == ""){
                    alert('Usted tiene que mover el marcador para actualizar la posición  y para mejorar la posición debe acercar el mapa');
                    return false;
                }
                $('#submit').hide();
                
                var idPublicacion = $('#idPublicacion').val();
                var foto1 = $('#imagen1').val();
                var imagePreview1 = $('#imagePreview1').attr('src');
                if (idPublicacion === undefined)
                        {
                            $('#btn-save-info').append("<img class='cargando' src='../../images/loader.gif'/>");
                        var url = '../Publicar/guardarimagenes'; }
                        else
                        {
                            $('#btn-save-info').append("<img class='cargando' src='../../../images/loader.gif'/>");
                         var url = '../../Publicar/guardarimagenes';}
                     
                var count = $('#count').val();
                 var $fileUpload = $("input[type='file']");
                 if (idPublicacion === undefined)
                        {
                 if (foto1 == '' || imagePreview1 == ''){
                     alert("Tiene que subir la primera foto");
              $('.cargando').hide();       
              $('#submit').show();
                     return false;
                 }
                        }
                 if (idPublicacion != ''){
                     if (count == 1){
                         if (parseInt($fileUpload.get(0).files.length)> 4){
                            alert("Usted puede subir 4 archivos mas");
                            return false;
                        }
                     }
                     if (count == 2){
                         if (parseInt($fileUpload.get(0).files.length)> 3){
                            alert("Usted puede subir 3 archivos mas");
                            return false;
                        }
                     }
                     if (count == 3){
                         if (parseInt($fileUpload.get(0).files.length)> 2){
                            alert("Usted puede subir 2 archivos mas");
                            return false;
                        }
                     }
                     if (count == 4){
                         if (parseInt($fileUpload.get(0).files.length)> 5){
                            alert("Usted puede subir 1 archivo mas");
                            return false;
                        }
                     }
                     
                     
                 }
                if (parseInt($fileUpload.get(0).files.length)>5){
                 alert("Sólo se puede cargar un máximo de 5 archivos");
                 return false;
                }
                
                            if (idPublicacion === undefined){
                                SaveInfo();
                            }
                            else {
                                SaveInfoEditada();
                            }
                            
			
		});
		
	
     
 $("input[name=cochera]:radio").change(function(){
	 var value = $(this).val();
	 if(value == 'con-cochera')
	 {
		 $('.cant-carros').show();
	 }
	 else
	 {
		 $('.cant-carros').hide();
	 }
	});
 $("#moneda").change(function(){
	 var value = $(this).val();
	 if(value == 'colones')
	 {
		 $('#precio-colones').show();
	 
		 $('#precio-dolar').hide();
	 }
         if(value == 'dolares')
	 {
		 $('#precio-dolar').show();
	 
		 $('#precio-colones').hide();
	 }
	});
 
 $('.numbersOnly').keyup(function () { 
	    this.value = this.value.replace(/[^0-9\.]/g,'');
	});
        $('#imgController > a').bind('click', function()
	{
		var prevImg = $('#imgDisplay').children().css({'opacity':0});
		var thisImg = $(this).children().css({'opacity':0});

		prevImg.appendTo($(this)).animate({'opacity':1});
		thisImg.appendTo('#imgDisplay').animate({'opacity':1});

		return false;
	});
        var thisImg;

        
	// Upload images
	$('form.info-venta > ul  > li > .images > figure > img.upload').bind('dragenter', ignoreDrag).bind('dragover', ignoreDrag).bind('drop', drop);

	function ignoreDrag(e)
	{
		e.originalEvent.stopPropagation();
		e.originalEvent.preventDefault();
	}

	function drop(e)
	{
		ignoreDrag(e);
		var dt = e.originalEvent.dataTransfer;
		var files = dt.files;

		if(dt.files.length > 0)
		{
			var file = dt.files[0];
			$('#guardar_fotos').val(encodeURIComponent(file));
		}


	}


	$('form.info-venta > ul  > li > .images > figure > img.upload').bind('click', function()
	{
		$('#guardar_fotos').click();
		window.previaLoader = $(this).next();
		window.previaContainer = previaLoader.next();
                $('#imagen').val(this.id);
		thisImg = $(this);
	});

	$('#guardar_fotos').bind('change', function()
	{
		if($(this).val() != '')
		{
			thisImg.fadeOut();
                        
			$('#uploadImage').submit();
		}
	});    
 
 });

 	
 function showImagePreview(path, nombre, imagen)
{
	//$('#guardar_img').val($('#guardar_img').val() + path + ',');
        $('#'+imagen).val(nombre);
	$(previaContainer).attr('src', path);
	$('#guardar_fotos').val('');
	$(previaLoader).fadeOut('slow'); 
}


function SaveInfo()
{
    var data =  $( ".info-venta" ).serializeArray();
    
    var titulo = $('#titulo').val();
   
    var edadContruccion =  $('#edad-contruccion').val();
    var tamanoFrente = $('#tamano-frente').val();  
    var precioRemate = $('#precio-remate').val(); 
    var tamanoTerreno = $('#tamano-terreno').val();
    var error = false;
    
    if(titulo == ""){
        error = true;
        $('#titulo').addClass('errorClas');
    }
    
   
    
    if(tamanoTerreno == ""){
        error = true;
        $('#tamano-terreno').addClass('errorClas');
    }
    
    if(precioRemate == ""){
        error = true;
        $('##precio-remate').addClass('errorClas');
    }
    
   
    
    if(edadContruccion == ""){
        error = true;
        $('#edad-contruccion').addClass('errorClas');
    }
    
    if(tamanoFrente == ""){
        error = true;
        $('#tamano-frente').addClass('errorClas');
    }

    if( error !== true){
	 $.ajax({
	            type:'POST',
	            url: '../Publicar/saveInfo',
	            data:{
	                data:data
	            },
	            success:function(data){
	                if(data !== null){
	                    alert("Se registro correctamente!!");
	                    window.location.href = "../Publicadas/exito/"+data;
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






function SaveInfoEditada()
{
    var data =  $( ".info-venta" ).serializeArray();
    var idPublicacion = $('#idPublicacion').val();
    var titulo = $('#titulo').val();
   
    var edadContruccion =  $('#edad-contruccion').val();
    var tamanoFrente = $('#tamano-frente').val();  
    var precioRemate = $('#precio-remate').val(); 
    var tamanoTerreno = $('#tamano-terreno').val();
    var error = false;
    
    if(titulo == ""){
        error = true;
        $('#titulo').addClass('errorClas');
    }
    
   
    
    if(tamanoTerreno == ""){
        error = true;
        $('#tamano-terreno').addClass('errorClas');
    }
    
    if(precioRemate == ""){
        error = true;
        $('##precio-remate').addClass('errorClas');
    }
    
    
    
    if(edadContruccion == ""){
        error = true;
        $('#edad-contruccion').addClass('errorClas');
    }
    
    if(tamanoFrente == ""){
        error = true;
        $('#tamano-frente').addClass('errorClas');
    }

    if( error !== true){
	    $.ajax({
	            type:'POST',
	            url: '../../Publicadas/saveInfoEditada',
	            data:{
	            	idPublicacion:idPublicacion,
	                data:data
	            },
	            success:function(data){
	                if(data !== null){
	                    alert("Se Actualizo correctamente!!");
	                    location.replace('../../Publicadas/publicacion');
	                }else{
	                   alert("No se Actualizo correctamente!!");
	                }
	            },
	            error:function(){
	                console.log('error1');
	            }
	        });
    }
}
function deleteimage(id){
	
	if (confirm('¿Seguro que quieres eliminar esta imagen?'))
	{
		
		$.ajax({
	            type:'POST',
	            url: '../../Publicadas/delete_file',
                    dataType		: 'json',
	            data:{
	                data:id
	            },
			success		: function (data)
			{
				
				if (data.status === "success")
				{
					alert(data.msg);
                                        location.reload();
				}
				else
				{
					alert(data.msg);
				}
			}
		});
	}
        }
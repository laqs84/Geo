<div class="box-publicar" id="publi-categorias">
    <div id='cssmenu'>
<ul>
   
   <li class='active has-sub open'><a href='#'><span>Mapear Otro Anuncio</span></a>
      <ul>
         <li class=""><a href="<?php echo base_url(); ?>index.php/Publicar/construcciones"><span>Construcciones</span></a></li>
         <li class=""><a href="<?php echo base_url(); ?>index.php/Publicar/terrenos"><span>Terrenos</span></a></li>
         <li class=""><a href="<?php echo base_url(); ?>index.php/Publicar/alquileres"><span>Alquileres</span></a></li>
         <!--<li class=""><a href="<?php // base_url(); ?>index.php/Publicar/remates"><span>Remates</span></a></li>-->
      </ul>
   </li>
   <li class='last'><a href='<?php echo base_url(); ?>index.php/Publicadas/publicacion'><span>Ver mis anuncios</span></a></li>
</ul>
</div>
</div>
<style>
    #btn-save-info > #submit{
        padding: 0 24px;
min-width: 150px; 
font-size: 16px;
height: 42px;
line-height: 42px;
border-radius: 0;
background: #439a00;
color: white;
    }
     #dropbox{
	 border: 2px dashed #707070;
	 border-radius: 2px;
	 width: 600px;
	 height: 100px;
	 margin: 10px 0px;
	 text-align: center;
	 padding-top: 40px;
	 font-weight: bold;
	 color: #6E6E6E;	
	 letter-spacing: 1px;
	}
   
   .progress-holder{
	 width: 300px;
	 padding: 2px;
	 background: #CCCCCC;
	 border-radius: 3px;
	 float: left;
	 margin-top: 4px;
	 margin-right: 5px;
   }
   #progress{
	 height: 6px;
	 display:block;
	 width: 0%;
	 border-radius: 2px;
	 background: -moz-linear-gradient(center top , #13DD13 20%, #209340 80%) repeat scroll 0 0 transparent; /* IE hack */ 
	 background: -ms-linear-gradient(bottom, #13DD13, #209340); /* chrome hack */ 
	 background-image: -webkit-gradient(linear, 20% 20%, 20% 100%, from(#13DD13), to(#209340)); /* safari hack */ 
	 background-image: -webkit-linear-gradient(top, #13DD13, #209340); /* opera hack */ 
	 background-image: -o-linear-gradient(#13DD13,#209340);
	 box-shadow:3px 3px 3px #888888;
   }
   .preview{
	 border: 1px solid #CDCDCD;
	 width: 450px;
	 
	 height:auto; 
	 overflow: auto;
	 color: #4D4D4D;
	 float: left;
	 box-shadow:3px 3px 3px #888888;
	 border-radius: 2px;
   }
   .percents{
	 float: right;
   }
   

#tipe-tamano-terreno.form-input {
    width: 83px;
}
select#tipe-tamano-terreno {
    width: 83px;
}

   .preview-image{
	 box-shadow: 3px 3px 3px #888888;
	 width: 70px;
	 height: 70px;
	 float: left;
	 margin-right: 10px;
   }
   .file-info{
	 height: 50px;
	 float: left;
	 width: auto;
	 margin-bottom: 10px;
	 border: 1px solid blue;
   }
   .file-info span{
	 margin: 3px 2px;
	 font-size: 12px;
	 float:left;
	 display: block;
	 min-width: 100px;
	 overflow: auto;
	 border: 1px solid red;
	 overflow: none;
   }
   .upload-progress{
	 display: none;
   }
</style>

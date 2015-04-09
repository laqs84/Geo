<?php include_once('/../header.php') ;

$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
    
  function formatcurrency($floatcurr, $curr = "USD"){
        $currencies['ARS'] = array(2,',','.');          //  Argentine Peso
        $currencies['AMD'] = array(2,'.',',');          //  Armenian Dram
        $currencies['AWG'] = array(2,'.',',');          //  Aruban Guilder
        $currencies['AUD'] = array(2,'.',' ');          //  Australian Dollar
        $currencies['BSD'] = array(2,'.',',');          //  Bahamian Dollar
        $currencies['BHD'] = array(3,'.',',');          //  Bahraini Dinar
        $currencies['BDT'] = array(2,'.',',');          //  Bangladesh, Taka
        $currencies['BZD'] = array(2,'.',',');          //  Belize Dollar
        $currencies['BMD'] = array(2,'.',',');          //  Bermudian Dollar
        $currencies['BOB'] = array(2,'.',',');          //  Bolivia, Boliviano
        $currencies['BAM'] = array(2,'.',',');          //  Bosnia and Herzegovina, Convertible Marks
        $currencies['BWP'] = array(2,'.',',');          //  Botswana, Pula
        $currencies['BRL'] = array(2,',','.');          //  Brazilian Real
        $currencies['BND'] = array(2,'.',',');          //  Brunei Dollar
        $currencies['CAD'] = array(2,'.',',');          //  Canadian Dollar
        $currencies['KYD'] = array(2,'.',',');          //  Cayman Islands Dollar
        $currencies['CLP'] = array(0,'','.');           //  Chilean Peso
        $currencies['CNY'] = array(2,'.',',');          //  China Yuan Renminbi
        $currencies['COP'] = array(2,',','.');          //  Colombian Peso
        $currencies['CRC'] = array(2,',','.');          //  Costa Rican Colon
        $currencies['HRK'] = array(2,',','.');          //  Croatian Kuna
        $currencies['CUC'] = array(2,'.',',');          //  Cuban Convertible Peso
        $currencies['CUP'] = array(2,'.',',');          //  Cuban Peso
        $currencies['CYP'] = array(2,'.',',');          //  Cyprus Pound
        $currencies['CZK'] = array(2,'.',',');          //  Czech Koruna
        $currencies['DKK'] = array(2,',','.');          //  Danish Krone
        $currencies['DOP'] = array(2,'.',',');          //  Dominican Peso
        $currencies['XCD'] = array(2,'.',',');          //  East Caribbean Dollar
        $currencies['EGP'] = array(2,'.',',');          //  Egyptian Pound
        $currencies['SVC'] = array(2,'.',',');          //  El Salvador Colon
        $currencies['ATS'] = array(2,',','.');          //  Euro
        $currencies['BEF'] = array(2,',','.');          //  Euro
        $currencies['DEM'] = array(2,',','.');          //  Euro
        $currencies['EEK'] = array(2,',','.');          //  Euro
        $currencies['ESP'] = array(2,',','.');          //  Euro
        $currencies['EUR'] = array(2,',','.');          //  Euro
        $currencies['FIM'] = array(2,',','.');          //  Euro
        $currencies['FRF'] = array(2,',','.');          //  Euro
        $currencies['GRD'] = array(2,',','.');          //  Euro
        $currencies['IEP'] = array(2,',','.');          //  Euro
        $currencies['ITL'] = array(2,',','.');          //  Euro
        $currencies['LUF'] = array(2,',','.');          //  Euro
        $currencies['NLG'] = array(2,',','.');          //  Euro
        $currencies['PTE'] = array(2,',','.');          //  Euro
        $currencies['GHC'] = array(2,'.',',');          //  Ghana, Cedi
        $currencies['GIP'] = array(2,'.',',');          //  Gibraltar Pound
        $currencies['GTQ'] = array(2,'.',',');          //  Guatemala, Quetzal
        $currencies['HNL'] = array(2,'.',',');          //  Honduras, Lempira
        $currencies['HKD'] = array(2,'.',',');          //  Hong Kong Dollar
        $currencies['HUF'] = array(0,'','.');           //  Hungary, Forint
        $currencies['ISK'] = array(0,'','.');           //  Iceland Krona
        $currencies['INR'] = array(2,'.',',');          //  Indian Rupee
        $currencies['IDR'] = array(2,',','.');          //  Indonesia, Rupiah
        $currencies['IRR'] = array(2,'.',',');          //  Iranian Rial
        $currencies['JMD'] = array(2,'.',',');          //  Jamaican Dollar
        $currencies['JPY'] = array(0,'',',');           //  Japan, Yen
        $currencies['JOD'] = array(3,'.',',');          //  Jordanian Dinar
        $currencies['KES'] = array(2,'.',',');          //  Kenyan Shilling
        $currencies['KWD'] = array(3,'.',',');          //  Kuwaiti Dinar
        $currencies['LVL'] = array(2,'.',',');          //  Latvian Lats
        $currencies['LBP'] = array(0,'',' ');           //  Lebanese Pound
        $currencies['LTL'] = array(2,',',' ');          //  Lithuanian Litas
        $currencies['MKD'] = array(2,'.',',');          //  Macedonia, Denar
        $currencies['MYR'] = array(2,'.',',');          //  Malaysian Ringgit
        $currencies['MTL'] = array(2,'.',',');          //  Maltese Lira
        $currencies['MUR'] = array(0,'',',');           //  Mauritius Rupee
        $currencies['MXN'] = array(2,'.',',');          //  Mexican Peso
        $currencies['MZM'] = array(2,',','.');          //  Mozambique Metical
        $currencies['NPR'] = array(2,'.',',');          //  Nepalese Rupee
        $currencies['ANG'] = array(2,'.',',');          //  Netherlands Antillian Guilder
        $currencies['ILS'] = array(2,'.',',');          //  New Israeli Shekel
        $currencies['TRY'] = array(2,'.',',');          //  New Turkish Lira
        $currencies['NZD'] = array(2,'.',',');          //  New Zealand Dollar
        $currencies['NOK'] = array(2,',','.');          //  Norwegian Krone
        $currencies['PKR'] = array(2,'.',',');          //  Pakistan Rupee
        $currencies['PEN'] = array(2,'.',',');          //  Peru, Nuevo Sol
        $currencies['UYU'] = array(2,',','.');          //  Peso Uruguayo
        $currencies['PHP'] = array(2,'.',',');          //  Philippine Peso
        $currencies['PLN'] = array(2,'.',' ');          //  Poland, Zloty
        $currencies['GBP'] = array(2,'.',',');          //  Pound Sterling
        $currencies['OMR'] = array(3,'.',',');          //  Rial Omani
        $currencies['RON'] = array(2,',','.');          //  Romania, New Leu
        $currencies['ROL'] = array(2,',','.');          //  Romania, Old Leu
        $currencies['RUB'] = array(2,',','.');          //  Russian Ruble
        $currencies['SAR'] = array(2,'.',',');          //  Saudi Riyal
        $currencies['SGD'] = array(2,'.',',');          //  Singapore Dollar
        $currencies['SKK'] = array(2,',',' ');          //  Slovak Koruna
        $currencies['SIT'] = array(2,',','.');          //  Slovenia, Tolar
        $currencies['ZAR'] = array(2,'.',' ');          //  South Africa, Rand
        $currencies['KRW'] = array(0,'',',');           //  South Korea, Won
        $currencies['SZL'] = array(2,'.',', ');         //  Swaziland, Lilangeni
        $currencies['SEK'] = array(2,',','.');          //  Swedish Krona
        $currencies['CHF'] = array(2,'.','\'');         //  Swiss Franc 
        $currencies['TZS'] = array(2,'.',',');          //  Tanzanian Shilling
        $currencies['THB'] = array(2,'.',',');          //  Thailand, Baht
        $currencies['TOP'] = array(2,'.',',');          //  Tonga, Paanga
        $currencies['AED'] = array(2,'.',',');          //  UAE Dirham
        $currencies['UAH'] = array(2,',',' ');          //  Ukraine, Hryvnia
        $currencies['USD'] = array(2,'.',',');          //  US Dollar
        $currencies['VUV'] = array(0,'',',');           //  Vanuatu, Vatu
        $currencies['VEF'] = array(2,',','.');          //  Venezuela Bolivares Fuertes
        $currencies['VEB'] = array(2,',','.');          //  Venezuela, Bolivar
        $currencies['VND'] = array(0,'','.');           //  Viet Nam, Dong
        $currencies['ZWD'] = array(2,'.',' ');          //  Zimbabwe Dollar

        function formatinr($input){
            //CUSTOM FUNCTION TO GENERATE ##,##,###.##
            $dec = "";
            $pos = strpos($input, ".");
            if ($pos === false){
                //no decimals   
            } else {
                //decimals
                $dec = substr(round(substr($input,$pos),2),1);
                $input = substr($input,0,$pos);
            }
            $num = substr($input,-3); //get the last 3 digits
            $input = substr($input,0, -3); //omit the last 3 digits already stored in $num
            while(strlen($input) > 0) //loop the process - further get digits 2 by 2
            {
                $num = substr($input,-2).",".$num;
                $input = substr($input,0,-2);
            }
            return $num . $dec;
        }


        if ($curr == "INR"){    
            return formatinr($floatcurr);
        } else {
            return number_format($floatcurr,$currencies[$curr][0],$currencies[$curr][1],$currencies[$curr][2]);
        }
    }



    /*echo formatcurrency(39174.00000000001);             //1,000,045.25 (USD)        

    formatcurrency(1000045.25, "CHF");        //1'000'045.25
    formatcurrency(1000045.25, "EUR");      //1.000.045,25
    formatcurrency(1000045, "JPY");         //1,000,045
    formatcurrency(1000045, "LBP");         //1 000 045
    formatcurrency(1000045.25, "INR");      //10,00,045.25
    */

    
?>

<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src=<?php echo base_url().'script/social-buttons-share.js' ?>></script>
<script src=<?php echo base_url().'script/bjqs-1.3.min.js' ?>></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
$(document).ready(function() {
    $("#social2").socialButtonsShare({
          socialNetworks: ["facebook", "twitter", "googleplus"],
          url: "<?php echo $complete_url;?>",
          text: "<?php echo $titulo;?>",
          sharelabel: false,
        });
                initialize();
               $('.banner').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 3000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: false              //  Support responsive design. May break non-responsive designs
});
            }); 
 function nouser(){
     alert('Usted no esta con una sesion activa');
     return false;
 }           
function agregar(iduser, idpublicacion){
	
	
		
		$.ajax({
	            type:'POST',
	            url: '../agregarfavorito',
                    dataType		: 'json',
	            data:{
	                data:iduser,
                        data1:idpublicacion
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
function deletefavorito2(id){
	
	if (confirm('¿Seguro que quieres eliminar esta propiedad en sus favoritos?'))
	{
		
		$.ajax({
	            type:'POST',
	            url: '../deletefavorito',
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
</script>
<style>

.imagenes {
    height: 300px;
    width: 100%;
}
.usercontacto {
    border: 2px solid;
    height: 281px;
    margin-bottom: 45px;
    margin-left: 554px;
    margin-top: -333px;
    
    padding-top: 25px;
    width: 37.5%;
}
.specs-property  {
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    margin-bottom: 15px;
    margin-top: 15px;
    padding-bottom: 5px;
}
.description {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: justify;
}
.usercontacto > label {
    font-size: 24px;
    margin-left: 100px;
}
.usercontacto > div {
    margin-bottom: 20px;
    text-align: center;
    margin-top: 20px;
}
#publi-detalles label {
    font-size: 20px;
}
.favorita {
    margin-left: 460px;
    margin-top: 10px;
    position: absolute;
    z-index: 999;
}
@-moz-document url-prefix() {
    
    
.favorita {
    margin-left: 422px;
    margin-top: 310px;
    position: absolute;
    z-index: 999;
}

}
.banner { position: relative; overflow: auto; width: 450px; height: 382px;}
    .banner li { list-style: none; }
        .banner ul li { float: left; }
        
.social label {
  float: left;
  background-color: #EEEEEE;
  opacity: 0.5;
  border: 1px solid #000000;
  -moz-border-radius: 5px;
  border-radius: 5px;
  padding: 6px 0 6px 15px;
  font-family: sans-serif,fantasy,serif;
  margin-right: 9px;
}
.social label:after {
  border-top: 8px solid rgba(0, 0, 0, 0);
  border-bottom: 8px solid rgba(0, 0, 0, 0);
  border-right: 8px solid rgba(0, 0, 0, 0);
  border-left: 8px solid #000000;
  content: "";
  display: inline-block;
  position: relative;
  left: 17px;
  top: 2px;
  width: 0;
  height: 0;
}
.social ul {
  float: left;
  list-style: none;
  margin: 0;
  padding: 0;
}
.social li {
  float: left;
  width: 40px;
  height: 32px;
  cursor: pointer;
  color: #FFFFFF;
}
.social li:hover {
  -webkit-box-shadow: inset 0px 0px 12px rgba(255,255,255,0.6);
  -moz-box-shadow: inset 0px 0px 12px rgba(255,255,255,0.6);
  box-shadow: inset 0px 0px 12px rgba(255,255,255,0.6);
}
.social div {
  clear: both;
}

/* for vertical alignment */
.social .vertical {
  float: none;
}
.social .vertical-label:after {
  border-top: 8px solid #000000;
  border-bottom: 8px solid rgba(0, 0, 0, 0);
  border-right: 8px solid rgba(0, 0, 0, 0);
  border-left: 8px solid rgba(0, 0, 0, 0);
  content: "";
  display: inline-block;
  position: relative;
  left: -36px;
  top: 26px;
  width: 0;
  height: 0;
}
.social .vertical-ul {
  margin: 14px 0 0 23px;
}

/* social network styles */
.social-facebook {
  background: #3B5998 url("../../../images/social-buttons.png") no-repeat 0 0;
}
.social-twitter {
  background: #55ACEE url("../../../images/social-buttons.png") no-repeat 0 -52px;
}
.social-googleplus {
  background: #DD4B39 url("../../../images/social-buttons.png") no-repeat 0 -104px;
}
</style>

<div id="siteframe">
    <div id="content">
        <div class="content-padding">
           
            
            <div class="box-publicar" id="publi-detalles">
               
                
                <?php $tipoPublicacion = "";
                	$c = 0 ;
                	$map = true;
                ?>	
                
                 <?php 
                        if(empty($favorita)){ 
                        $imafavorita = array(
                                'src' => 'images/gusta.png',
                                'alt' => 'No esta en mis favoritos',
                                'class' => 'favorita',
                                'id' => 'noesta',
                                'title' => 'No esta en mis favoritos'

                      );    
                        $idUsuario =  $this->session->userdata('idUsuario');
                        if(empty($idUsuario))
                            {
                            $funcion = "nouser();return false;";
                            }
                            else{
                                $funcion = "agregar(".$idUsuario.", ".$idpublicacion.");return false;"; 
                                
                            }
                        ?>
                        <?php echo '<a href="" onclick="'.$funcion.'">'.img($imafavorita).'</a>';  }
                        else {
                                $imafavorita = array(
                                'src' => 'images/nogusta.png',
                                'alt' => 'Esta en mis favoritos',
                                'class' => 'favorita',
                                'id' => 'esta',
                                'title' => 'Esta en mis favoritos'

                      );    
                        ?>
                        <?php echo '<a href="" onclick="deletefavorito2('.$favorita[0]['idMarcadas'].');return false;">'.img($imafavorita).'</a>'; }?>
                       <div class="banner">     
                <ul class="bjqs">
                                      
                        <?php foreach ($publicacion as $value ){
                        if($value['field_name'] == "imagen1" && $value['field_value'] != ''){ 
                        $imagen1 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 1',
                                'class' => 'imagenes',
                                'id' => 'imagen1',
                                'title' => 'Su imagen 1',

                      );    
                        ?>
                                
                                <li><?php echo img(@$imagen1);?></li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen2" && $value['field_value'] != ''){ 
                        $imagen2 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 2',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 2',

                      );    
                        ?>
                    		
                                <li><?php echo img(@$imagen2);?>  </li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen3" && $value['field_value'] != ''){ 
                        $imagen3 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 3',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 3',

                      );    
                        ?>
                    		
                                <li><?php echo img(@$imagen3);?>  </li>
                    	<?php } ?> 
                        <?php if($value['field_name'] == "imagen4" && $value['field_value'] != ''){ 
                        $imagen4 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 4',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 4',

                      );    
                        ?>
                    		
                                    <li><?php echo img(@$imagen4);?>  </li>
                    	<?php } ?>
                        <?php if($value['field_name'] == "imagen5" && $value['field_value'] != ''){ 
                        $imagen5 = array(
                                'src' => 'files/'.$value['field_value'],
                                'alt' => 'Su imagen 5',
                                'class' => 'imagenes',

                                'title' => 'Su imagen 5',

                      );    
                        ?>
                                    <li><?php echo img(@$imagen5);?> </li>
                                  
                    	<?php } }?>
                       
                             </ul>
                       </div>
                <div id="social2" class="social"></div>
                <div class="usercontacto">
                        <label>Nombre del vendedor</label>
                        <div><?php echo $usercontacto[0]['nombre'].' '.$usercontacto[0]['apellidos'] ?></div>
                        <label>Correo del vendedor</label>
                        <div><a href="mailito:<?php echo $usercontacto[0]['correo'] ?>"><?php echo $usercontacto[0]['correo'] ?></a></div>
                        <label>Telefono del vendedor</label>
                        <div><?php echo $usercontacto[0]['telefono']?></div>
                </div>
                        <?php 
                	 foreach ($publicacion as $value ){?>
                	
                	
                	<?php if (!empty($value['field_name'])) { ?>
                	 
                    	<?php if($value['field_name'] == "name"){ ?>
                    		<div><label>Titulo</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
                    	<?php } ?>
                         
                         <?php if($value['field_name'] == "tipo-construccion"){ ?>
                    		<div><label>Tipo Construccion</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-dolar" && !empty($value['field_value'])){ ?>
                    		<div><label>Precio Dolares</label></div>
                        	<div class="specs-property"><?php echo formatcurrency($value['field_value']); ?></div>
						 <?php } ?>
                        
                        <?php if($value['field_name'] == "precio-colones" && !empty($value['field_value'])){ ?>
                    		<div><label>Precio Colones</label></div>
                        	<div class="specs-property"><?php echo formatcurrency($value['field_value'], "CRC"); ?></div>
                        	
						 <?php } ?>
                         <?php if($value['field_name'] == "lat"){ ?>
                        	
						 	
                        	
	                            <?php $lat = $value['field_value']; ?>
	                         
	                      <?php } ?>
	                     <?php if($value['field_name'] == "lng"){ ?>
	                     		
	                            	<?php $lng = $value['field_value']; ?>
	                       
	                      <?php } ?>
                        <?php if($value['field_name'] == "address"){ ?>
                    		<div><label>Direccion</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
                        
                        <?php if(($value['field_name'] == "tamano-terreno" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<div><label>Tamaño del Terreno</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "tamano-terreno" ){ ?>
	                            	<?php echo $value['field_value']; ?>
	                           	<?php } ?>
	                            <?php if($value['field_name'] == "tipe-tamano-terreno"){ ?>
		                            <?php echo $value['field_value']; ?>
		                        <?php } ?>
	                        </div>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="alquileres"){?>
                        <?php if(($value['field_name'] == "tamano-contruccion" || $value['field_name'] == "metro-cuadrado")){ ?>
                    		<div><label>Tamaño Construcción</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "tamano-contruccion" ){ ?>
	                            	<?php echo $value['field_value']; ?>
	                           	 <?php } ?>
	                            <?php if( $value['field_name'] == "metro-cuadrado"){ ?> 
		                            <?php echo $value['field_value']; ?>
		                        <?php } ?>
	                        </div>
						 <?php } ?>
						 <?php } ?>
                       	<?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
	                        <?php if($value['field_name'] == "edad-contruccion"){ ?>
	                    		<div><label>Edad De la Contruccion</label></div>
	                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
							 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "tamano-frente"){ ?>
                    		<div><label>Tamaño del Frente</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" ){?>
                        <?php if($value['field_name'] == "cantidad-pisos"){ ?>
                    		<div><label>Cantidad de Pisos</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cantidad-cuartos"){ ?>
                    		<div><label>Cantidad Cuartos</label></div>
	                        <div class="specs-property">
	                           <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "closet"){ ?>
                    		<div><label>Closet</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
						 <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if(($value['field_name'] == "cantidad-banos" || $value['field_name'] == "tipo-bano")){ ?>
                    		<div><label>Baños</label></div>
	                        <div class="specs-property">
	                        	<?php if($value['field_name'] == "cantidad-banos"){ ?>
	                            <?php echo $value['field_value']; ?>
	                            
	                            <?php } ?>
	                            <?php if($value['field_name'] == "tipo-bano"){ ?>
	                            <?php echo $value['field_value']; ?>
	                            <?php } ?>
	                        </div>
						 <?php } ?>
                        <?php }?>
                        <?php if($tipoPublicacion !=="terreno"){?>
                        <?php if($value['field_name'] == "cochera"){ ?>
                    		<div><label>Cochera</label></div>
                        	<div class="specs-property"><?php echo $value['field_value']; ?></div>
						 <?php } ?>
                        <?php }?>
                        <?php if($value['field_name'] == "cantidad-carros"){ ?>
                    		<div class="cant-carros"><label>Cantidad de Carros</label></div>
	                        <div class="cant-carros specs-property" >
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "cuarto-lavado"){ ?>
                    		<div><label>Cuarto de Lavado</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						<?php if($value['field_name'] == "porton-electrico"){ ?>
                    		<div><label>Porton Eléctrico</label></div>
	                        <div class="specs-property">
	                            <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "acondicionado"){ ?>
                    		<div><label>Aire Acondicionado</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                        <?php } ?>
                        <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
                        <?php if($value['field_name'] == "jardin"){ ?>
                    		<div><label>Jardin</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
						 <?php } ?>
						 <?php if($tipoPublicacion !=="terreno" || $tipoPublicacion !=="alquileres"){?>
						 <?php if($value['field_name'] == "bodega"){ ?>
                    		<div><label>Bodega</label></div>
	                        <div class="specs-property"><?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                       	<?php } ?>
                       	
                     	<?php if($tipoPublicacion ==="terreno" || $tipoPublicacion !=="alquileres" ){?>
					 	<?php if($value['field_name'] == "topografia"){ ?>
                       	<div><label>Topografia</label></div>
                        <div class="specs-property"><?php echo $value['field_value']; ?>
                        </div>
                       	<?php } ?>
                       	<?php } ?>
                       	
                        <?php if($value['field_name'] == "observacion"){ ?>
                    		<div><label>Observaciones</label></div>
                                <div class="description">
	                           <?php echo $value['field_value']; ?>
	                        </div>
						 <?php } ?>
                    <?php $c +=1; } ?>
                    		<?php if(!empty($value['tipo_categoria']) ){ ?>
                                
                                
                    		  
                    	<?php  $tipoPublicacion = $value['tipo_categoria']; } ?>
                          
           
	                    		
		                        
	                        
						 
		<?php }?>
                    <script type='text/javascript'>
            var map = null;
            var infoWindow = null;
            
            <?php if(!empty($lat)) {?>
               var lat = <?php echo @$lat; ?>;
             
            <?php }?>
                 <?php if(!empty($lng)) {?>
               var lng =  <?php echo @$lng; ?>;
                         <?php }?>
            function initialize() {
                var myLatlng = new google.maps.LatLng(lat, lng);
                var myOptions = {
                  zoom: 8,
                  center: myLatlng,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                map = new google.maps.Map($("#google_map").get(0), myOptions);

                infoWindow = new google.maps.InfoWindow();

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    draggable: false,
                    map: map,
                    title:"Aqui esta"
                });
                    
            }
            </script>
                   <div>
                        <div class="local-map">
                            <div id="google_map"></div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>


<?php include_once('/../footer.php') ;?>
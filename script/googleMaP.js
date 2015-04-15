var infowindow = new google.maps.InfoWindow;
  var mapCenter = new google.maps.LatLng(9.633931465220899, -84.25418434999995); //Google map Coordinates
  var map;
  var url;
  var url2;
  var files;
  var readmore;
  var avgLat;
  var avgLng;
  var publications = [];

   
     
     
  
    function onMarkerClick(marker,contentString){
      //var marker = this;
      
      infowindow.close();
         
      infowindow.setContent(contentString);
      
      infowindow.open(map, marker);
    }
  
    function map_initialize()
  {
      var googleMapOptions = 
      { 
        center: mapCenter, // map center
        zoom: 8, //zoom level, 0 = earth view to higher value
        maxZoom: 18,
        minZoom: 4,
        zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL //zoom control size
      },
        scaleControl: true, // enable scale control
        mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
      };
    
        map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);
        
        var bounds = new google.maps.LatLngBounds();
         
       
      //Load Markers from the XML File, Check (map_process.php)

        for(var i = 0; i < publications.length; i++){
            create_marker(publications[i].point, publications[i].name, publications[i].address, false, false, false, url2+"/"+ publications[i].type +".png", publications[i].photo, publications[i].id, publications[i].observacion);
            bounds.extend(publications[i].point);
        }
        
        map.fitBounds(bounds);
  }
  
    function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath, imagen, id, observacion)
  {   
    //new marker
    eval('var marker' + id + ' = new google.maps.Marker({ position: MapPos,  map: map, draggable:DragAble,animation: google.maps.Animation.DROP,title:MapTitle, icon: iconPath});');
    
    var texto= MapDesc.slice(0,180);
    
    var texto2= observacion.slice(0,50);
    //Content structure of info Window for the Markers
    var contentString = '<div class="marker-info-win">'+
    '<div class="marker-inner-win">'+
    '<h1 class="marker-heading">'+MapTitle+'</h1><span class="info-content"><p>'+
    texto+ 
    '</p><p class="texto2">'+
    texto2+ 
    '</p><img src="'+files+'/'+imagen+'" alt=""><div class="read-more"><a href="'+readmore+'/show/'+id+'"><span>leer Más</span></a></div></span>'+
    '</div></div>';  


    google.maps.event.addListener(map, 'click', function() {
      infowindow.close();
    });
    var marker_obj = eval('marker' + id);
    google.maps.event.addListener(marker_obj, 'click', function(){
        onMarkerClick(this,contentString);
    });
    if(InfoOpenDefault) //whether info window should be open by default
    {
      infowindow.open(map,marker_obj);
    }
  }
  
    
  
  function get_publications(){
      var latArray = [];
      var lngArray = [];
   
      $.ajax({
  url: url,
  async: false,
  success: function(data) {
     $(data).find("marker").each(function () {
            var name    = $(this).attr('name');
            var address   = $(this).attr('address');
            var type    = $(this).attr('type');
            var photo    = $(this).attr('photo');
            var id    = $(this).attr('id');
            var observacion    = $(this).attr('observacion');
            var lat = parseFloat($(this).attr('lat'));
            latArray.push(lat);
            var lng = parseFloat($(this).attr('lng'));
            lngArray.push(lng);
            var point   = new google.maps.LatLng(lat,lng);
            publications.push({name: name, address: address,type:type,photo:photo,id:id,observacion:observacion,point:point});
        });
  }
  });
        latArray.sort(sortNumber);
        lngArray.sort(sortNumber);
        
        avgLat = latArray[0]+((latArray[latArray.length-1]-latArray[0])/2);
        avgLng = lngArray[0]+((lngArray[lngArray.length-1]-lngArray[0])/2);
        
        mapCenter = new google.maps.LatLng(avgLat, avgLng);
  
  }
  
  function sortNumber(a,b) {
    return a - b;
}
     
     

$(document).ready(function() {
    $("#send").click(function()
    { 
         $('#msjerrror').hide();
      var markers = [];
    var googleMapOptions = 
      { 
        center: mapCenter, // map center
        zoom: 8, //zoom level, 0 = earth view to higher value
        maxZoom: 18,
        minZoom: 4,
        zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL //zoom control size
      },
        scaleControl: true, // enable scale control
        mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
      };
    
        map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);     
       function setAllMap(map) {
          for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
          }
        }
        function clearOverlays() {
          setAllMap(null);
        }
     clearOverlays();
        markers = [];
        var bounds = new google.maps.LatLngBounds();
         
       
      //Load Markers from the XML File, Check (map_process.php)

      
        
        
    
    
   
   var data = $('#formbuscar').serializeArray();
   var busquedaavance = $('#busquedaavance').val();
    if (busquedaavance == 1){
        var url = "../Inicio/busqueda";
    
        }
    else {var url = "index.php/Inicio/busqueda";
    
        }
    ;
       $.ajax({
        type: "post",
        url: url,
        cache: false,               
        
        data:{
	                data:data
	            },
        success: function(data1){                        
        try{        
             if(data1 == null){
                $('#msjerrror').show();
                $('#msjerrror').append('Con esa busqueda no hay ningun resultado, Intente con otra opcion');
            }
            $(data1).find("marker").each(function () {
            var name    = $(this).attr('name');
            var address   = $(this).attr('address');
            var type    = $(this).attr('type');
            var photo    = $(this).attr('photo');
            var id    = $(this).attr('id');
            var observacion    = $(this).attr('observacion');
            var point   = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
            create_marker(point, name, address, false, false, false, url2+"/"+ type +".png", photo, id, observacion);
            bounds.extend(point);
            map.fitBounds(bounds);
        });


        }catch(e) {     
            alert('Exception while request..');
        }       
        },
        error: function(){                      
            alert('Error while request..');
        }
        });
    
  });
  
  
  
    $("#mostrar").click(function(){
            $('#cmenu').show(500);
            $('#cmenu').show("slow");
            $('.form-search.content-description').css("margin-bottom","25px", 'slow');
     });
     
         $("#ocultar").click(function(){
            $('#cmenu').hide(500);
            $('#cmenu').hide("fast");
            $('.form-search.content-description').css("margin-bottom","20px", 'slow');
     });
     
     
     $(".send1").click(function()
    {
        
       $('#msjerrror').hide();
       $('#msjerrror').empty();
       var categoria = $(this).attr("id") 
       $(".mainmenu-itemvertical").removeClass("active");
       $("#"+categoria).addClass("active");
       dataarray = [ {
    "name" : "tipo_categoria",
    "value" : categoria }];
      var markers = [];
    var googleMapOptions = 
      { 
        center: mapCenter, // map center
        zoom: 8, //zoom level, 0 = earth view to higher value
        maxZoom: 18,
        minZoom: 4,
        zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL //zoom control size
      },
        scaleControl: true, // enable scale control
        mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
      };
    
        map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);     
       function setAllMap(map) {
          for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
          }
        }
        
        function clearOverlays() {
          setAllMap(null);
        }
     clearOverlays();
        markers = [];
    
        var bounds = new google.maps.LatLngBounds();
         
       
      //Load Markers from the XML File, Check (map_process.php)

        for(var i = 0; i < publications.length; i++){
            if(publications[i].type == categoria){
            create_marker(publications[i].point, publications[i].name, publications[i].address, false, false, false, url2+"/"+ publications[i].type +".png", publications[i].photo, publications[i].id, publications[i].observacion);
            bounds.extend(publications[i].point);
        }
        }
        
        map.fitBounds(bounds);
    
   var data = dataarray;
       $.ajax({
        type: "post",
        url: "index.php/Inicio/busqueda",
        cache: false,               
        
        data:{
	                data:data
	            },
        success: function(data1){                        
        try{     
            if(data1 == null){
                $('#msjerrror').show();
                $('#msjerrror').append('Con esa busqueda no hay ningun resultado, Intente con otra opcion');
            }
            $(data1).find("marker").each(function () {
            var name    = $(this).attr('name');
            var address   = $(this).attr('address');
            var type    = $(this).attr('type');
            var photo    = $(this).attr('photo');
            var id    = $(this).attr('id');
            var observacion    = $(this).attr('observacion');
            var point   = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
            create_marker(point, name, address, false, false, false, url2+"/"+ type +".png", photo, id, observacion);
        });


        }catch(e) {     
            alert('Exception while request..');
        }       
        },
        error: function(){                      
            alert('Error while request..');
        }
        });
    
  });
     
     
     
     
    $('#msjerrror').hide();
    $(".nav-content-left ul li").mouseover(function(e) {$(this).addClass(" iehover ");});
    $(".nav-content-left ul li").mouseout(function(e) {$(this).removeClass(" iehover ");});
   var dondeestoy = $('#dondeestoy').val();
    if(dondeestoy == 'Inicio'){
        url = 'index.php/Inicio/mapa';
        url2 = 'icons';
        files = "files";
        readmore = "index.php/Publicadas";
    }
    else{
        url = '../Inicio/mapa';
        url2 = '../../icons';
        files = "../../files";
        readmore = "../../index.php/Publicadas";
    }
    $( ".gm-style-iw" ).css('width','404px');
    $('#cmenu').hide();
    
  get_publications();
    
  map_initialize(); // initialize google map
  
  //############### Google Map Initialize ##############
});
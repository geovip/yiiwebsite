   <head>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
   <script type="text/javascript">
var geocoder;
var map;
 function load() {
    
        var marker;
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        
        var myOptions = {
          zoom: 8,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
          map:map,
          draggable:true,
          animation: google.maps.Animation.DROP,
          position: latlng
        });
        google.maps.event.addListener(marker, 'dragend', function(event){
            var point = marker.getPosition();
            map.panTo(point);
            
        });
    }
  
	  
    </script>
   </head>
<body onload="load()" onunload="GUnload()" >


   <div id="slider">
  
    <p>
        <div align="center" id="map" style="width: 100%; height: 400px"><br/></div>
    </p>

     
    <div class="clr"></div>
    <div class="click_blog"> <img src="<?php echo Yii::app()->request->baseUrl ?>/images/Get_in_touch.gif" alt="picture" width="163" height="47" />
      <p>Mikonos island in Greece, Chichi-jima in Japan, more cool places in Tour VN</p>
      <div class="clr"></div>
    </div>
    <!-- end #slideshow -->
    <div class="clr"></div>
  </div>
  </body>
  <div class="body">
    <div class="body_resize">
      <div class="port">
        <h2>What We Do</h2>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img_1.jpg" alt="picture" width="276" height="148" />
        <div class="clr"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id tristique sem. Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. <br />
        </p>
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/read_more.gif" alt="picture" width="85" height="26" border="0" class="floated" /></a></div>
      <div class="port">
        <h2>A Little About Us</h2>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img_2.jpg" alt="picture" width="276" height="148" />
        <div class="clr"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id tristique sem. Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. <br />
        </p>
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/read_more.gif" alt="picture" width="85" height="26" border="0" class="floated" /></a></div>
      <div class="port last">
        <h2>Testimonial</h2>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/test.gif" alt="picture" width="36" height="28" class="floated" />
        <div class="clr"></div>
        <p>“ Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”</p>
        <div class="bg"></div>
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/test_img.gif" alt="picture" width="38" height="37" border="0" class="floated" style="padding:10px 20px 0 0;" /></a>
        <p style="padding:10px 20px 0 20px;"><strong>John Doe, <br />
          Creative Director of Website.com</strong></p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  



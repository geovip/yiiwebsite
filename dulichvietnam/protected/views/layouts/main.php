<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mootools-1.2.2.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="all">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.2.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-replace.js"></script>  
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Myriad_Pro_600.font.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5.js"></script>
	<![endif]-->
    <script type="text/javascript">
        Cufon.replace('h1')('h2')('h3')('h4')('div.menu li');
    </script>
   
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <script type="text/javascript">    
      jQuery.noConflict();
    </script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="page1">
<div class="extra">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Around the World</a></h1>
				<div class="right">
					<div class="wrapper">
						<form id="search" action="" method="post">
							<div class="bg">
								<input type="submit" class="submit" value="">
								<input type="text" class="input">
							</div>
						</form>
					</div>
					<div class="wrapper">
						<nav>
							<ul id="top_nav">
								<li><a href="#">Register</a></li>
								<li><a href="#">Log In</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>
			<nav>
				<ul id="menu">
					<li><a href="index.html" class="nav1">Home</a></li>
					<li><a href="About.html" class="nav2">About Us </a></li>
					<li><a href="Tours.html" class="nav3">Our Tours</a></li>
					<li><a href="Destinations.html" class="nav4">Destinations</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Contacts</a></li>
				</ul>
			</nav>
			<article class="col1">
				<ul class="tabs">
					<li><a href="#" class="active">Flight</a></li>
					<li><a href="#">Hotel</a></li>
					<li><a href="#">Car</a></li>
					<li class="end"><a href="#">Cruise</a></li>
				</ul>
				<div class="tabs_cont">
					<form id="form_1" action="" method="post">
						<div class="bg">
							<div class="wrapper">
								<div class="radio">
									<input type="radio" name="name1" checked>Round trip
								</div>
								<div class="radio"><input type="radio" name="name1">One way</div>
							</div>
							<a href="#">Multiple destinations</a>
							<div class="wrapper"><input type="text" class="input">From</div>
							<div class="wrapper"><input type="text" class="input">To</div>	
							<div class="wrapper check_box"><input type="checkbox" checked ><a href="#">Search nearby airports</a></div>	
							<div class="wrapper"><input type="text" class="input input2" value="04/11/2010"  onblur="if(this.value=='') this.value='04/11/2010'" onfocus="if(this.value =='04/11/2010' ) this.value=''">Depart (mm/dd/yy)</div>
							<div class="wrapper pad_bot1"><input type="text" class="input input2" value="04/11/2010"  onblur="if(this.value=='') this.value='04/11/2010'" onfocus="if(this.value =='04/11/2010' ) this.value=''">Return  (mm/dd/yy)</div>
							<div class="wrapper">
								<div class="radio"><input type="radio" name="name2" checked>Economy cabin</div>
								<div class="radio end"><input type="radio" name="name2">Business</div>
							</div>
							<div class="wrapper pad_bot1">
								<a href="#" class="button" onclick="document.getElementById('form_1').submit()">Search</a>
								Audlts <select><option>1</option></select>
							</div>
						</div>							
					</form>
				</div>
			</article>
			<article class="col1 pad_left1">
				<div class="text">
					<img src="images/text1.jpg" alt="">
					<h2>The Best Offers</h2>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
					<a href="#" class="button">Read More</a>
				</div>
			</article>
			<div class="img"><img src="images/img.jpg" alt=""></div>
		</header><div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
<!-- / header -->
<!-- content -->
		<?php echo $content; ?>
		
<!-- / content -->
	</div>
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<a href="http://www.templatemonster.com/" target="_blank">Website template</a> designed by TemplateMonster.com<br>
			<a href="http://www.templates.com/product/3d-models/" target="_blank">3D Models</a> provided by Templates.com
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<head>
<script type="text/javascript">
var geocoder= new google.maps.Geocoder();
function search(address) {
    
	       var myOptions = {
              zoom: 8,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
           var map = new google.maps.Map(document.getElementById("map"), myOptions);
           //add behin
           geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map, 
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: results[0].geometry.location
                });
                var lat = results[0].geometry.location.lat().toFixed(5);
                var lng = results[0].geometry.location.lng().toFixed(5);
                var url= "<?php echo Yii::app()->request->baseUrl.'/?r=photo/popular&order=view_count&lat='?>"+lat+'&lng='+lng;
                window.location.href= url;
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
           //add end
            }
   jQuery('#form1').submit(function(){
        var address= jQuery('#textfield').val();
        
        search(address);return false;
        
   });

</script>
</head>
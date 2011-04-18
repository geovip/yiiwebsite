<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
    <!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <style type="text/css">
    .main { margin:0 auto; padding:0;}
    .main2 { margin:0 auto; padding:0; background: url(<?php echo Yii::app()->request->baseUrl;?>/images/main_bg2.gif) top center repeat-x;}
    .search span { display:block; float:left; background: url(<?php echo Yii::app()->request->baseUrl;?>/images/search_bg.gif) left top no-repeat; width:168px; padding:0; height:32px;}
    </style>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mootools-1.2.2.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/myradpro.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('h1')('h2')('h3')('h4')('div.menu li');
    </script>
    <!-- flash script -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flash_detect.v1.7.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <script type="text/javascript">    
      jQuery.noConflict();
    </script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="main">

	<div class="header">
    <div class="Click"> Follow us on the social network sites for the latest updates on our projects or so.</div>
    <div class="rss"> 
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/rss_4.gif" alt="picture" width="16" height="16" class="floated" /> 
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/rss_3.gif" alt="picture" width="16" height="16" class="floated" /> 
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/rss_2.gif" alt="picture" width="16" height="16" class="floated" /> 
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/rss_1.gif" alt="picture" width="16" height="16" class="floated" /> 
    </div>

    <div class="search">
      <form id="form1" name="form1" method="post" action="">
        <span>
        <input name="search" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
        </span>
        <input name="b" type="image" src="<?php echo Yii::app()->request->baseUrl ?>/images/search.gif" class="button" />
      </form>
      
    </div>
    <div class="clr"></div>
    <div class="menu">
      <div class="logo"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" width="197" height="89" border="0" alt="logo" /></a></div>
      <ul>
      <?php
          $this->widget('zii.widgets.CMenu',array(
    			'items'=>array(
    				array('label'=>'Your Photos', 'url'=>array('/album/listalbum'), 'visible'=>!Yii::app()->user->isGuest),
    				array('label'=>'Upload', 'url'=>array('/album/create'), 'visible'=>!Yii::app()->user->isGuest),
    				
    				array('label'=>'Sign up', 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),
    				array('label'=>'Sign in', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
    				array('label'=>'Sign out ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
    			),
    		));  
      ?>
        
      </ul>
      <div class="clr"></div>
    </div>
   
    <div class="clr"></div>
  </div>
 
   <div class="clr"></div>
    <!-- header -->
<!--
	<div id="mainmenu">-->
    
		<?php 
        /*
            $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); 
        */ ?>
	<!-- mainmenu -->

	<?php 
    /*
        $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	));
    */ 
    ?>
    <!-- breadcrumbs -->

	<?php echo $content; ?>
    <div class="clr"></div>
    <div class="FBG">
    
  </div>
	

</div><!-- page -->
<div class="footer">
      <div class="footer_resize">
        <p class="leftt">© Copyright <a href="#">TourVN</a>.  </p>
        <p class="right"><a href="http://www.tourvn.vn">http://www.tourvn.vn </a></p>
        <div class="clr"></div>
      </div>
    </div><!-- footer -->
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
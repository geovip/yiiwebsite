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
    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/myradpro.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('h1')('h2')('h3')('h4')('div.menu li');
    </script>
    <!-- flash script -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flash_detect.v1.7.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript">    
      jQuery.noConflict();
    </script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="main" id="page">

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
        <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
        </span>
        <input name="b" type="image" src="<?php echo Yii::app()->request->baseUrl ?>/images/search.gif" class="button" />
      </form>
    </div>
    <div class="clr"></div>
    <div class="menu">
      <div class="logo"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" width="197" height="89" border="0" alt="logo" /></a></div>
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#"> Services </a></li>
        <li><a href="#"> Portfolio</a></li>
        <li><a href="#"> About Us</a></li>
        <li><a href="#"> Contact Us</a></li>
      </ul>
      <div class="clr"></div>
    </div>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/header_im_bottom.gif" alt="picture" width="980" height="22" />
    <div class="clr"></div>
  </div>
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
	</div><!-- mainmenu -->

	<?php 
    /*
        $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	));
    */ 
    ?>
    <!-- breadcrumbs -->

	<?php echo $content; ?>
    <div class="FBG">
    <div class="FBG_resize">
      <div class="blog">
        <h2>Recent Post</h2>
        <div class="clr"></div>
        <ul>
          <li><a href="#">Full standards compliance</a></li>
          <li><a href="#">All of Videos Supported</a></li>
          <li><a href="#">Spam protection</a></li>
          <li><a href="#">Video Support!</a></li>
          <li><a href="#">We have gone!</a></li>
          <li><a href="#">Dummy Photo</a></li>
        </ul>
      </div>
      <div class="blog">
        <h2>Miscelaneous</h2>
        <div class="clr"></div>
        <ul>
          <li><a href="#">Development Blog</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">Plugins</a></li>
          <li><a href="#">Suggest Ideas</a></li>
          <li><a href="#">Support Forum</a></li>
          <li><a href="#">Themes</a></li>
        </ul>
      </div>
      <div class="blog">
        <h2>Latest News</h2>
        <p><strong>At vero eos et accusamus et iusto </strong><br />
          <a href="#">January 6, 2010</a><br />
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dolore magna aliqua...</p>
        <p><strong>Cras lobortis mauris vel diam </strong><br />
          <a href="#">February 27, 2010</a><br />
          Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet...</p>
        <div class="clr"></div>
      </div>
      <div class="blog last">
        <h2>Our Skills</h2>
        <div class="clr"></div>
        <ul>
          <li><a href="#">Site Admin</a></li>
          <li><a href="#">Log out</a></li>
          <li><a href="#">Entries RSS</a></li>
          <li><a href="#">Comments RSS</a></li>
          <li><a href="#">WordPress.org</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
	<div class="footer">
      <div class="footer_resize">
        <p class="leftt">© Copyright <a href="#">Templatesold</a>. All Rights Reserved </p>
        <p class="right"> (TS) <a href="http://www.templatesold.com">Website Templates</a></p>
        <div class="clr"></div>
      </div>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
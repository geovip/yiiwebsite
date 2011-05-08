
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title>Admin Control Panel - TourVN Administrator - <?php echo CHtml::encode($this->pageTitle); ?></title> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <style type="text/css" media="all"> 
            @import url(<?php echo Yii::app()->request->baseUrl; ?>/css/admin/style.css);
            img {behavior:url('js/iepngfix.htc') !important;}
        </style>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.2.js" type="text/javascript"></script> 
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery_ui.js" type="text/javascript"></script> 
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/wysiwyg.js" type="text/javascript"></script> 
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/functions.js" type="text/javascript"></script> 
        
    </head> 
    <body> 
        <div id="container"> <!-- Container --> 
            <div id="header"> <!-- Header --> 
                <div id="title"> 
			Admin Control Panel
                    <span>TourVN Administrator</span> 
                </div> 
                <div class="logged"> 
                    <p>Hi, <a href="#" title=""><?php echo Yii::app()->user->name ?></a> ! Have a good day.</p> 
                    <p><?php echo CHtml::link('Logout', array('panel/logout')); ?></p> 
                </div> 
            </div>	
            <div id="sidebar"> <!-- Sidebar --> 
                <div class="sidebox"> 
                    <span class="stitle">Navigation</span> 
                    <div id="navigation"> <!-- Navigation begins here --> 
                        <div class="sidenav"><!-- Sidenav --> 
                            <div class="navhead_blank"><span><?php echo CHtml::link('Dashboard', array('panel/index')); ?></span></div> 
                            <div class="navhead"><span><?php echo CHtml::link('User'); ?></span></div> 
                            <div class="subnav"> 
                                <ul class="submenu"> 
                                    <li><?php echo CHtml::link('Add a user', array('user/add')); ?></li> 
                                    <li><?php echo CHtml::link('Manage user', array('user/manage')); ?></li> 
                                    <li><?php echo CHtml::link('Manage comment', array('comment/manage')); ?></li> 
                                    <li><?php echo CHtml::link('Manage album', array('album/user')); ?></li> 
                                </ul> 
                            </div> 	
                            <div class="navhead"><span><?php echo CHtml::link('Category'); ?></span></div> 
                            <div class="subnav"> 
                                <ul class="submenu"> 
                                    <li><?php echo CHtml::link('Add a category', array('album/add')); ?></li> 
                                    <li><?php echo CHtml::link('Manage category', array('album/manage')); ?></li> 							
                                </ul> 
                            </div>
                            <div class="navhead"><span><?php echo CHtml::link('Gold Place'); ?></span></div> 
                            <div class="subnav"> 
                                <ul class="submenu"> 
                                    <li><?php echo CHtml::link('Add a place', array('place/add')); ?></li> 
                                    <li><?php echo CHtml::link('Manage place', array('place/manage')); ?></li> 							
                                </ul> 
                            </div>                                
                            <div class="navhead"><span><?php echo CHtml::link('Adsvertisment'); ?></span></div> 
                            <div class="subnav"> 
                                <ul class="submenu"> 
                                    <li><?php echo CHtml::link('Add a adsvertisment', array('ads/add')); ?></li> 
                                    <li><?php echo CHtml::link('Manage adsvertisment', array('ads/manage')); ?></li> 							
                                </ul> 
                            </div>
                        </div> 
                    </div> <!-- END Navigation --> 
                </div> 
                <div class="sidebox"> 
                    <span class="stitle">Calendar Panel</span> 
                    <div id="datepicker"></div> 

                </div> 		 
            </div> <!-- END Sidebar --> 
            <div id="main"> <!-- Main, right side content --> 
                <div id="content"> <!-- Content begins here --> 
                    <?php echo $content; ?>
                </div> <!-- END Content --> 

            </div> 	
            <div id="footer"> 
                <p>Copyright <a rel="dofollow" target="_blank" href="http://TourVn.Co.Cc/">TourVn</a> 2011. All rights reserved.</p> 
            </div>	
        </div> <!-- END Container --> 
    </body> 
</html>
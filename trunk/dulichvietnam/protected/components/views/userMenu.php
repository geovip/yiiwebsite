<style type="text/css">
.portlet-decoration {
    background:#B7D6E7 none repeat scroll 0 0;
    border-left:5px solid #6FACCF;
    padding:3px 8px;
}
.portlet-title {
    color:#298DCD;
    
    font-weight:bold;
    margin:0;
    padding:0;
}
.portlet-content {
    background:#EFFDFF none repeat scroll 0 0;
    font-size:0.9em;
    margin:0 0 15px;
    padding:5px 8px;
}
.portlet-content ul {
    list-style-image:none;
    list-style-position:outside;
    list-style-type:none;
    margin:0;
    padding:0;
}
.portlet-content li {
    padding:2px 0 4px;
}
.portlet-content ul li a {
    color:#000099;
    text-decoration:none;
}
.portlet-content ul li a:hover{
    
    text-decoration:underline;
}
</style>
<ul>
	
	<li><?php echo CHtml::link('Manage Users',array('user/admin')); ?></li>
	<li><?php echo CHtml::link('Manage Albums',array('album/admin')); ?></li>
    
    <li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>
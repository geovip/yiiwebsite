// jQuery CONFIGURATION FILE FOR BLACKADMINV2 

jQuery(document).ready(function() {

 //NAVIGATION MENU
  jQuery('div.sidenav:eq(0)> div.subnav').hide();
  jQuery('div.sidenav:eq(0)> div.navhead').click(function() {
	jQuery(this).parent().find("div.subnav").slideUp('normal');
	jQuery(this).parent().find("div.navhead").removeClass("selected");
	jQuery(this).next().slideToggle('slow');
	jQuery(this).toggleClass("selected");
  });


 //DATE PICKER
	   jQuery("#datepicker").datepicker();


 //CLOSE NOTIFICATIONS BUTTON
	jQuery(".close").click(
		function () {
			jQuery(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
				jQuery(this).slideUp(400);
			});
			return false;
		}
	);
	

 //Initialize WYSIWYG editor

	jQuery("#wysiwyg").wysiwyg();


 // Check all the checkboxes when the head one is selected:
		
	jQuery('.checkall').click(
		function(){
			jQuery(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', jQuery(this).is(':checked'));   
		}
	);


});
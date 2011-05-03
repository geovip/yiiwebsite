<style type="text/css">
.error-message{color: red;}
</style><head> 	
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var map;
 function load() {
    
    var marker;
    
    var latlng;
    
    latlng = new google.maps.LatLng(-34.397, 150.644);
    
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    //set maker hien tai
    
    marker = new google.maps.Marker({
      map:map,
      //draggable:true,
      animation: google.maps.Animation.DROP,
      position: latlng
    });
    
    
   
}
    </script>
  </head>

<div id="slider">
    <h2>Sign up</h2>
</div>
<div class="clr"></div>
<div class="body">
    <div class="body_resize">
        <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
    
        <div class="right">
            <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>

    </div>
</div>
<script type="text/javascript">
window.addEvent('domready', function(){
   jQuery('#signup').click(function(){
        var user_name= jQuery('#username').val();
        
        var username = validUsername('username',6,'username-err', user_name);
        var password = checkPassword('password',8,'password1-err','Password');
        var rpassword = matchValue('password','retype_pass','password2-err','Retype Password','Password');
        var email = isEmail('email','email-err'); 
        var valid = email && username && password && rpassword;
        var pass= jQuery('#password').val();
        var mail= jQuery('#email').val();
        var phone= jQuery('#phone').val();
        var displayname= jQuery('#displayname').val();
        var photo= jQuery('#photo').val();
        
        //check photo
        if(photo){
            if (!photo.match(/(?:gif|jpg|png|bmp)$/)) {
            // inputted file path is not an image of one of the above types
                //alert("inputted file path is not an image!");
                jQuery('#photo-err').html("Inputted file path is not an image!")
                return false;
            }
        }
        
        var url="<?php echo Yii::app()->request->baseUrl ?>/?r=user/sign";
        if(valid){
            
            new Request({
            url: url,
            method: "post",
           data:{
                'ajax': 'ajax',
                'username': user_name,
                'displayname': displayname,
                'password': pass,
                'email': mail,
                'phone': phone,
                'photo': photo
            },
            onSuccess : function(responseHTML)
            {
                
                if(responseHTML=='username'){
                    jQuery('#username-err').html('Username is exist ');
                }
                else if(responseHTML=='email'){
                    jQuery('#email-err').html('Email is exist ');
                }
                else{
                    jQuery('#form-demo').submit();
                }
            		
            }
            }).send();
        }
        return false;
   }); 
});
</script>
<script type="text/javascript">

function validUsername(txt_id, min, err_id, lbl){
	var str = document.getElementById(txt_id);	
	var err = document.getElementById(err_id);	
	if(str.value.length < min){     
		if(str.className.indexOf("error") < 0) str.className += "error";
		err.innerHTML = lbl + " at least " + min + " character";
		return false;
	}else{
	    var aphabel = new RegExp(/^([a-zA-Z0-9]+)$/);
		if(aphabel.test(str.value)) {
            str.className = str.className.replace('error','');
            err.innerHTML = "";
    		return true;
		}
		else{
			if(str.className.indexOf("error") < 0) str.className += "error";
		 	err.innerHTML = lbl + " only letters and numbers";
            return false;
		}		
	}		
}
function checkPassword(txt_id, min, err_id, lbl){
	var str = document.getElementById(txt_id);	
    
	var err = document.getElementById(err_id);	
	if(str.value.length < min){     
		if(str.className.indexOf("error") < 0) str.className += "error";
		err.innerHTML = lbl + " at least " + min + " character";
		return false;
	}else{
	    var aphabel = new RegExp(/([a-zA-Z]+)/);
        var numberic = new RegExp(/([0-9]+)/);
		if(aphabel.test(str.value) && numberic.test(str.value)) {
            str.className = str.className.replace('error','');
            err.innerHTML = "";
    		return true;
		}
		else{
			if(str.className.indexOf("error") < 0) str.className += "error";
		 	err.innerHTML = lbl + " must only letters and numbers";
            return false;
		}		
	}		
}
function matchValue(txt_id1,txt_id2,err_id,lbl1,lbl2) {
	var str1 = document.getElementById(txt_id1);	
	var str2 = document.getElementById(txt_id2);	
	var err = document.getElementById(err_id);		
	if(str1.value === str2.value){     
		err.innerHTML = "";
		str2.className = str2.className.replace('error','');
		return true;
	}else{
		 if(str2.className.indexOf("error") < 0) str2.className += "error";
		 err.innerHTML = lbl1 + " is not match with " + lbl2;		 
		 return false;
	}
}
function isEmail(email_id,err_id){
	var str = document.getElementById(email_id);	
	var err = document.getElementById(err_id);		
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
	if(emailRegExp.test(str.value)){     
	err.innerHTML = "";
	str.className = str.className.replace('error','');
	return true;
	}else{
	 if(str.className.indexOf("error") < 0) str.className += "error";
	 err.innerHTML = "Email address incorect";	 
	return false;
	}
}
</script>
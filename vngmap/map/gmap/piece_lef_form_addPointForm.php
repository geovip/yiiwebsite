<?php include_once 'Utility.php'; ?>
<script type="text/javascript">
	function initLeftFormJS(){
	google.maps.event.addListener(map, 'click', function(event) {
		document.addPoint.x.value=event.latLng.lat();
		document.addPoint.y.value=event.latLng.lng();
	});
	}
	function codeAddress() {
	    var address =""+ document.addPoint.street.value+" , "+document.addPoint.district.value+" , "+document.addPoint.provincesorcity.value;
	    if (geocoder) { 
	      geocoder.geocode( { 'address': address}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {
	          map.setCenter(results[0].geometry.location);
	          var marker = new google.maps.Marker({
	              map: map, 
	              position: results[0].geometry.location
	          });
	        } else {
	          alert("Geocode was not successful for the following reason: " + status);
	        }
	      });
	    }
	  }
	function UnicodeToCompound(str1) {
		str1 = str1.replace(/\u00E1/g, 'a');
		str1 = str1.replace(/\u00C1/g, 'A');
		str1 = str1.replace(/\u00E0/g, 'a');
		str1 = str1.replace(/\u00C0/g, 'A');
		str1 = str1.replace(/\u1EA3/g, 'a');
		str1 = str1.replace(/\u1EA2/g, 'A');
		str1 = str1.replace(/\u00E3/g, 'a');
		str1 = str1.replace(/\u00C3/g, 'A');
		str1 = str1.replace(/\u1EA1/g, 'a');
		str1 = str1.replace(/\u1EA0/g, 'A');
		

		str1 = str1.replace(/\u0103/g, 'a');
		str1 = str1.replace(/\u0102/g, 'A');
		str1 = str1.replace(/\u1EAF/g, 'a');
		str1 = str1.replace(/\u1EAE/g, 'A');
		str1 = str1.replace(/\u1EB1/g, 'a');
		str1 = str1.replace(/\u1EB0/g, 'A');
		str1 = str1.replace(/\u1EB3/g, 'a');
		str1 = str1.replace(/\u1EB2/g, 'A');
		str1 = str1.replace(/\u1EB5/g, 'a');
		str1 = str1.replace(/\u1EB4/g, 'A');
		str1 = str1.replace(/\u1EB7/g, 'a');
		str1 = str1.replace(/\u1EB6/g, 'A');
		



		str1 = str1.replace(/\u00E2/g, 'a');
		str1 = str1.replace(/\u00C2/g, 'A');
		str1 = str1.replace(/\u1EA5/g, 'a');
		str1 = str1.replace(/\u1EA4/g, 'A');
		str1 = str1.replace(/\u1EA7/g, 'a');
		str1 = str1.replace(/\u1EA6/g, 'A');
		str1 = str1.replace(/\u1EA9/g, 'a');
		str1 = str1.replace(/\u1EA8/g, 'A');
		str1 = str1.replace(/\u1EAB/g, 'a');
		str1 = str1.replace(/\u1EAA/g, 'A');
		str1 = str1.replace(/\u1EAD/g, 'a');
		str1 = str1.replace(/\u1EAC/g, 'A');
		


		str1 = str1.replace(/\u00E9/g, 'e');
		str1 = str1.replace(/\u00C9/g, 'E');
		str1 = str1.replace(/\u00E8/g, 'e');
		str1 = str1.replace(/\u00C8/g, 'E');
		str1 = str1.replace(/\u1EBB/g, 'e');
		str1 = str1.replace(/\u1EBA/g, 'E');
		str1 = str1.replace(/\u1EBD/g, 'e');
		str1 = str1.replace(/\u1EBC/g, 'E');
		str1 = str1.replace(/\u1EB9/g, 'e');
		str1 = str1.replace(/\u1EB8/g, 'E');
		


		str1 = str1.replace(/\u00EA/g, 'e');
		str1 = str1.replace(/\u00CA/g, 'E');
		str1 = str1.replace(/\u1EBF/g, 'e');
		str1 = str1.replace(/\u1EBE/g, 'E');
		str1 = str1.replace(/\u1EC1/g, 'e');
		str1 = str1.replace(/\u1EC0/g, 'E');
		str1 = str1.replace(/\u1EC3/g, 'e');
		str1 = str1.replace(/\u1EC2/g, 'E');
		str1 = str1.replace(/\u1EC5/g, 'e');
		str1 = str1.replace(/\u1EC4/g, 'E');
		str1 = str1.replace(/\u1EC7/g, 'e');
		str1 = str1.replace(/\u1EC6/g, 'E');
		



		str1 = str1.replace(/\u00ED/g, 'i');
		str1 = str1.replace(/\u00CD/g, 'I');
		str1 = str1.replace(/\u00EC/g, 'i');
		str1 = str1.replace(/\u00CC/g, 'I');
		str1 = str1.replace(/\u1EC9/g, 'i');
		str1 = str1.replace(/\u1EC8/g, 'I');
		str1 = str1.replace(/\u0129/g, 'i');
		str1 = str1.replace(/\u0128/g, 'I');
		str1 = str1.replace(/\u1ECB/g, 'i');
		str1 = str1.replace(/\u1ECA/g, 'I');
		


		str1 = str1.replace(/\u00F3/g, 'o');
		str1 = str1.replace(/\u00D3/g, 'O');
		str1 = str1.replace(/\u00F2/g, 'o');
		str1 = str1.replace(/\u00D2/g, 'O');
		str1 = str1.replace(/\u1ECF/g, 'o');
		str1 = str1.replace(/\u1ECE/g, 'O');
		str1 = str1.replace(/\u00F5/g, 'o');
		str1 = str1.replace(/\u00D5/g, 'O');
		str1 = str1.replace(/\u1ECD/g, 'o');
		str1 = str1.replace(/\u1ECC/g, 'O');
		


		str1 = str1.replace(/\u01A1/g, 'o');
		str1 = str1.replace(/\u01A0/g, 'O');
		str1 = str1.replace(/\u1EDB/g, 'o');
		str1 = str1.replace(/\u1EDA/g, 'O');
		str1 = str1.replace(/\u1EDD/g, 'o');
		str1 = str1.replace(/\u1EDC/g, 'O');
		str1 = str1.replace(/\u1EDF/g, 'o');
		str1 = str1.replace(/\u1EDE/g, 'O');
		str1 = str1.replace(/\u1EE1/g, 'o');
		str1 = str1.replace(/\u1EE0/g, 'O');
		str1 = str1.replace(/\u1EE3/g, 'o');
		str1 = str1.replace(/\u1EE2/g, 'O');
		



		str1 = str1.replace(/\u00F4/g, 'o');
		str1 = str1.replace(/\u00D4/g, 'O');
		str1 = str1.replace(/\u1ED1/g, 'o');
		str1 = str1.replace(/\u1ED0/g, 'O');
		str1 = str1.replace(/\u1ED3/g, 'o');
		str1 = str1.replace(/\u1ED2/g, 'O');
		str1 = str1.replace(/\u1ED5/g, 'o');
		str1 = str1.replace(/\u1ED4/g, 'O');
		str1 = str1.replace(/\u1ED7/g, 'o');
		str1 = str1.replace(/\u1ED6/g, 'O');
		str1 = str1.replace(/\u1ED9/g, 'o');
		str1 = str1.replace(/\u1ED8/g, 'O');
		


		str1 = str1.replace(/\u00FA/g, 'u');
		str1 = str1.replace(/\u00DA/g, 'U');
		str1 = str1.replace(/\u00F9/g, 'u');
		str1 = str1.replace(/\u00D9/g, 'U');
		str1 = str1.replace(/\u1EE7/g, 'u');
		str1 = str1.replace(/\u1EE6/g, 'U');
		str1 = str1.replace(/\u0169/g, 'u');
		str1 = str1.replace(/\u0168/g, 'U');
		str1 = str1.replace(/\u1EE5/g, 'u');
		str1 = str1.replace(/\u1EE4/g, 'U');
		




		str1 = str1.replace(/\u01B0/g, 'u');
		str1 = str1.replace(/\u01AF/g, 'U');
		str1 = str1.replace(/\u1EE9/g, 'u');
		str1 = str1.replace(/\u1EE8/g, 'U');
		str1 = str1.replace(/\u1EEB/g, 'u');
		str1 = str1.replace(/\u1EEA/g, 'U');
		str1 = str1.replace(/\u1EED/g, 'u');
		str1 = str1.replace(/\u1EEC/g, 'U');
		str1 = str1.replace(/\u1EEF/g, 'u');
		str1 = str1.replace(/\u1EEE/g, 'U');
		str1 = str1.replace(/\u1EF1/g, 'u');
		str1 = str1.replace(/\u1EF0/g, 'U');
		


		str1 = str1.replace(/\u00FD/g, 'y');
		str1 = str1.replace(/\u00DD/g, 'Y');
		str1 = str1.replace(/\u1EF3/g, 'y');
		str1 = str1.replace(/\u1EF2/g, 'Y');
		str1 = str1.replace(/\u1EF7/g, 'y');
		str1 = str1.replace(/\u1EF6/g, 'Y');
		str1 = str1.replace(/\u1EF9/g, 'y');
		str1 = str1.replace(/\u1EF8/g, 'Y');
		str1 = str1.replace(/\u1EF5/g, 'y');
		str1 = str1.replace(/\u1EF4/g, 'Y');

		str1 = str1.replace(/\u0110/g, 'D');
		str1 = str1.replace(/\u0111/g, 'd');
		


		return str1;

		}
	  function createFullAddress(){
		  var _houseno = UnicodeToCompound(document.addPoint.houseno.value);
		  var _street = UnicodeToCompound(document.addPoint.street.value);
		  var _ward = UnicodeToCompound(document.addPoint.ward.value);
		  var _district = UnicodeToCompound(document.addPoint.district.value);
		  var _provincesorcity = UnicodeToCompound(document.addPoint.provincesorcity.value);
		  var _country = UnicodeToCompound(document.addPoint.country.value);
		  var _fulladdress = ""+_houseno+" "+_street+" "+_ward+" "+_district+" "+_provincesorcity+" "+_country;
		  document.addPoint.fulladdress.value =_fulladdress; 		  
		  return true;
	  } 
</script>
<form action="addPointAction.php" method="post" name="addPoint" onsubmit="createFullAddress()">
So nha:<br />
<input name="houseno" type="text"><br />
Duong:<br />
<input name="street" type="text"><br />
Phuong:<br />
<input name="ward" type="text"><br />
Quan/Huyen:<br />
<input name="district" type="text"><br />
Tinh/Thanh Pho: <select name="provincesorcity">
	<option value="Ho Chi Minh"
		selected="selected">Ho Chi Minh</option>
</select><br />
Quoc Gia:<br />
<select name="country">
	<option value="Viet Nam" selected="selected">Viet
	Nam</option>
</select><br />
<input type="button" onclick="codeAddress()" name="submit" value="Tim Thu" /><br />
Ten:<br />
<input name="name" type="text"><br />
Chuyen muc:<br />
<select name="categoryid">
<?php foreach ($list_catogiry as $c){ ?>
	<option value="<?php echo $c->id ?>"
	<?php if($c->id == $default_category_id) echo 'selected="selected"' ?>><?php echo Utility::htmlspecialchars_decode($c->CategoryName) ?></option>
	<?php } ?>
</select><br />
X:<br />
<input name="x" type="text"><br />
Y:<br />
<input name="y" type="text"><br />
<input type="submit" name="submit" value="Them diem">
<input type="hidden" name="fulladdress" >
</form>


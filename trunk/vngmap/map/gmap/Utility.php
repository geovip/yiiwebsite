<?php
class Utility{
	public static function htmlspecialchars_decode($str){
		return htmlspecialchars_decode($str);
	}
	public static function VNDecode_UFT8($str1){
		$str1 = str_replace("\u00E1", 'a',$str1);
		$str1 = str_replace("\u00C1", 'A',$str1);
		$str1 = str_replace("\u00E0", 'a',$str1);
		$str1 = str_replace("\u00C0", 'A',$str1);
		$str1 = str_replace("\u1EA3", 'a',$str1);
		$str1 = str_replace("\u1EA2", 'A',$str1);
		$str1 = str_replace("\u00E3", 'a',$str1);
		$str1 = str_replace("\u00C3", 'A',$str1);
		$str1 = str_replace("\u1EA1", 'a',$str1);
		$str1 = str_replace("\u1EA0", 'A',$str1);


		$str1 = str_replace("\u0103", 'a',$str1);
		$str1 = str_replace("\u0102", 'A',$str1);
		$str1 = str_replace("\u1EAF", 'a',$str1);
		$str1 = str_replace("\u1EAE", 'A',$str1);
		$str1 = str_replace("\u1EB1", 'a',$str1);
		$str1 = str_replace("\u1EB0", 'A',$str1);
		$str1 = str_replace("\u1EB3", 'a',$str1);
		$str1 = str_replace("\u1EB2", 'A',$str1);
		$str1 = str_replace("\u1EB5", 'a',$str1);
		$str1 = str_replace("\u1EB4", 'A',$str1);
		$str1 = str_replace("\u1EB7", 'a',$str1);
		$str1 = str_replace("\u1EB6", 'A',$str1);




		$str1 = str_replace("\u00E2", 'a',$str1);
		$str1 = str_replace("\u00C2", 'A',$str1);
		$str1 = str_replace("\u1EA5", 'a',$str1);
		$str1 = str_replace("\u1EA4", 'A',$str1);
		$str1 = str_replace("\u1EA7", 'a',$str1);
		$str1 = str_replace("\u1EA6", 'A',$str1);
		$str1 = str_replace("\u1EA9", 'a',$str1);
		$str1 = str_replace("\u1EA8", 'A',$str1);
		$str1 = str_replace("\u1EAB", 'a',$str1);
		$str1 = str_replace("\u1EAA", 'A',$str1);
		$str1 = str_replace("\u1EAD", 'a',$str1);
		$str1 = str_replace("\u1EAC", 'A',$str1);



		$str1 = str_replace("\u00E9", 'e',$str1);
		$str1 = str_replace("\u00C9", 'E',$str1);
		$str1 = str_replace("\u00E8", 'e',$str1);
		$str1 = str_replace("\u00C8", 'E',$str1);
		$str1 = str_replace("\u1EBB", 'e',$str1);
		$str1 = str_replace("\u1EBA", 'E',$str1);
		$str1 = str_replace("\u1EBD", 'e',$str1);
		$str1 = str_replace("\u1EBC", 'E',$str1);
		$str1 = str_replace("\u1EB9", 'e',$str1);
		$str1 = str_replace("\u1EB8", 'E',$str1);



		$str1 = str_replace("\u00EA", 'e',$str1);
		$str1 = str_replace("\u00CA", 'E',$str1);
		$str1 = str_replace("\u1EBF", 'e',$str1);
		$str1 = str_replace("\u1EBE", 'E',$str1);
		$str1 = str_replace("\u1EC1", 'e',$str1);
		$str1 = str_replace("\u1EC0", 'E',$str1);
		$str1 = str_replace("\u1EC3", 'e',$str1);
		$str1 = str_replace("\u1EC2", 'E',$str1);
		$str1 = str_replace("\u1EC5", 'e',$str1);
		$str1 = str_replace("\u1EC4", 'E',$str1);
		$str1 = str_replace("\u1EC7", 'e',$str1);
		$str1 = str_replace("\u1EC6", 'E',$str1);




		$str1 = str_replace("\u00ED", 'i',$str1);
		$str1 = str_replace("\u00CD", 'I',$str1);
		$str1 = str_replace("\u00EC", 'i',$str1);
		$str1 = str_replace("\u00CC", 'I',$str1);
		$str1 = str_replace("\u1EC9", 'i',$str1);
		$str1 = str_replace("\u1EC8", 'I',$str1);
		$str1 = str_replace("\u0129", 'i',$str1);
		$str1 = str_replace("\u0128", 'I',$str1);
		$str1 = str_replace("\u1ECB", 'i',$str1);
		$str1 = str_replace("\u1ECA", 'I',$str1);



		$str1 = str_replace("\u00F3", 'o',$str1);
		$str1 = str_replace("\u00D3", 'O',$str1);
		$str1 = str_replace("\u00F2", 'o',$str1);
		$str1 = str_replace("\u00D2", 'O',$str1);
		$str1 = str_replace("\u1ECF", 'o',$str1);
		$str1 = str_replace("\u1ECE", 'O',$str1);
		$str1 = str_replace("\u00F5", 'o',$str1);
		$str1 = str_replace("\u00D5", 'O',$str1);
		$str1 = str_replace("\u1ECD", 'o',$str1);
		$str1 = str_replace("\u1ECC", 'O',$str1);



		$str1 = str_replace("\u01A1", 'o',$str1);
		$str1 = str_replace("\u01A0", 'O',$str1);
		$str1 = str_replace("\u1EDB", 'o',$str1);
		$str1 = str_replace("\u1EDA", 'O',$str1);
		$str1 = str_replace("\u1EDD", 'o',$str1);
		$str1 = str_replace("\u1EDC", 'O',$str1);
		$str1 = str_replace("\u1EDF", 'o',$str1);
		$str1 = str_replace("\u1EDE", 'O',$str1);
		$str1 = str_replace("\u1EE1", 'o',$str1);
		$str1 = str_replace("\u1EE0", 'O',$str1);
		$str1 = str_replace("\u1EE3", 'o',$str1);
		$str1 = str_replace("\u1EE2", 'O',$str1);




		$str1 = str_replace("\u00F4", 'o',$str1);
		$str1 = str_replace("\u00D4", 'O',$str1);
		$str1 = str_replace("\u1ED1", 'o',$str1);
		$str1 = str_replace("\u1ED0", 'O',$str1);
		$str1 = str_replace("\u1ED3", 'o',$str1);
		$str1 = str_replace("\u1ED2", 'O',$str1);
		$str1 = str_replace("\u1ED5", 'o',$str1);
		$str1 = str_replace("\u1ED4", 'O',$str1);
		$str1 = str_replace("\u1ED7", 'o',$str1);
		$str1 = str_replace("\u1ED6", 'O',$str1);
		$str1 = str_replace("\u1ED9", 'o',$str1);
		$str1 = str_replace("\u1ED8", 'O',$str1);



		$str1 = str_replace("\u00FA", 'u',$str1);
		$str1 = str_replace("\u00DA", 'U',$str1);
		$str1 = str_replace("\u00F9", 'u',$str1);
		$str1 = str_replace("\u00D9", 'U',$str1);
		$str1 = str_replace("\u1EE7", 'u',$str1);
		$str1 = str_replace("\u1EE6", 'U',$str1);
		$str1 = str_replace("\u0169", 'u',$str1);
		$str1 = str_replace("\u0168", 'U',$str1);
		$str1 = str_replace("\u1EE5", 'u',$str1);
		$str1 = str_replace("\u1EE4", 'U',$str1);





		$str1 = str_replace("\u01B0", 'u',$str1);
		$str1 = str_replace("\u01AF", 'U',$str1);
		$str1 = str_replace("\u1EE9", 'u',$str1);
		$str1 = str_replace("\u1EE8", 'U',$str1);
		$str1 = str_replace("\u1EEB", 'u',$str1);
		$str1 = str_replace("\u1EEA", 'U',$str1);
		$str1 = str_replace("\u1EED", 'u',$str1);
		$str1 = str_replace("\u1EEC", 'U',$str1);
		$str1 = str_replace("\u1EEF", 'u',$str1);
		$str1 = str_replace("\u1EEE", 'U',$str1);
		$str1 = str_replace("\u1EF1", 'u',$str1);
		$str1 = str_replace("\u1EF0", 'U',$str1);



		$str1 = str_replace("\u00FD", 'y',$str1);
		$str1 = str_replace("\u00DD", 'Y',$str1);
		$str1 = str_replace("\u1EF3", 'y',$str1);
		$str1 = str_replace("\u1EF2", 'Y',$str1);
		$str1 = str_replace("\u1EF7", 'y',$str1);
		$str1 = str_replace("\u1EF6", 'Y',$str1);
		$str1 = str_replace("\u1EF9", 'y',$str1);
		$str1 = str_replace("\u1EF8", 'Y',$str1);
		$str1 = str_replace("\u1EF5", 'y',$str1);
		$str1 = str_replace("\u1EF4", 'Y',$str1);


		$str1 = str_replace("\u0110", 'Y',$str1);
		$str1 = str_replace("\u0111", 'Y',$str1);

		
		
		echo $str2;
		return $str1;

	}
	public static function VNDecode_ISO_8859_1($str1){
		//a á à &#7843; ã &#7841; â &#259; &#7845; &#7847; &#7849; &#7851; &#7853; &#7855; &#7857; &#7859; &#7861; &#7863;
		//A Á À &#7842; Ã &#7840; Â &#258; &#7844; &#7846; &#7848; &#7850; &#7852; &#7854; &#7856; &#7858; &#7860; &#7862;
		//d &#273;
		//D &#272;
		//e é è &#7867; &#7869; &#7865; ê &#7871; &#7873; &#7875; &#7877; &#7879;
		//E É È &#7866; &#7868; &#7864; Ê &#7870; &#7872; &#7874; &#7876; &#7878;
		//i í ì &#7881; &#297; &#7883;
		//I Í Ì &#7880; &#296; &#7882;
		//o ó ò &#7887; õ &#7885; ô &#417; &#7889; &#7891; &#7893; &#7895; &#7897; &#7899; &#7901; &#7903; &#7905; &#7907;
		//O Ó Ò &#7886; Õ &#7884; Ô &#416; &#7888; &#7890; &#7892; &#7894; &#7896; &#7898; &#7900; &#7902; &#7904; &#7906;
		//u ú ù &#7911; &#361; &#7909; &#432; &#7913; &#7915; &#7917; &#7919; &#7921;
		//U Ú Ù &#7910; &#360; &#7908; &#431; &#7912; &#7914; &#7916; &#7918; &#7920;
		//y ý &#7923; &#7927; &#7929; &#7925;
		//Y Ý &#7922; &#7926; &#7928; &#7924;


		$str2=htmlspecialchars($str1,ENT_COMPAT,"ISO-8859-1");
		echo $str2;
		//a
		$str2= str_replace("á","a",$str2);
		$str2= str_replace("à","a",$str2);
		$str2= str_replace("&amp;#7843;","a",$str2);
		$str2= str_replace("ã","a",$str2);
		$str2= str_replace("&amp;#7841;","a",$str2);
		$str2= str_replace("â","a",$str2);
		$str2= str_replace("&amp;#259;","a",$str2);
		$str2= str_replace("&amp;#7845;","a",$str2);
		$str2= str_replace("&amp;#7847;","a",$str2);
		$str2= str_replace("&amp;#7849;","a",$str2);
		$str2= str_replace("&amp;#7851;","a",$str2);
		$str2= str_replace("&amp;#7853;","a",$str2);
		$str2= str_replace("&amp;#7855;","a",$str2);
		$str2= str_replace("&amp;#7857;","a",$str2);
		$str2= str_replace("&amp;#7859;","a",$str2);
		$str2= str_replace("&amp;#7861;","a",$str2);
		$str2= str_replace("&amp;#7863;","a",$str2);

		//A
		$str2= str_replace("Á","A",$str2);
		$str2= str_replace("À","A",$str2);
		$str2= str_replace("&amp;#7842;","A",$str2);
		$str2= str_replace("Ã","A",$str2);
		$str2= str_replace("&amp;#7840;","A",$str2);
		$str2= str_replace("Â","A",$str2);
		$str2= str_replace("&amp;#258;","A",$str2);
		$str2= str_replace("&amp;#7844;","A",$str2);
		$str2= str_replace("&amp;#7846;","A",$str2);
		$str2= str_replace("&amp;#7848;","A",$str2);
		$str2= str_replace("&amp;#7850;","A",$str2);
		$str2= str_replace("&amp;#7852;","A",$str2);
		$str2= str_replace("&amp;#7854;","A",$str2);
		$str2= str_replace("&amp;#7856;","A",$str2);
		$str2= str_replace("&amp;#7858;","A",$str2);
		$str2= str_replace("&amp;#7860;","A",$str2);
		$str2= str_replace("&amp;#7862;","A",$str2);

		//d &amp;#273;
		$str2= str_replace("&amp;#273;","d",$str2);

		//D &amp;#272;
		$str2= str_replace("&amp;#272;","D",$str2);

		//e
		$str2= str_replace("é","e",$str2);
		$str2= str_replace("è","e",$str2);
		$str2= str_replace("&amp;#7867;","e",$str2);
		$str2= str_replace("&amp;#7869;","e",$str2);
		$str2= str_replace("&amp;#7865;","e",$str2);
		$str2= str_replace("ê","e",$str2);
		$str2= str_replace("&amp;#7871;","e",$str2);
		$str2= str_replace("&amp;#7873;","e",$str2);
		$str2= str_replace("&amp;#7875;","e",$str2);
		$str2= str_replace("&amp;#7877;","e",$str2);
		$str2= str_replace("&amp;#7879;","e",$str2);

		//E
		$str2= str_replace("É","E",$str2);
		$str2= str_replace("È","E",$str2);
		$str2= str_replace("&amp;#7866;","E",$str2);
		$str2= str_replace("&amp;#7868;","E",$str2);
		$str2= str_replace("&amp;#7864;","E",$str2);
		$str2= str_replace("Ê","E",$str2);
		$str2= str_replace("&amp;#7870;","E",$str2);
		$str2= str_replace("&amp;#7872;","E",$str2);
		$str2= str_replace("&amp;#7874;","E",$str2);
		$str2= str_replace("&amp;#7876;","E",$str2);
		$str2= str_replace("&amp;#7878;","E",$str2);

		//i
		$str2= str_replace("í","i",$str2);
		$str2= str_replace("ì","i",$str2);
		$str2= str_replace("&amp;#7881;","i",$str2);
		$str2= str_replace("&amp;#297;","i",$str2);
		$str2= str_replace("&amp;#7883;","i",$str2);

		//I
		$str2= str_replace("Í","I",$str2);
		$str2= str_replace("Ì","I",$str2);
		$str2= str_replace("&amp;#7880;","I",$str2);
		$str2= str_replace("&amp;#296;","I",$str2);
		$str2= str_replace("&amp;#7882;","I",$str2);

		//o
		$str2= str_replace("ó","o",$str2);
		$str2= str_replace("ò","o",$str2);
		$str2= str_replace("&amp;#7887;","o",$str2);
		$str2= str_replace("õ","o",$str2);
		$str2= str_replace("&amp;#7885;","o",$str2);
		$str2= str_replace("ô","o",$str2);
		$str2= str_replace("&amp;#417;","o",$str2);
		$str2= str_replace("&amp;#7889;","o",$str2);
		$str2= str_replace("&amp;#7891;","o",$str2);
		$str2= str_replace("&amp;#7893;","o",$str2);
		$str2= str_replace("&amp;#7895;","o",$str2);
		$str2= str_replace("&amp;#7897;","o",$str2);
		$str2= str_replace("&amp;#7899;","o",$str2);
		$str2= str_replace("&amp;#7901;","o",$str2);
		$str2= str_replace("&amp;#7903;","o",$str2);
		$str2= str_replace("&amp;#7905;","o",$str2);
		$str2= str_replace("&amp;#7907;","o",$str2);

		//O
		$str2= str_replace("Ó","O",$str2);
		$str2= str_replace("Ò","O",$str2);
		$str2= str_replace("&amp;#7886;","O",$str2);
		$str2= str_replace("Õ","O",$str2);
		$str2= str_replace("&amp;#7884;","O",$str2);
		$str2= str_replace("Ô","O",$str2);
		$str2= str_replace("&amp;#416;","O",$str2);
		$str2= str_replace("&amp;#7888;","O",$str2);
		$str2= str_replace("&amp;#7890;","O",$str2);
		$str2= str_replace("&amp;#7892;","O",$str2);
		$str2= str_replace("&amp;#7894;","O",$str2);
		$str2= str_replace("&amp;#7896;","O",$str2);
		$str2= str_replace("&amp;#7898;","O",$str2);
		$str2= str_replace("&amp;#7900;","O",$str2);
		$str2= str_replace("&amp;#7902;","O",$str2);
		$str2= str_replace("&amp;#7904;","O",$str2);
		$str2= str_replace("&amp;#7906;","O",$str2);

		//u
		$str2= str_replace("ú","u",$str2);
		$str2= str_replace("ù","u",$str2);
		$str2= str_replace("&amp;#7911;","u",$str2);
		$str2= str_replace("&amp;#361;","u",$str2);
		$str2= str_replace("&amp;#7909;","u",$str2);
		$str2= str_replace("&amp;#432;","u",$str2);
		$str2= str_replace("&amp;#7913;","u",$str2);
		$str2= str_replace("&amp;#7915;","u",$str2);
		$str2= str_replace("&amp;#7917;","u",$str2);
		$str2= str_replace("&amp;#7919;","u",$str2);
		$str2= str_replace("&amp;#7921;","u",$str2);

		//U
		$str2= str_replace("Ú","U",$str2);
		$str2= str_replace("Ù","U",$str2);
		$str2= str_replace("&amp;#7910;","U",$str2);
		$str2= str_replace("&amp;#360;","U",$str2);
		$str2= str_replace("&amp;#7908;","U",$str2);
		$str2= str_replace("&amp;#431;","U",$str2);
		$str2= str_replace("&amp;#7912;","U",$str2);
		$str2= str_replace("&amp;#7914;","U",$str2);
		$str2= str_replace("&amp;#7916;","U",$str2);
		$str2= str_replace("&amp;#7918;","U",$str2);
		$str2= str_replace("&amp;#7920;","U",$str2);

		//y
		$str2= str_replace("ý","y",$str2);
		$str2= str_replace("&amp;#7923;","y",$str2);
		$str2= str_replace("&amp;#7927;","y",$str2);
		$str2= str_replace("&amp;#7929;","y",$str2);
		$str2= str_replace("&amp;#7925;","y",$str2);

		//Y
		$str2= str_replace("Ý","Y",$str2);
		$str2= str_replace("&amp;#7922;","Y",$str2);
		$str2= str_replace("&amp;#7926;","Y",$str2);
		$str2= str_replace("&amp;#7928;","Y",$str2);
		$str2= str_replace("&amp;#7924;","Y",$str2);
		
		echo $str2;
		return $str2;
	}
}
?>
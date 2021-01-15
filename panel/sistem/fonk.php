<?php 
include "db.php";

$ayarsor=$db->prepare("SELECT * from ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$width=$ayarcek['thumb_width'];
$height=$ayarcek['thumb_height'];
$uwidth=$ayarcek['urun_width'];
$uheight=$ayarcek['urun_height'];
$swidth=$ayarcek['slider_width'];
$sheight=$ayarcek['slider_height'];

$resimopt=$ayarcek['resim_opt'];
$resim_kalite=$ayarcek['resim_kalite'];
$resim_oran=$ayarcek['resim_oran'];


function seo($text) {
	$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','?','*',')','(','%','$','&','=');
	$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '', '', '', '', '', '', '', '', '', '');
	$text = strtolower(str_replace($find, $replace, $text));
	$text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
	$text = trim(preg_replace('/\s+/', ' ', $text));
	$text = str_replace(' ', '-', $text);

	return $text;
}


// resim kullanılan formlar için
function upload(){include "upload.php"; }


function imageupload($resim,$konum){
	$image = new Verot\Upload\Upload($resim);
	$image->allowed = array ('image/*');
	$image->image_convert = 'jpg';
	if ($GLOBALS['resimopt']==1) {
		$image->jpeg_quality = $GLOBALS['resim_kalite'];
	}
	$image->file_new_name_body = trname($image->file_src_name_body);
	$image->Process($konum);

	// thumbnail -->
	return $imgyol=$image->file_dst_name;
} 
function pngupload($resim,$konum){
	$image = new Verot\Upload\Upload($resim);
	$image->allowed = array ('image/*');
	if ($GLOBALS['resimopt']==1) {
		$image->jpeg_quality = $GLOBALS['resim_kalite'];
	}
	$image->file_new_name_body = trname($image->file_src_name_body);
	$image->Process($konum);

	// thumbnail -->
	return $imgyol=$image->file_dst_name;
} 

function thumbnailupload($resim,$konum,$width,$height) {
	$image = new Verot\Upload\Upload($resim);
	$image->image_convert = 'jpg';
	$image->image_resize = true; 
	if ($GLOBALS['resim_oran']==1) {$image->image_ratio_no_zoom_in  = true; }
	$image->image_x = $GLOBALS['width']; //resim yeni boyutu
	$image->image_y = $GLOBALS['height']; //resim yeni boyutu
	$image->allowed = array ( 'image/*' );
	if ($GLOBALS['resimopt']==1) {$image->jpeg_quality = $GLOBALS['resim_kalite']; }
	$image->file_new_name_body = trname($image->file_src_name_body);
	$image->file_name_body_pre = 'm_'; // yeni resmin ismine ön ek
	$image->Process($konum);
}


function urunupload($resim,$konum) {
	$image = new Verot\Upload\Upload($resim);
	$image->image_convert = 'jpg';
	$image->image_resize = true; 
	if ($GLOBALS['resim_oran']==1) {$image->image_ratio_no_zoom_in  = true; }
	$image->image_x = $GLOBALS['uwidth']; //resim yeni boyutu
	$image->image_y = $GLOBALS['uheight']; //resim yeni boyutu
	$image->allowed = array ( 'image/*' );
	if ($GLOBALS['resimopt']==1) {$image->jpeg_quality = $GLOBALS['resim_kalite']; }
	$image->file_new_name_body = trname($image->file_src_name_body);
	$image->file_name_body_pre = 'm_'; // yeni resmin ismine ön ek
	$image->Process($konum);
}


function sliderthumb($resim,$konum) {
	$image = new Verot\Upload\Upload($resim);
	$image->image_convert = 'jpg';
	$image->image_resize = true; 
 
	$image->image_x = $GLOBALS['swidth']; //resim yeni boyutu
	$image->image_y = $GLOBALS['sheight']; //resim yeni boyutu
	$image->allowed = array ( 'image/*' );
	if ($GLOBALS['resimopt']==1) {$image->jpeg_quality = $GLOBALS['resim_kalite']; }
	$image->file_new_name_body = trname($image->file_src_name_body);
	$image->file_name_body_pre = 'm_'; // yeni resmin ismine ön ek
	$image->Process($konum);
}



// Resim İsimleri için
function trname($str, $options = array())
{
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => true
	);
	$options = array_merge($defaults, $options);
	$char_map = array(
         // Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
		'ß' => 'ss',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
		'ÿ' => 'y',
         // Latin symbols
		'©' => '(c)',
         // Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
         // Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
         // Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
         // Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
         // Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
		'Ž' => 'Z',
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z',
         // Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
		'Ż' => 'Z',
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
         // Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	$str = trim($str, $options['delimiter']);
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


function istatistik(){
	include "db.php";

	$bugun=date("d"); // bugünün tarihi 
 	$ay=date("m"); // bu ay
 	$yil=date("Y"); // bu yıl 
 	$onlineSuresi=time()-2*60*60; // iki dakika aktif olmazsa onlineden düşecek
 	$ip=$_SERVER['REMOTE_ADDR']; // ziyaretçinin ip si 
 	$bugunGiris=$db->query("SELECT * FROM hit WHERE ip='$ip' AND gun='$bugun'")->rowCount(); // bugün o ip ile girilmişmi 
 	if($bugunGiris!=0){ // yani bugün girilmişse
 		$al=$db->query("SELECT * FROM `hit` WHERE  `ip`='".$ip."' AND `gun`='".$bugun."'")->fetch();
 	$guncelle=$db->query("UPDATE `hit` SET `sayac`='".($al['sayac']+1)."' WHERE id='".$al['id']."'"); // çoğulu 1 artırdık 

 }else{$db->query("INSERT INTO `hit` SET `gun`='$bugun', `ay`='$ay', `yil`='$yil', simdi='".time()."', sayac='1',ip='$ip'"); }
}


function hitcek() {
	 // Veri tabanı bağlantımızı yaptık
	include "db.php";

 	$bugun=date("d"); // bugünün tarihi 
 	$ay=date("m"); // bu ay
 	$yil=date("Y"); // bu yıl 
 	$onlineSuresi=time()-2*60*60; // iki dakika aktif olmazsa onlineden düşecek
 	$ip=$_SERVER['REMOTE_ADDR']; // ziyaretçinin ip si 
 	
	$online=$db->query("SELECT * FROM hit WHERE simdi>='$onlineSuresi'")->rowCount(); // onlnie kişilerimiz
	// çoğul hitler 
	$bugunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$bugun_cogul=$bugunx['SUM(sayac)']; // bugün çoğul
	$dunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$dun_cogul=$dunx['SUM(sayac)']; // dün Çoğul 
	$ayx=$db->query("SELECT SUM(sayac) FROM hit WHERE ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$buay_cogul=$ayx['SUM(sayac)']; // bu ay çoğul
	$toplamx=$db->query("SELECT SUM(sayac) FROM hit ORDER BY id desc")->fetch();
	$toplam_cogul=$toplamx['SUM(sayac)']; // toplam çoğulumuz
	// tekil hitler 
	$bugun_tekil=$db->query("SELECT * FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil'")->rowCount(); // bugün tekil
	$dun_tekil=$db->query("SELECT * FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
	$buay_tekil=$db->query("SELECT * FROM hit WHERE  ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
	$toplam_tekil=$db->query("SELECT * FROM hit")->rowCount(); // dün tekil
	//echo"<div class='sayac'> <p>Online: $online </p> <p>Bugün Tekil: $bugun_tekil</p> <p>Bugün Çoğul: $bugun_cogul</p> <p>Dün Tekil: $dun_tekil</p> <p>Dün Çoğul: $dun_cogul</p> <p>Buay Tekil: $buay_tekil</p> <p>Buay Çoğul: $buay_cogul</p> <p>Toplam Tekil: $toplam_tekil</p> <p>Toplam Çoğul: $toplam_cogul</p> </div>";
	$GLOBALS['online'] = $online;
	$GLOBALS['bugun_tekil'] = $bugun_tekil;
	$GLOBALS['bugun_cogul'] = $bugun_cogul;
	$GLOBALS['dun_tekil'] = $dun_tekil;
	$GLOBALS['dun_cogul'] = $dun_cogul;
	$GLOBALS['buay_tekil'] = $buay_tekil;
	$GLOBALS['buay_cogul'] = $buay_cogul;
	$GLOBALS['toplam_tekil'] = $toplam_tekil;
	$GLOBALS['toplam_cogul'] = $toplam_cogul;

} 

function tarih($tarih){
	$t = explode('-', $tarih);
	$yıl = $t[0];
	$ay = $t[1];
	$gun = $t[2];
	$aylar = array(
		"01"=>"Ocak",
		"02"=>"Şubat",
		"03"=>"Mart",
		"04"=>"Nisan",
		"05"=>"Mayıs",
		"06"=>"Haziran",
		"07"=>"Temmuz",
		"08"=>"Ağustos",
		"09"=>"Eylül",
		"10"=>"Ekim",
		"11"=>"Kasım",
		"12"=>"Aralık");
	$ay = $aylar[$ay];
	return $gun." ".$ay.", ".$yıl;

}
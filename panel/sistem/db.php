<?php 
error_reporting(0);
try {

	$db=new PDO("mysql:host=localhost;dbname=otel;charset=utf8",'root','');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}
date_default_timezone_set('Europe/Istanbul');
 ?>
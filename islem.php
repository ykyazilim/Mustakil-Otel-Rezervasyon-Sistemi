<?php 

include 'panel/sistem/db.php';
include 'panel/sistem/fonk.php';
$json = json_decode(file_get_contents("php://input"));

function tarihen($tarih)
{
	$tarihler = explode('.', $tarih);

	return $tarihler[2].'-'.$tarihler[1].'-'.$tarihler[0];
}




$kaydet=$db->prepare("INSERT INTO rezervasyon SET
	ad=:ad,
	soyad=:soyad,
	cikis_tarih=:cikis_tarihi,
	giris_tarih=:giris_tarihi,
	nott=:nott,
	adres=:adres,
	telefon=:telefon,
	odeme_tur=:tur,
	islem_zaman=:islem_zaman,
	eposta=:eposta
	");
$islem=$kaydet->execute(array(
	'ad' => $json->bilgiler->ad,
	'eposta' => $json->bilgiler->eposta,
	'telefon' => $json->bilgiler->telefon,
	'adres' => $json->bilgiler->adres,
	'nott' => $json->bilgiler->mesaj,
	'tur' => $json->bilgiler->odeme,
	'islem_zaman' => date('Y-m-d H:i:s'),
	'giris_tarihi' => tarihen($json->tarihler[0]->giris_tarihi),
	'cikis_tarihi' => tarihen($json->tarihler[0]->cikis_tarihi),
	'soyad' => $json->bilgiler->soyad
));
if ($islem) {
	$rezid= $db->lastInsertId();

} 


foreach($json->odalar as $oda)
{
	$kaydet=$db->prepare("INSERT INTO rez_oda SET
		oda_id=:oda_id,
		rez_id=:rez_id,
		cocukyas2=:cocukyas2,
		cocukyas1=:cocukyas1,
		cocuk=:cocuk,
		yetiskin=:yetiskin
		");
	$islem=$kaydet->execute(array(
		'oda_id' => $oda->oda_id,
		'yetiskin' => $oda->yetiskin,
		'cocuk' => $oda->cocuk,
		'cocukyas1' => $oda->cocukyas1,
		'cocukyas2' => $oda->cocukyas2,
		'rez_id' => $rezid
	));
	$odalar=$db->prepare("select * from odalar where id={$oda->oda_id} ");
	$odalar->execute();
	$odacek=$odalar->fetch(PDO::FETCH_ASSOC);
	$tutar+=$odacek['oda_fiyat'];
}
$tarih1= new DateTime(tarihen($json->tarihler[0]->giris_tarihi));
$tarih2= new DateTime(tarihen($json->tarihler[0]->cikis_tarihi));
$interval= $tarih1->diff($tarih2);
$sayi = $interval->format('%a');
$tutar *=$sayi;

$kaydet=$db->prepare("UPDATE rezervasyon set   
	tutar=:tutar
	where id=:id");
$islem=$kaydet->execute(array(
	'tutar' => $tutar,
	'id' => $rezid
));

echo '/durum.php?id='.$rezid;


?>
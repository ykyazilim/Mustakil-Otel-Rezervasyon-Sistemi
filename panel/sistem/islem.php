<?php 

include "db.php";
include "fonk.php";
ob_start();

session_start(); 



	if ($_POST['ayarguncelle']) {
		upload();

		if ($_FILES['logofile']['size'] > 0) {
			$ll=$_POST['logoresim'];
			unlink("../../ykimg/$ll");
			$logoimg = pngupload($_FILES['logofile'],'../../ykimg');

		}
		else{
			$logoimg = $_POST['logoresim'];
		}
		if ($_FILES['favfile']['size'] > 0) {
			$ff=$_POST['favresim'];
			unlink("../../ykimg/$ff");
			$favresim = pngupload($_FILES['favfile'],'../../ykimg');

		}
		else{
			$favresim = $_POST['favresim'];
		}
		$kaydet=$db->prepare("UPDATE  ayarlar set   
			domain=:domain,
			site_adi=:site_adi,
			logo=:logo,
			favicon=:favicon,
			keywords=:keywords,
			copright=:copright,
			description=:description ");
		$islem=$kaydet->execute(array(
			'logo' => $logoimg,
			'favicon' => $favresim,
			'domain' => $_POST['domain'],
			'site_adi' => $_POST['site_adi'],
			'keywords' => $_POST['keywords'],
			'description' => $_POST['description'],
			'copright' => $_POST['copright']
		));


		if ($islem) {
			echo "başarılı";
		} else {
			echo "başarısız";
		}
	}

 

	if ($_POST['resimopt']) {
		$kaydet=$db->prepare("UPDATE ayarlar set   
			resim_opt=:resim_opt,
			resim_oran=:resim_oran,
			resim_kalite=:resim_kalite,
			thumb_width=:thumb_width,
			thumb_height=:thumb_height,
			urun_width=:urun_width,
			urun_height=:urun_height,
			slider_width=:slider_width,
			slider_height=:slider_height
			");
		$islem=$kaydet->execute(array(
			'thumb_width' => $_POST['thumb_width'],
			'thumb_height' => $_POST['thumb_height'],
			'urun_width' => $_POST['urun_width'],
			'urun_height' => $_POST['urun_height'],
			'slider_width' => $_POST['slider_width'],
			'slider_height' => $_POST['slider_height'],
			'resim_kalite' => $_POST['resim_kalite'],
			'resim_oran' => $_POST['resim_oran'],
			'resim_opt' => $_POST['resim_opt']
			
		));


		if ($islem) {
			echo "başarılı";
		} else {
			echo "başarısız";
		}
	}





 




	if ($_GET['kullanicisil']=="ok") {

		$sil=$db->prepare("DELETE from kullanicilar where id=:id");

		$kontrol=$sil->execute(array('id' => $_GET['id'] )); 


	}
	if ($_POST['kullanicikaydet']) {

		$kaydet=$db->prepare("INSERT INTO kullanicilar SET 
			k_adi=:k_adi,
			ad=:ad,
			password=:password,
			mail=:mail,
			yetki=:yetki
			");
		$islem=$kaydet->execute(array(
			'k_adi' => $_POST['k_adi'],
			'password' => md5(sha1($_POST['password'])),
			'ad' => $_POST['ad'],
			'mail' => $_POST['mail'],
			'yetki' => $_POST['yetki']
		));


		if ($islem) {
			Header("Location:../kullanici/?durum=ok");
		} else {
			Header("Location:../kullanici/?durum=no");


		}
	}


	if ($_POST['kullaniciduzenle']) {

		$kaydet=$db->prepare("UPDATE  kullanicilar set   
			k_adi=:k_adi,
			ad=:ad,
			mail=:mail,
			yetki=:yetki
			where id=:id");
		$islem=$kaydet->execute(array(
			'k_adi' => $_POST['k_adi'],
			'ad' => $_POST['ad'],
			'mail' => $_POST['mail'],
			'yetki' => $_POST['yetki'],
			'id' => $_POST['id']
		));
		if ($islem) {
			echo "başarılı";
		} else {
			echo "başarısız";
		}
	}

	if ($_POST['adminhesapguncelle']) {


		if ($_POST['password']) {

			$kaydet=$db->prepare("UPDATE  kullanicilar set   
				k_adi=:k_adi,
				ad=:ad,
				password=:password,
				mail=:mail,
				yetki=:yetki
				where id=:id");
			$islem=$kaydet->execute(array(
				'k_adi' => $_POST['k_adi'],
				'password' => md5(sha1($_POST['password'])),
				'ad' => $_POST['ad'],
				'mail' => $_POST['mail'],
				'yetki' => $_POST['yetki'],
				'id' => $_POST['id']
			));
		}
		
		else{
			$kaydet=$db->prepare("UPDATE  kullanicilar set   
				k_adi=:k_adi,
				ad=:ad,
				mail=:mail,
				yetki=:yetki
				where id=:id");
			$islem=$kaydet->execute(array(
				'k_adi' => $_POST['k_adi'],
				'ad' => $_POST['ad'],
				'mail' => $_POST['mail'],
				'yetki' => $_POST['yetki'],
				'id' => $_POST['id']
			));
		}

		if ($islem) {
			echo "başarılı";
		} else {
			echo "başarısız";
		}
	}



 

	if ($_GET['odasil']=="ok") {
		$sil=$db->prepare("DELETE from odalar where id=:id");
		$kontrol=$sil->execute(array('id' => $_GET['id'] )); 

		$id=$_GET['id']; 
		$e=$db->prepare("select * from oda_resimleri where oda_id='$id' ");
		$e->execute();
		while($ecek=$e->fetch(PDO::FETCH_ASSOC)) {
			$imgg=$ecek['resim'];
			unlink("../../ykimg/oda/$img");
		}

		$sil=$db->prepare("DELETE from oda_resimleri where oda_id=:id");
		$kontrol=$sil->execute(array('id' => $_GET['id'] )); 

	}

	if ($_POST['odakaydet']) {

		foreach ($_POST['ozellik'] as $key => $value) {
			if(!$value)continue;
			$ozellik = $ozellik."&&&".$value;
		}

		$kaydet=$db->prepare("INSERT INTO odalar SET 
			oda_adi=:oda_adi,
			oda_fiyat=:oda_fiyat,
			oda_ozellik=:oda_ozellik
			");
		$islem=$kaydet->execute(array(
			'oda_fiyat' => $_POST['oda_fiyat'],
			'oda_adi' => $_POST['oda_adi'],
			'oda_ozellik' => $ozellik

		));


		if ($islem) {
			Header("Location:../odalar/?durum=ok");
		} else {
			Header("Location:../odalar/?durum=no");


		}
	}

	if ($_POST['odaduzenle']) {
		foreach ($_POST['ozellik'] as $key => $value) {
			if(!$value)continue;
			$ozellik = $ozellik."&&&".$value;
		}
		$kaydet=$db->prepare("UPDATE odalar set   
			oda_adi=:oda_adi,
			oda_fiyat=:oda_fiyat,
			oda_ozellik=:oda_ozellik
			where id=:id");
		$islem=$kaydet->execute(array(
			'oda_fiyat' => $_POST['oda_fiyat'],
			'oda_adi' => $_POST['oda_adi'],
			'oda_ozellik' => $ozellik,
			'id' => $_POST['id']
		));

		if ($islem) {
			echo "başarılı";
		} else {
			echo "başarısız";
		}
	}



	if ($_POST['oda-foto-ekle']) {
		if (!empty($_FILES) ) {
			upload();
			$imgyol = imageupload($_FILES['file'],'../../ykimg/oda');
			$kaydet=$db->prepare("INSERT INTO oda_resimleri SET 
				resim=:resim,
				oda_id=:oda_id
				");
			$islem=$kaydet->execute(array(
				'resim' => $imgyol,
				'oda_id' => $_POST['oda_id']
			));
 

		}
	}




	if(isset($_POST['odagalerisil'])) {
		$checklist = $_POST['galerisec'];
		foreach($checklist as $list) {
			$parca=explode('*',$list);
			$sil=$db->prepare("DELETE from oda_resimleri where id=:id"); 
			$kontrol=$sil->execute(array(
				'id' => $parca[0] 
			));
			$img=$parca[1];
			unlink("../../ykimg/oda/$img"); 
		}
		if ($kontrol) {
			Header("Location:../odalar?durum=ok");
		} else {
			Header("Location:../odalar?durum=no");
		}
	}
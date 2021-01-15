<?php 
$aciklama = $ayarcek['description'];
$etiket = $ayarcek['keywords'];
$baslik = $ayarcek['site_adi'];
$_GET['sayfa']? $sayfaa= "Sayfa ".$_GET['sayfa']:$sayfaa="";
if ($ssayfa == "blog") {
	$baslik= "Blog ".$sayfaa.$baslik;
}
else if ($ssayfa == "blog-detay") {
	$iceriksor=$db->prepare("SELECT * from blog where id=:id");
	$iceriksor->execute(array(
		'id' => $_GET['id'] ));
	$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);
	$title=$icerikcek['blog_ad'];
	$baslik=$icerikcek['blog_ad']." | ".$baslik;
	$aciklama = $icerikcek['description'];
	$etiket = $icerikcek['keywords'];
}
else if ($ssayfa == "galeri") {
	$id=$_GET['id'];
	$foto=$db->prepare("select * from foto_kat where id='$id' order by id DESC ");
	$foto->execute();
	$fotocekk=$foto->fetch(PDO::FETCH_ASSOC);
	$title = $fotocekk['ad'];
	$baslik=$fotocekk['ad']." ".$sayfaa." | ".$baslik; 
}
else if ($ssayfa == "hakkimizda") {
	$iceriksor=$db->prepare("SELECT * from hakkimizda");
	$iceriksor->execute();
	$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);
	$title=$icerikcek['baslik'];  
	$baslik=$icerikcek['baslik']." | ".$baslik; 
}
else if ($ssayfa == "sayfa-detay") {
	
	$sayfasor=$db->prepare("SELECT * from sayfalar where id=:id");
	$sayfasor->execute(array('id' => $_GET['id'] ));
	$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);
	$title=$sayfacek['sayfa_ad'];
	$baslik=$sayfacek['sayfa_ad']." | ".$baslik; 
	$aciklama = $sayfacek['description'];
	$etiket = $sayfacek['keywords'];
}
else if ($ssayfa == "urun-detay") {
	
	$urunsor=$db->prepare("SELECT u.id,u.urun_ad,u.resim,u.detay,u.keywords,u.description,u.fiyat,u.efiyat,u.kategori,u.anasayfa,k.ad,k.ust_kat from urunler u inner join kategori k on k.id=u.kategori where u.id=:id");
	$urunsor->execute(array('id' => $_GET['id'] ));
	$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
	$title=$uruncek['urun_ad'];
	$baslik=$uruncek['urun_ad']." | ".$baslik; 
	$aciklama = $uruncek['description'];
	$etiket = $uruncek['keywords'];

}
else if ($ssayfa == "foto-galeri") {
	$baslik= "Fotoğraf Galerisi | ".$baslik;
}
else if ($ssayfa == "iletisim") {
	$baslik= "İletişim | ".$baslik; 
}
else if ($ssayfa == "urunler") {
	$title="Ürünler";
	$baslik= "Ürünler | ".$baslik; 
	if ($_GET['id']) {
    $sayfasor=$db->prepare("SELECT * from kategori where id=:id");
    $sayfasor->execute(array('id' => $_GET['id'] ));
    $katcek=$sayfasor->fetch(PDO::FETCH_ASSOC);
    $title = $katcek['ad']." | ". $title;
    $baslik= $katcek['ad']." Ürünler | ".$ayarcek['site_adi']; 
}
	
}
else if ($ssayfa == "video-galeri") {
	$baslik= "Video Galeri | ".$baslik; 
}

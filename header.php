<?php 
include 'panel/sistem/db.php';
include 'panel/sistem/fonk.php';
include 'panel/sistem/info.php';
$ayarsor=$db->prepare("select * from ayarlar where id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);  
$link = $_SERVER['HTTPS']?"https://":"http://"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $baslik; ?></title>
	<meta name="description" content="<?= $aciklama; ?>">
	<meta name="keywords" content="<?= $etiket; ?>">
	<link rel="canonical" href="<?= $link.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
	<meta property="og:locale" content="tr_TR">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?= $baslik; ?>">
	<meta property="og:description" content="<?= $aciklama; ?>">
	<meta property="og:image" content="<?= $image; ?>">
	<meta property="og:url" content="<?= $link.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
	<meta property="og:site_name" content="<?= $ayarcek['site_adi']; ?>">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet">
	<style>
		.header_top{
			background:white;
		}
		.header_top:after{
			display:table;
			content:'';
			clear:both
		}
		.header_top .header_left span, .header_top .header_left span a{
			font-synthesis: 'Roboto'
			font-size:15px;
			color:black;
			margin-right:15px;
			line-height:36px;
			text-decoration: none;
			font-weight: 100
		}
		.header_top .header_left span i{
			font-size:14px;
			margin-right:5px;
			color: red
		}

		li.nav-item {
			padding: 20px
		}
		li.nav-item a:hover {
			color: red!important

		}
		li.nav-item.active a{
			color: red!important
		}
		.hero{
			background: url(images/hero.jpg);
			width: 100%;
			height: 500px;
			background-repeat: no-repeat;
		}
		.hero-text {
			padding-top: 14%
		}
		.hero-text h3,.hero-text h1 {
			font-size: 20px;
			font-family: 'roboto';
			font-weight: bold
		}
		.color1{
			color: #E9AD28;
		}
		.bg-color1{
			background-color: #E9AD28;
		}
		.hero-text h1{
			font-family: 'roboto';
			font-size: 60px;
			text-align: center;
			font-weight: bold;
		}

		.rezervasyon-form input,select,input:focus{
			box-shadow:none!important;
			outline: 0 none;
		}
	</style>
</head>
<body>
	

	<div class="header_top">
		<div class="container">
			<div class="header_left float-left">
				<span><i class="fa fa-map"></i> Mimar sinan mh. İstikbal cd. no: 7/21 Pursaklar / ANKARA</span>
				<span><i class="fa fa-phone "></i> <a href="tel:+905453356357" >+90 545 335 6357</a></span>
			</div>
		</div>
	</div>


	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1A1A1A">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="https://preview.colorlib.com/theme/hiroto/img/logo.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Ana Sayfa <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Odalar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Hizmetler</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">İletişim</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


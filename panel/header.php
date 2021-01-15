<?php

ob_start();

session_start();

 include "sistem/db.php"; 
 include "sistem/fonk.php";

date_default_timezone_set('Europe/Istanbul');

$kullanicisor=$db->prepare("select * from kullanicilar where k_adi=:ad");
$kullanicisor->execute(array('ad' => $_SESSION['k_adi'] ));
$say=$kullanicisor->rowCount();
if ($_SESSION['yetki']!=5) {header("Location:../index/giris.php?durum=izinsiz"); exit; }
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>YK Yazılım - İçerik Yönetim Sistemi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
     <link href="../assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/shape-hover/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/shape-hover/css/component.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/owl-carousel/owl.theme.css" />
    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="../assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">
    <!-- END PLUGIN CSS -->
    <!-- BEGIN PLUGIN CSS -->
    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="../webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
            </a>
        </li>
    </ul>
    <!-- BEGIN LOGO -->
   <a href="/">
        <img src="../assets/img/logo.png" class="logo"  width="170" height="auto" />
    </a>
    <!-- END LOGO -->
    <ul class="nav pull-right notifcation-center">
        <li class="dropdown hidden-xs hidden-sm">
          <a target="_blank" href="<?php echo $ayarcek['domain']; ?>" class="dropdown-toggle active" data-toggle="">
            <i class="material-icons">home</i>
        </a>
    </li>
     
 
</ul>
</div>
<!-- END RESPONSIVE MENU TOGGLER -->
<div class="header-quick-nav">
  <!-- BEGIN TOP NAVIGATION MENU -->
  <div class="pull-left">
    <ul class="nav quick-section">
      <li class="quicklinks">
        <a href="#" class="" id="layout-condensed-toggle">
          <i class="material-icons">menu</i>
      </a>
  </li>
</ul>
 
</div>

<div class="pull-right">
    <div class="chat-toggler sm">
      <div class="profile-pic">
        <img src="../assets/img/ikarus-ikon.png" alt="" width="35" height="35" />
        <div class="availability-bubble online"></div>
    </div>
</div>
<ul class="nav quick-section ">
  <li class="quicklinks">
    <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
      <i class="material-icons">tune</i>
  </a>
  <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
      <li>
        <a href="../kullanici/ayar.php">Profil Ayarları</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="../index/cikis.php"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Çıkış Yap</a>
    </li>
</ul>
</li>
<li class="quicklinks"> <span class="h-seperate"></span></li>

</ul>
</div>
<!-- END CHAT TOGGLER -->
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  <?php include "sidebar.php"; ?>
  <a href="#" class="scrollup">Scroll</a>
  <div class="footer-widget">
    
  <div style="text-align: center;" >
    
      <a href="lockscreen.html"><i class="material-icons">power_settings_new</i></a></div>
  </div>
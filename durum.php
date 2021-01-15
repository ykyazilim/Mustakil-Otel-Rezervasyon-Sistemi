<?php 
include 'panel/sistem/db.php';
include 'panel/sistem/fonk.php'; 
if (!$_GET['id']) {header('location: index.php'); }
$id=$_GET['id'];
$rezervasyon=$db->prepare("select * from rezervasyon where id='$id' ");
$rezervasyon->execute();
$rezcek=$rezervasyon->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="tr">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Başarılı Rezervasyon</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <style>
    html, body, div {margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; outline: none; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } html { height: 101%; } body {background: #f0f0f0 url('images/bg.gif'); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #313131; line-height: 1; } ::selection { background: #a4dcec; } ::-moz-selection { background: #a4dcec; } ::-webkit-selection { background: #a4dcec; } ::-webkit-input-placeholder { /* WebKit browsers */ color: #ccc; font-style: italic; } :-moz-placeholder { /* Mozilla Firefox 4 to 18 */ color: #ccc; font-style: italic; } ::-moz-placeholder { /* Mozilla Firefox 19+ */ color: #ccc; font-style: italic; } :-ms-input-placeholder { /* Internet Explorer 10+ */ color: #ccc !important; font-style: italic; } br { display: block; line-height: 2.2em; } article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; } ol, ul { list-style: none; } input, textarea {-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; outline: none; } blockquote, q { quotes: none; } blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; } strong { font-weight: bold; } img { border: 0; max-width: 100%; } #topbar {background: #4f4a41; padding: 10px 0 10px 0; text-align: center; } #topbar a {color: #fff; font-size:1.3em; line-height: 1.25em; text-decoration: none; opacity: 0.5; font-weight: bold; } #topbar a:hover {opacity: 1; } /** typography **/ h1 {font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 2.5em; line-height: 1.5em; letter-spacing: -0.05em; margin-bottom: 20px; padding: .1em 0; color: #444; position: relative; overflow: hidden; white-space: nowrap; text-align: center; } h1:before, h1:after {content: ""; position: relative; display: inline-block; width: 50%; height: 1px; vertical-align: middle; background: #f0f0f0; } h1:before {left: -.5em; margin: 0 0 0 -50%; } h1:after {left: .5em; margin: 0 -50% 0 0; } h1 > span {display: inline-block; vertical-align: middle; white-space: normal; } p {display: block; font-size: 1.35em; line-height: 1.5em; margin-bottom: 22px; } /** page structure **/ #w {display: block; width: 750px; margin: 0 auto; padding-top: 30px; } #content {display: block; width: 100%; background: #fff; padding: 25px 20px; padding-bottom: 35px; -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px; -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px; } .flatbtn {-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; display: inline-block; outline: 0; border: 0; color: #f9f8ed; text-decoration: none; background-color: #b6a742; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); font-size: 1.2em; font-weight: bold; padding: 12px 22px 12px 22px; line-height: normal; text-align: center; vertical-align: middle; cursor: pointer; text-transform: uppercase; text-shadow: 0 1px 0 rgba(0,0,0,0.3); -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3); -moz-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3); box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3); } .flatbtn:hover {color: #fff; background-color: #c4b237; } .flatbtn:active {-webkit-box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1); -moz-box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1); box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1); } /** notifications **/ .notify {display: block; background: #fff; padding: 12px 18px; max-width: 400px; margin: 0 auto; cursor: pointer; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; margin-bottom: 20px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px; } .notify h1 { margin-bottom: 6px; } .successbox h1 { color: #678361; } .successbox h1:before, .successbox h1:after { background: #cad8a9; } .notify .alerticon {display: block; text-align: center; margin-bottom: 10px; } table {font-family: arial, sans-serif; border-collapse: collapse; width: 100%; } td, th {border: 1px solid #dddddd; text-align: left; padding: 8px; } tr:nth-child(even) {background-color: #dddddd; } 

    span {
      padding: 50px
    }
  </style>
</head>

<body>
  <div id="topbar"><a href="/">Anasayfa'ya Git</a></div>
  <div id="w">
    <div id="content">
      <div class="notify successbox">
        <h1>Başarılı!</h1>
        <span class="alerticon"><img src="images/check.png" alt="checkmark" /></span>
        <center><p>Rezervasyon Kaydınız Alındı</p></center>
      </div>
      <h2>Rezervasyon Detayınız</h2>
      <table>
        <tr>
          <th>#</th>
          <th>Oda</th>
          <th>Kişi Sayısı</th>
          <th></th>
        </tr>
        <?php $i=1;
        $rez_oda=$db->prepare("select * from rez_oda ro inner join odalar o on o.id=ro.oda_id where ro.rez_id={$_GET['id']} ");
        $rez_oda->execute();
        while($odalar=$rez_oda->fetch(PDO::FETCH_ASSOC)) {?>
          <tr>
            <td><?= $i++; ?>. Oda</td>
            <td><?= $odalar['oda_adi']; ?></td>
            <td><?= $odalar['yetiskin']; ?> Yetişkin - <?= $odalar['cocuk']; ?> Çocuk</td>
            <td><?= $odalar['oda_fiyat']; ?>/Gecelik</td>
          </tr> 
        <?php } ?>
      </table>

      <br>
      <b>Giriş Tarihi</b> <?= $rezcek['giris_tarih']; ?> <br><br>
      <b>Çıkış Tarihi</b> <?= $rezcek['cikis_tarih']; ?> <br><br>
      <b>Toplam Tutar : </b> <?= $rezcek['tutar']; ?> <br><br>
       <b>Ödeme Tür : </b> <?= $rezcek['odeme_tur']; ?>
      <hr>
      <p>
       <h2>Kişi Bilgileri</h2>

       <span>Ad Soyad: <b><?= $rezcek['ad']; ?> <?= $rezcek['soyad']; ?></b> </span>
       <span>E-Posta: <b><?= $rezcek['eposta']; ?></b> </span><br><br>

       <span>Telefon: <b><?= $rezcek['telefon']; ?> </b> </span> <br><br><br>
       <span>Adres: <b><?= $rezcek['adres']; ?></b> </span> <br><br>
       <span>Not: <b><?= $rezcek['nott']; ?></b> </span>



     </p>

   </div>
 </div>
 <script type="text/javascript">

 </script>
</body>
</html>
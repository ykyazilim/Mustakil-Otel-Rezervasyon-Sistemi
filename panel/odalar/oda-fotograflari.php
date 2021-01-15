 <?php include "../header.php";
 

$oda=$db->prepare("SELECT * from odalar where id=:id");
$oda->execute(array(
  'id' => $_GET['id']
));
$odacek=$oda->fetch(PDO::FETCH_ASSOC); ?>
 <link href="../assets/plugins/jquery-superbox/css/style.css" rel="stylesheet" type="text/css" media="screen" />
 <div class="page-content">
  <div class="clearfix"></div>
  <div class="content">
    <ul class="breadcrumb">
      <li>
        <p>Buradasınız</p>
      </li>
      <li><a href="#" class="active">Ürün Fotoğrafları</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-6">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><?php echo $odacek['oda_adi']; ?> - Oda - <span class="semi-bold">Galeri</span></h3>
      </div>
    </div>
    <form action="../sistem/islem.php" method="post">
      <input type="hidden" name="resimsil" value="galeri">
      <div class="col-md-6">
         <a href="index.php" class="btn btn-primary btn-cons"> <i class="fa fa-arrow-left"></i> Geri Dön</a>
       <button type="submit" name="odagalerisil"  class="btn btn-danger btn-cons"><i class="fa fa-trash" aria-hidden="true"></i> Seçilenleri Sil</button>
       <a href="oda-foto-ekle.php?id=<?php echo $odacek['id']; ?>" class="btn btn-primary btn-cons"> <i class="fa fa-plus"></i> Foto Ekle</a>
     </div>
   </div>
   <style type="text/css"> .superbox-list {margin-right: 15px } </style>

 <div class="superbox">
  <?php
  $id=$_GET['id'];
  $odagaleri=$db->prepare("select * from oda_resimleri where oda_id='$id' order by id DESC  ");
  $odagaleri->execute();
  while($odagaleri=$odagaleri->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="superbox-list" style="background-color: white">  
     <center> 
      <label for="<?php echo $odagaleri['id']; ?>">
        <img src="<?php echo "../../ykimg/oda/".$odagaleri['resim']; ?>"class="superbox-img" >
      </label>  
      <?php  array("$galerisec"); ?>
      <input type="checkbox" name="galerisec[]" id="<?php echo $odagaleri['id']; ?>" value="<?php echo $odagaleri['id'].'*'.$odagaleri['resim']; ?>">
    </center>
  </div> 
<?php } ?>

<div class="superbox-float"></div>
</div> </form>


</div>
</div>

</div>

<?php include "../footer.php"; ?>
 <?php include "../header.php"; 


 $oda=$db->prepare("SELECT * from odalar where id=:id");
 $oda->execute(array(
  'id' => $_GET['id']
));
 $odacek=$oda->fetch(PDO::FETCH_ASSOC); 
 ?>
 <link href="../assets/plugins/jquery-superbox/css/style.css" rel="stylesheet" type="text/css" media="screen" />
 <link href="../assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
 <div class="page-content">
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

  <div class="clearfix"></div>
  <div class="content">
    <ul class="breadcrumb">
      <li>
        <p>Buradasınız</p>
      </li>
      <li><a href="#" class="active">Oda Galeri</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><?php echo $odacek['oda_adi']; ?> - Oda - <span class="semi-bold">Galeri</span></h3>
      </div>
    </div>
    <div class="col-md-3"> 
      <a href="oda-fotograflari.php?id=<?php echo $odacek['id']; ?>" class="btn btn-primary btn-cons"> <i class="fa fa-arrow-left"></i> Geri Dön</a>
    </div>
  </div>


  <div class="grid simple">
    <div class="grid-title no-border">
      <h4>Resim<span class="semi-bold"> Yükleyici</span></h4>
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
        <a href="#grid-config" data-toggle="modal" class="config"></a>
        <a href="javascript:;" class="reload"></a>
        <a href="javascript:;" class="remove"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <div class="row-fluid">
        <form action="../sistem/islem.php" class="dropzone no-margin dz-clickable">
          <input type="hidden" name="oda-foto-ekle" value="YK">
          <input type="hidden" name="oda_id" value="<?php echo $odacek['id']; ?>">
          <div class="dz-default dz-message"><span>Resimlerinizi bu alana bırakabilirsiniz</span></div></form>
        </div>
      </div>
    </div>

    <!-- /SuperBox -->
  </div>
</div>


</div>
<script src="../assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<?php include "../footer.php"; ?>
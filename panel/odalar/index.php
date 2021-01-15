 <?php include "../header.php"; ?>
 <div class="page-content">
  <div class="clearfix"></div>
  <div class="content">
    <ul class="breadcrumb">
      <li>
        <p>Buradasınız</p>
      </li>
      <li><a href="index.php" class="active">Odalar</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Odalar</span></h3>
      </div>
    </div>
    <div class="col-md-3">
     <a href="oda-ekle.php" class="btn btn-primary btn-cons"> <i class="fa fa-plus"></i> Ürün Ekle</a>
   </div>
 </div>
 <style type="text/css"> .superbox-list {margin-right: 15px } .islemler i{ font-size: 20px }  .islemler i:hover{color: red } </style>
 <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4>Odalar</h4>
      </div>
      <div class="grid-body ">
        <table class="table" id="example3">
          <thead>
            <tr>
              <th>#</th>
              <th>Oda adı</th>
              <th>Oda Fiyat</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $oda=$db->prepare("select * from odalar order by id desc");
            $oda->execute();
            while($odacek=$oda->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr id="veri_<?php echo $odacek['id']; ?>">
                <td><?php echo $odacek['id']; ?></td>
                <td><?php echo $odacek['oda_adi']; ?></td>
                <td><?php echo $odacek['oda_fiyat']; ?></td>
                <td class="text-center"><a href="oda-fotograflari.php?id=<?php echo $odacek['id']; ?>" style="color: white;"><button class="btn btn-success" style="border-radius: 40px;"><i class="fa fa-image" aria-hidden="true"></i> Fotoğraflar </button></a></td>
                <td class="text-center islemler">
                  <a href="javascript:void(0)" onclick="swalert(<?php echo $odacek['id']; ?>,'<?php echo $odacek['urun_ad']; ?>')"><i class="fa fa-trash "></i></a> 
                  <a style="margin-left: 10px" href="oda-duzenle.php?id=<?php echo $odacek['id']; ?>" ><i class="fa fa-pencil  "></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



</div>
</div>

</div>
<script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="../assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="../webarch/js/webarch.js" type="text/javascript"></script>
<script src="../assets/js/chat.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="../assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL JS INIT -->
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
<script src="../assets/js/datatables.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script type="text/javascript">

 function swalert($sayi,$ad){
  swal({
    title: "Bu Yazıyı Silmek İstediğinize Emin misiniz?",
    text: "'"+$ad+"' adlı sayfayı silmek üzeresiniz. ",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Evet, Silinsin!',
    closeOnConfirm: false,
  },
  function(){
    $('#veri_'+$sayi).remove();
    $.ajax('../sistem/islem.php?odasil=ok&id='+$sayi);
    swal("Silindi!", "'"+$ad+"' yazı silindi", "success");
  });
};
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
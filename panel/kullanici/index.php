 <?php include "../header.php"; ?>
 

 <div class="page-content">
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
  <div id="portlet-config" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
  </div>
  <div class="clearfix"></div>
  <div class="content">
    <ul class="breadcrumb">
      <li>
        <p>Buradasınız</p>
      </li>
      <li><a href="index.php" class="active">Kullanıcılar</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Kullanıcılar</span></h3>
      </div>
    </div>

    <div class="col-md-3">

     <a href="kullanici-ekle.php" class="btn btn-primary btn-cons"> <i class="fa fa-plus"></i> Kullanıcı Ekle</a>
   </div>
 </div>
 <style type="text/css"> .superbox-list {margin-right: 15px }
</style>

<style type="text/css">
  .islemler i{ font-size: 20px }  .islemler i:hover{color: red }
</style>

<div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4>Kullanıcılar</h4>

      </div>
      <div class="grid-body ">
        <table class="table" id="example3">
          <thead>
            <tr>
              <th>#</th>
              <th>Kullanıcı Adı</th>
              <th>Adı</th>
              <th>Mail</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $kullanici=$db->prepare("select * from kullanicilar order by id desc");
            $kullanici->execute();
            while($kcek=$kullanici->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr id="veri_<?php echo $kcek['id']; ?>">
                <td><?php echo $kcek['id']; ?></td>
                <td><?php echo $kcek['k_adi']; ?></td>
                <td><?php echo $kcek['ad']; ?></td>
                <td><?php echo $kcek['mail']; ?></td>
                   <td class="text-center islemler">
                    <a href="javascript:void(0);" onclick="swalert(<?php echo $kcek['id']; ?>,'<?php echo $kcek['sayfa_ad']; ?>')"><i class="fa fa-trash "></i></a> 
                    <a style="margin-left: 10px" href="kullanici-duzenle.php?id=<?php echo $kcek['id']; ?>" ><i class="fa fa-pencil"></i></a>
                  </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 


<!-- /SuperBox -->
</div>
</div>
<!-- END PAGE -->
<!-- BEGIN CHAT -->

<!-- END CHAT -->
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
  
 function swalert($sayi,$resim,$ad){
  swal({
    title: "Bu Sayfayı Silmek İstediğinize Emin misiniz?",
    text: "'"+$ad+"' adlı kullanıcıyı silmek üzeresiniz. ",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Evet, Silinsin!',
    closeOnConfirm: false,
    //closeOnCancel: false
  },
  function(){
    $('#veri_'+$sayi).remove();
    $.ajax('../sistem/islem.php?kullanicisil=ok&id='+$sayi);
    swal("Silindi!", "'"+$ad+"' kullanıcısı silindi", "success");
  });
 };
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
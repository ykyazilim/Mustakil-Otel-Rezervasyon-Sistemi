<?php include"../header.php"; 

$ayarsor=$db->prepare("SELECT * from ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
<style type="text/css"> label {font-weight: bold; }
</style>
<link href="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" /> 
<!-- END SIDEBAR -->
<!-- BEGIN PAGE CONTAINER-->
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
      <li><a href="index.php" class="active">Site Ayarları</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Site Ayarları</span></h3>
      </div>
      <div class="col-md-4" style="display: none;" > <div class="row-fluid"> <div class="slide-primary"> <input type="checkbox" name="switch" class="ios" checked="checked" /> </div> <div class="slide-success"> <input type="checkbox" name="switch" class="iosblue" checked="checked" /> </div> </div> </div>
    </div>

    
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4>Site <span class="semi-bold">Ayarları</span></h4>
          <form id="ajaxform" action="../sistem/islem.php" method="POST" enctype="multipart/form-data">
          </div>
          <div class="grid-body no-border">
            <div class="row">
              <div class="col-md-6">

                <br>
                <div class="form-group">
                  <label class="form-label">Domain Adı</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="domain" value="<?php echo $ayarcek['domain']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Site Adı</label>
                  <div class="controls">
                    <input type="text" class="form-control" value="<?php echo $ayarcek['site_adi']; ?>" name="site_adi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Site Açıklaması</label>
                  <div class="controls">
                    <input type="text" class="form-control" value="<?php echo $ayarcek['description']; ?>" name="description">
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Site Etiketi</label>
                  <div class="controls">
                    <input type="text" class="form-control" value="<?php echo $ayarcek['keywords']; ?>" name="keywords">
                  </div>
                </div>
              </div>
              <input type="hidden" name="logoresim" value="<?php echo $ayarcek['logo'] ?>">
              <input type="hidden" name="favresim" value="<?php echo $ayarcek['favicon'] ?>">
              <div class="col-md-6">
                <div class="logo-onizle"><center> <img style="width: 100px;height: auto;" src="../../ykimg/<?php echo $ayarcek['logo']; ?>" ></center></div>
                <div class="form-group">
                  <label class="form-label">Site Logo</label>
                  <div class="controls">
                    <input type="file" class="form-control auto" id="logos" name="logofile">
                  </div>
                </div>
                <div class="fav-onizle"><center> <img style="max-width: 32px;height: auto;" src="../../ykimg/<?php echo $ayarcek['favicon']; ?>" ></center></div>

                <div class="form-group">
                  <label class="form-label">Site Favicon</label>
                  <div class="controls">
                    <input type="file" class="form-control auto" id="icons" name="favfile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Footer Copright</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="copright" value="<?php echo $ayarcek['copright']; ?>">
                  </div>
                </div>
                <input type="hidden" name="ayarguncelle" value="a">
              </div>
            </div>
            <center>
              <button style="width: 60%" type="submit" class="btn btn-primary">Güncelle</button>
            </center>
          </div>
        </form>
      </div>

    </div>

  </div>

</div>




<!-- /SuperBox -->
</div>
<!-- BEGIN CHAT -->

<!-- END CHAT -->
</div>
<!-- END CONTAINER -->
<script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="../assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script type="text/javascript">

  $("#ajaxform").on("submit",function(e){
    e.preventDefault();
      $("#ajaxform button[type='submit']").prop('disabled', true).html('<i class="fa fa-spinner"></i>Yükleniyor');
    $.ajax({
      url: $(this).attr("action"),
      type:"POST",
      data:new FormData(this),
      contentType:false,
      processData:false,
      cache:false,
      success: function(data){
        if(data.trim()=='başarılı'){
          swal('İşlem Başarılı', 'İşleminiz Başarıyla Tamamlandı', 'success' );
        }else{
          swal('İşlem Başarısız', 'Lütfen Tekrar Deneyiniz', 'warning' );
        }
   setTimeout(function() {

        $("#ajaxform button[type='submit']").prop('disabled', false).html('Güncelle');
      }, 1000);
      }


    })

  });




  $(function(){

        $("#logos").change(function(){//eğer file değişirse

          var resim=document.getElementById ("logos");//resime eriş

          if (resim.files && resim.files[0]){//eğer dosya var ise

            var veri=new FileReader();//veri okuma apisi başlatıyoruz.

            veri.onload=function() {//altta readAsDataURL verileri okuyoruz.O okuma tamamladığın da
              var adres=veri.result;//veriyi al
              $('.logo-onizle').html('<center><img style="width:200px;height:auto" src="'+adres+'"/></center>');//resim olarak çizdir.
            }
            veri.readAsDataURL(resim.files[0]);//veri okuma

          } }); })

  $(function(){

        $("#icons").change(function(){//eğer file değişirse

          var resim=document.getElementById ("icons");//resime eriş

          if (resim.files && resim.files[0]){//eğer dosya var ise

            var veri=new FileReader();//veri okuma apisi başlatıyoruz.

            veri.onload=function() {//altta readAsDataURL verileri okuyoruz.O okuma tamamladığın da
              var adres=veri.result;//veriyi al
              $('.fav-onizle').html('<center><img style="max-width:16px;height:auto" src="'+adres+'"/></center>');//resim olarak çizdir.
            }
            veri.readAsDataURL(resim.files[0]);//veri okuma

          } }); })



        </script>
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
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="../assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
        <script src="../assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/js/form_elements.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- END JAVASCRIPTS -->

      </body>
      </html>
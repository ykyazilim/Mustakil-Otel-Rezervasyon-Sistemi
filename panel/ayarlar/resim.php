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
      <li><a href="index.php" class="active">Resim Ayarları</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Resim Ayarları</span></h3>
      </div>
      <div class="col-md-4" style="display: none;" > <div class="row-fluid"> <div class="slide-primary"> <input type="checkbox" name="switch" class="ios" checked="checked" /> </div> <div class="slide-success"> <input type="checkbox" name="switch" class="iosblue" checked="checked" /> </div> </div> </div>
    </div>

    
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4>Resim <span class="semi-bold">Ayarları</span></h4>
          <form id="ajaxform" action="../sistem/islem.php" method="POST" enctype="multipart/form-data">
          </div>
          <div class="grid-body no-border">
            <div class="row">
              <div class="col-md-6">

                <br>
                <?php if ($ayarcek['resim_opt']==0) { ?> <style type="text/css"> #optimizasyon {display: none; } </style> <?php } ?>
                

                <div class="form-group">
                  <label class="form-label">Resim Optimizasyonu</label>
                  <div class="radio radio-success">
                    <input id="resim1" type="radio" name="resim_opt" value="0" <?php if ($ayarcek['resim_opt']==0) echo "checked";?>>
                    <label for="resim1">Kapalı</label>
                    <input id="resim2" type="radio" name="resim_opt" value="1" <?php if ($ayarcek['resim_opt']==1) echo "checked";?>>
                    <label for="resim2">Açık</label>
                  </div>
                </div>
                <div id="optimizasyon">
                  <div class="form-group">
                    <label class="form-label">Resim Kalitesi <small>(örn: 70)</small></label>
                    <div class="controls">
                      <input type="number" min="1" max="100" class="form-control" value="<?php echo $ayarcek['resim_kalite']; ?>" name="resim_kalite">
                    </div>
                  </div>
                </div>
                <hr>

                  <div class="form-group">
                    <label class="form-label">Ürün Küçük Resim Genişlik</label>
                    <div class="controls">
                      <input type="number" min="1" class="form-control" value="<?php echo $ayarcek['urun_width']; ?>" name="urun_width">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Ürün Küçük Resim Uzunluk</label>
                    <div class="controls">
                      <input type="number" min="1" class="form-control" value="<?php echo $ayarcek['urun_height']; ?>" name="urun_height">
                    </div>
                  </div>
                </div>
              
              <div class="col-md-6">
                <br>
                <div class="form-group">
                  <label class="form-label">Resim Oranı Bozulmasın</label>
                  <div class="radio radio-success">
                    <input id="oran" type="radio" name="resim_oran" value="0" <?php if ($ayarcek['resim_oran']==0) echo "checked";?>>
                    <label for="oran">Kapalı</label>
                    <input id="oran2" type="radio" name="resim_oran" value="1" <?php if ($ayarcek['resim_oran']==1) echo "checked";?>>
                    <label for="oran2">Açık</label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Küçük Resim Genişlik </label>
                    <div class="controls">
                      <input type="number" class="form-control" value="<?php echo $ayarcek['thumb_width']; ?>" name="thumb_width">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="form-label">Küçük Resim Uzunluk</label>
                    <div class="controls">
                      <input type="number" class="form-control" value="<?php echo $ayarcek['thumb_height']; ?>" name="thumb_height">
                    </div>
                  </div>
                   <hr>

                  <div class="form-group">
                    <label class="form-label">Slider Küçük Resim Genişlik</label>
                    <div class="controls">
                      <input type="number" min="1" class="form-control" value="<?php echo $ayarcek['slider_width']; ?>" name="slider_width">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Slider Küçük Resim Uzunluk</label>
                    <div class="controls">
                      <input type="number" min="1" class="form-control" value="<?php echo $ayarcek['slider_height']; ?>" name="slider_height">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="resimopt" value="a">
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
})
</script> 
<script type="text/javascript">

  var resim1 = document.getElementById("resim1"); 
  var resim2 = document.getElementById("resim2");  
  resim1.addEventListener("change", function(){
    if (resim1.checked) {$('#optimizasyon').hide(300); }
  });
  resim2.addEventListener("change", function(){
    if (resim2.checked) {$('#optimizasyon').show(300); }
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
       <!--  <script type="text/javascript">
          (function () {
            var options = {
        whatsapp: "+1234567890", // WhatsApp number
        position: "center", // Position may be 'right' or 'left'
      };
      var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
      var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
      s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
      var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
  </script> -->
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
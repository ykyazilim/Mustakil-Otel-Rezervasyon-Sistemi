<?php include"../header.php"; 

$ayarsor=$db->prepare("SELECT * from ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
<style type="text/css"> label {font-weight: bold; }
</style>
<link href="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" /> 
<div class="page-content">
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
      <li><a href="index.php" class="active">Widget Ayarları</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Widget Ayarları</span></h3>
      </div>
      <div class="col-md-4" style="display: none;" > <div class="row-fluid"> <div class="slide-primary"> <input type="checkbox" name="switch" class="ios" checked="checked" /> </div> <div class="slide-success"> <input type="checkbox" name="switch" class="iosblue" checked="checked" /> </div> </div> </div>
    </div>

    
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4>Widget <span class="semi-bold">Ayarları</span></h4>
          <form id="ajaxform" action="../sistem/islem.php" method="POST" enctype="multipart/form-data">
          </div>
          <div class="grid-body no-border">
            <div class="row">
              <div class="col-md-6">

                <br>
                <?php if ($ayarcek['wp_durum']==0) { ?> <style type="text/css"> #whatsapp {display: none; } </style> <?php } ?>
                <?php if ($ayarcek['tawkto_durum']==0) { ?> <style type="text/css"> #twkto {display: none; } </style> <?php } ?>


                <div class="form-group">
                  <label class="form-label">Whatsapp iletişim</label>
                  <div class="radio radio-success">
                    <input id="tur1" type="radio" name="wp_durum" value="0" <?php if ($ayarcek['wp_durum']==0) echo "checked";?>>
                    <label for="tur1">Kapalı</label>
                    <input id="tur2" type="radio" name="wp_durum" value="1" <?php if ($ayarcek['wp_durum']==1) echo "checked";?>>
                    <label for="tur2">Açık</label>
                  </div>
                </div>
                <div id="whatsapp">
                  <div class="form-group" >
                    <label class="form-label">Whatsapp numara</label>
                    <div class="controls">
                      <input type="text" class="form-control" value="<?php echo $ayarcek['wp_numara']; ?>" name="wp_numara">
                    </div>
                  </div>
                  <div class="form-group" >
                    <label class="form-label">Buton Konumu</label>
                    <div class="controls">
                      <select class="form-control" name="wp_konum">
                        <option value="95%" <?= $ayarcek['wp_konum']=='95%'?"selected":""; ?>>Sağ</option>
                        <option value="50%" <?= $ayarcek['wp_konum']=='50%'?"selected":""; ?>>Orta</option>
                        <option value="15px" <?= $ayarcek['wp_konum']=='15px'?"selected":""; ?>>Sol</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">

                <br>
                <?php if ($ayarcek['wp_durum']==0) { ?>
                  <style type="text/css">
                    #whatsapp {
                      display: none;
                    }
                  </style>

                <?php } ?>


                <div class="form-group">
                  <label class="form-label">Tawk.to</label>
                  <div class="radio radio-success">
                    <input id="twk1" type="radio" name="tawkto_durum" value="0" <?php if ($ayarcek['tawkto_durum']==0) echo "checked";?>>
                    <label for="twk1">Kapalı</label>
                    <input id="twk2" type="radio" name="tawkto_durum" value="1" <?php if ($ayarcek['tawkto_durum']==1) echo "checked";?>>
                    <label for="twk2">Açık</label>
                  </div>
                </div>
                <div id="twkto">
                  <div class="form-group">
                    <label class="form-label">Tawk.To Kodu</label>
                    <div class="controls">
                      <textarea type="text" class="form-control" name="tawkto_kod" rows="8"><?php echo $ayarcek['tawkto_kod']; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="widget" value="a">
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

  var tur = document.getElementById("tur1"); 
  var tur2 = document.getElementById("tur2"); 
  var twk1 = document.getElementById("twk1"); 
  var twk2 = document.getElementById("twk2"); 
  tur.addEventListener("change", function(){
    if (tur.checked) {$('#whatsapp').hide(300); }
  });
  tur2.addEventListener("change", function(){
    if (tur2.checked) {$('#whatsapp').show(300); }
  });
  twk1.addEventListener("change", function(){
    if (twk1.checked) {$('#twkto').hide(300); }
  });
  twk2.addEventListener("change", function(){
    if (twk2.checked) {$('#twkto').show(300); }
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
  <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>

</body>
</html>
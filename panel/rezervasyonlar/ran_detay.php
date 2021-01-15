<?php include"../header.php"; 


$referanssor=$db->prepare("SELECT * from rezervasyon where id=:id");
$referanssor->execute(array(
  'id' => $_GET['id']
));
$scek=$referanssor->fetch(PDO::FETCH_ASSOC);


?>
<style type="text/css">
 label {
  font-weight: bold;
}
</style>

<!-- END SIDEBAR -->
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
   
  <div class="clearfix"></div>
  <div class="content">
    <ul class="breadcrumb">
      <li>
        <p>Buradasınız</p>
      </li>
      <li><a href="index.php" class="active">Rezervasyon Detay</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Rezervasyon Detay</span></h3>
      </div>
      <div class="col-md-4" style="display: none;" > <div class="row-fluid"> <div class="slide-primary"> <input type="checkbox" name="switch" class="ios" checked="checked" /> </div> <div class="slide-success"> <input type="checkbox" name="switch" class="iosblue" checked="checked" /> </div> </div> </div>
    </div>

    <div class="col-md-3">

     <a href="index.php" class="btn btn-primary btn-cons"> <i class="fa fa-arrow-left"></i> Geri Dön</a>
   </div>
 </div>
 
 <div class="grid simple">

  <div class="grid-body no-border">

    <div class="x_panel">

      <div class="x_content"> 
       
        <section>

          <div class="row">
            <div class="col-xs-12 invoice-header">
              <h1>
                <i class="fa fa-globe"></i>Rezervasyon Numarası: #<?php echo $scek['id']; ?>

                <small class="pull-right">Tarih: <?php echo $scek['islem_zaman']; ?></small>
              </h1>
            </div>

          </div>
          <br>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <b>  Kullanıcı Bilgileri  </b>
              <address>
               <br>  <b> Ad Soyad:</b> <?php echo $scek['ad'].' '.$scek['soyad']; ?>  <br>
               <b>adres:</b> <?php echo $scek['adres']; ?>
               <br><b>Telefon:</b>  <?= $scek['telefon']; ?>
               <br><b>Mail:</b>  <?= $scek['eposta']; ?>
             </address>
           </div>

           <div class="col-sm-4 invoice-col">
             <b> Sipariş Edilen Ürünler</b>
             <address>
              <br>  
              <?php 
              $sip_urun=$db->prepare("select * from rez_oda ro inner join odalar o on o.id=ro.oda_id where ro.rez_id={$_GET['id']} ");
              $sip_urun->execute();
              while($uruncek=$sip_urun->fetch(PDO::FETCH_ASSOC)) {
                $tfiyat+=$uruncek['oda_fiyat'];
                echo $uruncek['oda_adi'].' - '.$uruncek['yetiskin'].' Yetişkin - '.$uruncek['cocuk'].' Çocuk['.$uruncek['cocukyas1'].'/'.$uruncek['cocukyas2'].']';
                echo '<br>';
              } ?>
            </address>
            <hr>
            <b>Toplam Fiyat:</b> <i class="fa fa-try"></i> <?= $tfiyat; ?> <br>
          </div>
          <div class="col-sm-4 invoice-col">
            <b>Sipariş Durumları</b>
            <br>
            <br>
            <b>Giriş Tarihi:</b> <?php echo $scek['giris_tarih']; ?>
            <br>
            <b>Çıkış Tarihi:</b> <?php echo $scek['cikis_tarih']; ?>
            <br>
           




           </div>

         </div>
         <br>
         <p><b>Sipariş Notu:</b> <?php echo $scek['nott']; ?></p>







       </section>

     </div>
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


$("#ajaxmailgonder").on("submit",function(e){
    e.preventDefault();
      for (var form in CKEDITOR.instances) 
          CKEDITOR.instances[form].updateElement();
        
    $("#ajaxmailgonder button[type='submit']").html('Yükleniyor');
    $.ajax({
      url: $(this).attr("action"),
      type:"POST",
      data:new FormData(this),
      contentType:false,
      processData:false,
      cache:false,
      success: function(data){
        if(data.trim()=='başarılı'){
          $("#ajaxmailgonder button[type='submit']").css('color', 'blue');

          $("#ajaxmailgonder button[type='submit']").html('Gönderildi!');
          setTimeout(function() {
            $("#ajaxmailgonder button[type='submit']").css('color', 'white');
            $("#ajaxmailgonder button[type='submit']").html('Gönder');


          }, 3000);
        }else{
         $("#ajaxmailgonder button[type='submit']").html('Hata!');

       }

     }


   })

  })








  $("#ajaxsiparisdurum").on("submit",function(e){
    e.preventDefault();
    $("#sipguncellebutton").html('Güncelleniyor');
    $.ajax({
      url: $(this).attr("action"),
      type:"POST",
      data:new FormData(this),
      contentType:false,
      processData:false,
      cache:false,
      success: function(data){
        if(data.trim()=='başarılı'){
          $("#sipguncellebutton").css('color', 'blue');

         $("#sipguncellebutton").html('Güncellendi!');
         setTimeout(function() {
          $("#sipguncellebutton").css('color', 'white');
          $("#sipguncellebutton").html('Güncelle');


         }, 3000);
        }else{
         $("#sipguncellebutton").html('Hata!');
          
        }

      }


    })

  })


  $(function(){

        $("#resims").change(function(){//eğer file değişirse

          var resim=document.getElementById ("resims");//resime eriş

          if (resim.files && resim.files[0]){//eğer dosya var ise

            var veri=new FileReader();//veri okuma apisi başlatıyoruz.

            veri.onload=function() {//altta readAsDataURL verileri okuyoruz.O okuma tamamladığın da
              var adres=veri.result;//veriyi al
              $('#resim').hide();
              $('.onizleme').html('<center><img style="width:200px;height:auto" src="'+adres+'"/></center>');//resim olarak çizdir.
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
        <script src="../assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/js/form_elements.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- END JAVASCRIPTS -->

        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
        <script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
        <script src="../assets/ckeditor/ckeditor.js"></script>
        <script>
          CKEDITOR.replace( 'detay', {
            height: 300,
            filebrowserImageBrowseUrl: '../assets/kcfinder/browse.php?opener=ckeditor&type=ortam'
            
          } );
        </script>
      </body>
      </html>
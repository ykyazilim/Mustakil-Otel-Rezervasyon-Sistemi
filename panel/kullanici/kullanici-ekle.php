<?php include"../header.php"; ?>
 <style type="text/css">
   label {
    font-weight: bold;
   }
 </style>
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
      <li><a href="index.php" class="active">Sayfalar</a> </li>
    </ul>
    <div class="row">
      <div class="col-md-9">
       <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>  <span class="semi-bold">Sayfalar</span></h3>
      </div>
      <div class="col-md-4" style="display: none;" > <div class="row-fluid"> <div class="slide-primary"> <input type="checkbox" name="switch" class="ios" checked="checked" /> </div> <div class="slide-success"> <input type="checkbox" name="switch" class="iosblue" checked="checked" /> </div> </div> </div>
    </div>

    <div class="col-md-3">

     <a href="index.php" class="btn btn-primary btn-cons"> <i class="fa fa-arrow-left"></i> Geri Dön</a>
   </div>
 </div>
 
  <div class="grid simple">
    <div class="grid-title no-border">
      <h4>Sayfa <span class="semi-bold">Ekle</span></h4>
      
    </div>
    <div class="grid-body no-border">
      <br>
      <form action="../sistem/islem.php" method="POST" enctype="multipart/form-data">
      <div class="row">
      <div class="form-group">
        <div class="col-md-2 col-sm-2 ">
         <center><label class="form-label" style="margin-top: 15px">Kullanıcı Adı</label>  </center>
       </div>
       <div class="col-md-9 col-sm-9">
        <div class="controls">
          <input type="text" class="form-control" name="k_adi">
        </div>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-2 col-sm-2 ">
         <center><label class="form-label" style="margin-top: 15px">Şifre</label>  </center>
       </div>
       <div class="col-md-9 col-sm-9">
        <div class="controls">
          <input type="password" class="form-control" name="password">
        </div>
      </div>
    </div>
     
    <hr>
    <div class="form-group">
      <div class="col-md-2 col-sm-2">
       <center><label class="form-label" style="margin-top: 15px">Adı Soyadı</label>  </center>
     </div>
     <div class="col-md-9 col-sm-9 ">
      <div class="controls">
        <input type="text" class="form-control" name="ad">
      </div>
    </div>
  </div>
  <div class="form-group">
      <div class="col-md-2 col-sm-2">
       <center><label class="form-label" style="margin-top: 15px">Mail</label>  </center>
     </div>
     <div class="col-md-9 col-sm-9 ">
      <div class="controls">
        <input type="text" class="form-control" name="mail">
      </div>
    </div>
  </div>
  <div class="form-group">
      <div class="col-md-2 col-sm-2">
       <center><label class="form-label" style="margin-top: 15px">Yetki</label>  </center>
     </div>
     <div class="col-md-9 col-sm-9 ">
      <div class="controls">
        <select  class="form-control" name="yetki">
          <option value="5">Yönetici</option>
          <option value="1">Kullanıcı</option>
        </select>
      </div>
    </div>
  </div>

</div>
<br>
               <center>
                    <button style="width: 60%" type="submit" name="kullanicikaydet" value="sayfa" class="btn btn-primary">Kaydet</button>
               </center>

</form>
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
    
  </body>
</html>